<?php

namespace App\Livewire\Forms;

use App\Exports\AcuerdoMarcosExport;
use App\Models\AcuerdoMarco;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;

class AcuerdoMarcoForm extends Form
{
    public ?AcuerdoMarco $acuerdoMarco;
    #[Validate('required|min:5|unique:acuerdo_marcos')]
    public $code = '';
    #[Validate('required')]
    public $name = '';
    public $isActive = true;
    public function setAcuerdoMarco(AcuerdoMarco $acuerdoMarco)
    {
        $this->acuerdoMarco = $acuerdoMarco;
        $this->code = $acuerdoMarco->code;
        $this->name = $acuerdoMarco->name;
    }
    public function store()
    {
        try {
            $this->validate();
            AcuerdoMarco::create($this->all());
            infoLog('AcuerdoMarco store', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('AcuerdoMarco store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->acuerdoMarco->update([
                'code' => $this->code,
                'name' => $this->name,
            ]);
            infoLog('AcuerdoMarco update', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('AcuerdoMarco update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $acuerdoMarco = AcuerdoMarco::find($id);
            $acuerdoMarco->delete();
            infoLog('AcuerdoMarco deleted', $acuerdoMarco->email);
            return true;
        } catch (\Exception $e) {
            errorLog('AcuerdoMarco deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $acuerdoMarco = AcuerdoMarco::find($id);
            $acuerdoMarco->isActive = !$acuerdoMarco->isActive;
            $acuerdoMarco->save();
            infoLog('AcuerdoMarco estado ' . $acuerdoMarco->isActive, $acuerdoMarco->email);
            return true;
        } catch (\Exception $e) {
            errorLog('AcuerdoMarco estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new AcuerdoMarcosExport, 'acuerdoMarcos.xlsx');
    }
}
