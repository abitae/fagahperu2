<?php

namespace App\Livewire\Config;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsLive extends Component
{
    use LivewireAlert;
    public $permissions = [];
    public Role $role;
    public function mount(Role $id)
    {
        $this->role = $id;
        $this->permissions = $id->permissions->pluck('name');
    }
    public function render()
    {
        $user_p = Permission::where('name', 'LIKE', '%' . 'usuario' . '%')->pluck('name');
        $role_p = Permission::where('name', 'LIKE', '%' . 'rol' . '%')->pluck('name');
        $cm_p = Permission::where('name', 'LIKE', '%' . 'CM' . '%')->pluck('name');
        $acuerdo_p = Permission::where('name', 'LIKE', '%' . 'acuerdo' . '%')->pluck('name');
        $negocio_p = Permission::where('name', 'LIKE', '%' . 'negocio' . '%')->pluck('name');
        $cliente_p = Permission::where('name', 'LIKE', '%' . 'cliente' . '%')->pluck('name');
        $contacto_p = Permission::where('name', 'LIKE', '%' . 'contacto' . '%')->pluck('name');
        $producto_p = Permission::where('name', 'LIKE', '%' . 'producto' . '%')->pluck('name');
        $marca_p = Permission::where('name', 'LIKE', '%' . 'marca' . '%')->pluck('name');
        $categoria_p = Permission::where('name', 'LIKE', '%' . 'categoria' . '%')->pluck('name');
        $linea_p = Permission::where('name', 'LIKE', '%' . 'linea' . '%')->pluck('name');
        return view(
            'livewire.config.permissions-live',
            compact('user_p', 'role_p', 'cm_p', 'acuerdo_p', 'negocio_p', 'cliente_p', 'contacto_p', 'producto_p','marca_p', 'categoria_p', 'linea_p')
        )
            ->layout('components.layouts.app');

    }
    public function update()
    {
        try {
            $this->role->syncPermissions($this->permissions);
            infoLog('Permision role', $this->role->name);
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
        } catch (\Exception $e) {
            errorLog('Permision role', $e);
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
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
