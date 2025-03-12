<?php

namespace App\Livewire\Config;

use App\Models\User;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\WithoutUrlPagination;
use App\Livewire\Forms\UserForm;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Spatie\Permission\Models\Role;

class UsersLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public UserForm $userForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    public $name;
    public function mount()
    {
        $this->authorize('Ver usuario');
    }
    #[Computed]
    public function users()
    {
        return User::where('name', 'LIKE', '%' . $this->search . '%')
            ->orWhere('email', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        $all_roles = Role::all()->pluck('name');
        return view('livewire.config.users-live', compact('all_roles'));
    }
    public function create()
    {
        $this->authorize('Crear usuario');
        $this->userForm->reset();
        $this->isOpenModal = true;
    }
    public function update(User $user)
    {
        $this->authorize('Editar usuario');
        $this->userForm->reset();
        $this->userForm->setUser($user);
        $this->isOpenModal = true;
        $this->dispatch('open-modal', 'form-user');
    }
    public function delete(User $user)
    {
        $this->authorize('Eliminar usuario');
        if ($this->userForm->destroy($user->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(User $user)
    {
        if ($this->userForm->estado($user->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createUser()
    {
        if ($this->userForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateUser()
    {
        if ($this->userForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportUser()
    {
        $this->isOpenModalExport = false;
        return $this->userForm->export();
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
