<?php

namespace App\Livewire\Forms;

use App\Exports\UsersExport;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;

class UserForm extends Form
{
    public ?User $user;
    #[Validate('required')]
    public $name = '';
    #[Validate('required|min:5|email|unique:users')]
    public $email = '';
    #[Validate('required|min:5')]
    public $password = 'password';
    public $isActive = false;
    #[Validate('required')]
    public $role = 'User';
    public function setUser(User $user)
    {  
        $this->user = $user;
        $this->name = $user->name;
        $this->email = $user->email;
        $this->role = $user->getRoleNames()->first();
    }
    public function store()
    {
        try {
            $this->validate();
            User::create($this->all())->assignRole($this->role);
            infoLog('User store', $this->email);
            return true;
        } catch (\Exception $e) {
            errorLog('User store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->user->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);
            $user = User::find($this->user->id);
            $user->syncRoles([$this->role]);
            infoLog('User update', $this->email);
            return true;
        } catch (\Exception $e) {
            errorLog('User update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $user = User::find($id);
            $user->delete();
            infoLog('User deleted', $user->email);
            return true;
        } catch (\Exception $e) {
            errorLog('User deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $user = User::find($id);
            $user->isActive = !$user->isActive;
            $user->save();
            infoLog('User estado '.$user->isActive, $user->email);
            return true;
        } catch (\Exception $e) {
            errorLog('User estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}