<?php

namespace App\Livewire\Forms;

use App\Exports\NegociosExport;
use App\Models\Customer;
use App\Models\Negocio;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;
use Storage;

class NegocioForm extends Form
{
    public ?Negocio $negocio;
    #[Validate('required|min:1')]
    public $customer_id = '';
    #[Validate('required|min:1')]
    public $user_id = '';
    #[Validate('required|unique:negocios')]
    public $code = '';
    #[Validate('required')]
    public $name = '';
    #[Validate('required')]
    public $date_closing = '';
    #[Validate('required')]
    public $priority = '';
    #[Validate('required')]
    public $monto_aprox = '';
    #[Validate('required')]
    public $stage = '';
    #[Validate('required')]
    public $description = '';
    public $isActive = false;
    public function setNegocio(Negocio $negocio)
    {
        $this->negocio = $negocio;
        $this->customer_id = $negocio->customer_id;
        $this->user_id = $negocio->user_id;
        $this->code = $negocio->code;
        $this->name = $negocio->name;
        $this->date_closing = $negocio->date_closing;
        $this->priority = $negocio->priority;
        $this->monto_aprox = $negocio->monto_aprox;
        $this->stage = $negocio->stage;
        $this->description = $negocio->description;
    }
    public function store()
    {
        //dd($this->customer_id);
        try {
            $this->validate();
            Negocio::create([
                'customer_id' => $this->customer_id ?? Customer::first()->id,
                'user_id' => $this->user_id,
                'code' => $this->code,
                'name' => $this->name,
                'date_closing' => $this->date_closing,
                'priority' => $this->priority,
                'monto_aprox' => $this->monto_aprox,
                'stage' => $this->stage,
                'description' => $this->description
            ]);
            infoLog('Negocio store', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Negocio store', $e);
            return false;
        }
    }
    public function update()
    {
        //dd($this->description);
        try {
            $this->negocio->update([
                'customer_id' => $this->customer_id,
                'user_id' => $this->user_id,
                'code' => $this->code,
                'name' => $this->name,
                'date_closing' => $this->date_closing,
                'priority' => $this->priority,
                'monto_aprox' => $this->monto_aprox,
                'stage' => $this->stage,
                'description' => $this->description
            ]);
            infoLog('Negocio update', $this->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Negocio update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $negocio = Negocio::find($id);
            $negocio->delete();
            infoLog('Negocio deleted', $negocio->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Negocio deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $negocio = Negocio::find($id);
            $negocio->isActive = !$negocio->isActive;
            $negocio->save();
            infoLog('Negocio estado ' . $negocio->isActive, $negocio->code);
            return true;
        } catch (\Exception $e) {
            errorLog('Negocio estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new NegociosExport, 'negocios.xlsx');
    }
}
