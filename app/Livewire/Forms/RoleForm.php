<?php

namespace App\Livewire\Forms;

use Livewire\Attributes\Validate;
use Livewire\Form;
use Spatie\Permission\Models\Role;

class RoleForm extends Form
{
    public ?Role $role;

    #[Validate('required|min:4|unique:roles')]
    public $name = '';

    public function setRole(Role $role)
    {
        $this->role = $role;
        $this->name = $role->name;
    }
    public function store()
    {
        try {
            $this->validate();
            Role::create($this->all());
            infoLog('Role store', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Role store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->role->update([
                'name' => $this->name,
            ]);
            infoLog('Role update', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Role update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $role = Role::find($id);
            $role->delete();
            infoLog('Role destroy', $role->email);
            return true;
        } catch (\Exception $e) {
            errorLog('Role destroy', $e);
            return false;
        }
    }
    public function permision($permisions)
    {
        try {
            $this->role->syncPermissions($permisions);
            infoLog('Role permision', $this->role->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Role permision', $e);
            return false;
        }
    }
}
