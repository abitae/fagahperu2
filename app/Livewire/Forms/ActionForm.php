<?php

namespace App\Livewire\Forms;

use App\Models\ActionNegocio as Action;
use Carbon\Carbon;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;

class ActionForm extends Form
{
    public ?Action $action;
    #[Validate('required|min:1')]
    public $negocio_id = '';
    #[Validate('required|min:1')]
    public $contact_id = '';
    #[Validate('required')]
    public $tipo = '';
    #[Validate('required')]
    public $description = '';
    #[Validate('required')]
    public $date = '';
    #[Validate('nullable|sometimes|image|max:10960|mimes:jpeg,jpg,png|extensions:jpeg,jpg,png')]
    public $image = '';
    #[Validate('nullable|sometimes|mimes:pdf|max:10960|extensions:pdf')] // 1MB Max
    public $archivo = '';

    public function setAction(Action $action)
    {
        $this->action = $action;
        $this->negocio_id = $action->negocio_id;
        $this->contact_id = $action->contact_id;
        $this->tipo = $action->tipo;
        $this->description = $action->description;
        $this->date = $action->date;
        $this->image = $action->image;
        $this->archivo = $action->archivo;
    }
    public function store()
    {
        try {
            $this->validate();
            if (gettype($this->image) != 'string') {
                $this->image = $this->image->store('action/image');
            }
            if (gettype($this->archivo) != 'string') {
                $this->archivo = $this->archivo->store('action/pdf');
            }
            
            Action::create([
                'negocio_id' => $this->negocio_id,
                'contact_id' => $this->contact_id,
                'tipo' => $this->tipo,
                'description' => $this->description,
                'date' => $this->date,
                'image' => $this->image,
                'archivo' => $this->archivo,
            ]);
            infoLog('Action store', $this->negocio_id);
            return true;
        } catch (\Exception $e) {
            errorLog('Action store', $e);
            return false;
        }
    }
    public function update()
    {
        //dd($this->description);
        try {
            $this->action->update([
                'negocio_id' => $this->negocio_id,
                'contact_id' => $this->contact_id,
                'tipo' => $this->tipo,
                'description' => $this->description,
                'date' => $this->date,
                'image' => $this->image,
                'archivo' => $this->archivo,
            ]);
            infoLog('Action update', $this->negocio_id);
            
            return true;
        } catch (\Exception $e) {
            errorLog('Action update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $Action = Action::find($id);
            $Action->delete();
            infoLog('Action deleted', $Action->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Action deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $Action = Action::find($id);
            $Action->isActive = !$Action->isActive;
            $Action->save();
            infoLog('Action estado ' . $Action->isActive, $Action->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Action estado', $e);
            return false;
        }
    }
}
