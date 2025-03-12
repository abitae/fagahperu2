<?php

namespace App\Livewire\Config;

use App\Livewire\Forms\RoleForm;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RolesLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public RoleForm $roleForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalPer = false;
    public $permisions;
    #[Computed()]
    public function roles()
    {
        return Role::where('name', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        $all_premision = Permission::all()->pluck('name');
        return view('livewire.config.roles-live', compact('all_premision'))->layout('components.layouts.app');
    }
    public function create()
    {
        $this->roleForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Role $role)
    {
        $this->roleForm->reset();
        $this->roleForm->setRole($role);
        $this->isOpenModal = true;
    }
    public function delete(Role $role)
    {
        if ($this->roleForm->destroy($role->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function createRole()
    {
        if ($this->roleForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateRole()
    {
        if ($this->roleForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function permission(Role $id){
        return \Redirect::route('config.permissions', [$id]);
    }
    public function updatedSearch($value)
    {
        $this->resetPage();
    }
    private function message($tipo, $tittle, $message)
    {
        $this->alert($tipo, $tittle, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => false,
            'text' => $message,
            'timerProgressBar' => true,
        ]);
    }
}
