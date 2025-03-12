<?php

namespace App\Livewire\Forms;

use App\Exports\LinesExport;
use App\Models\Line;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\LaravelIgnition\Recorders\LogRecorder\LogMessage;

class LineForm extends Form
{
    public ?Line $line;
    #[Validate('required|min:5|unique:lines')]
    public $code = '';
    public $name = '';
    #[Validate('nullable|sometimes|image|max:10960|mimes:jpeg,jpg,png|extensions:jpeg,jpg,png')]
    public $logo = '';
    #[Validate('nullable|sometimes|image|max:10960|mimes:jpeg,jpg,png|extensions:jpeg,jpg,png')]
    public $fondo = '';
    #[Validate('nullable|sometimes|image|max:10960|mimes:jpeg,jpg,png|extensions:jpeg,jpg,png')]
    public $firma_autorizacion = '';
    #[Validate('nullable|sometimes|image|max:10960|mimes:jpeg,jpg,png|extensions:jpeg,jpg,png')]
    public $fondo_autorizacion = '';
    #[Validate('nullable|sometimes|image|max:10960|mimes:jpeg,jpg,png|extensions:jpeg,jpg,png')]
    public $fondo_rotulo = '';
    #[Validate('nullable|sometimes|mimes:pdf|max:10960|extensions:pdf')] // 1MB Max
    public $archivo = '';
    public $isActive = false;
    public function setLine(Line $line)
    {
        $this->line = $line;
        $this->code = $line->code;
        $this->name = $line->name;
        $this->logo = $line->logo;
        $this->fondo = $line->fondo;
        $this->firma_autorizacion = $line->firma_autorizacion;
        $this->fondo_autorizacion = $line->fondo_autorizacion;
        $this->fondo_rotulo = $line->fondo_rotulo;
        $this->archivo = $line->archivo;
    }
    public function store()
    {
        try {
            $this->validate();
            if (gettype($this->logo) != 'string') {
                $this->logo = $this->logo->store('line/logo');
            }
            if (gettype($this->fondo) != 'string') {
                $this->fondo = $this->fondo->store('line/fondo');
            }
            if (gettype($this->logo) != 'string') {
                $this->logo = $this->firma_autorizacion->store('line/firma_autorizacion');
            }
            if (gettype($this->fondo) != 'string') {
                $this->fondo = $this->fondo_autorizacion->store('line/fondo_autorizacion');
            }
            if (gettype($this->fondo) != 'string') {
                $this->fondo = $this->fondo_rotulo->store('line/fondo_rotulo');
            }
            if (gettype($this->archivo) != 'string') {
                $this->archivo = $this->archivo->store('line/pdf');
            }
            Line::create($this->all());
            infoLog('Line store', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Line store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            if (gettype($this->logo) != 'string') {
                $this->logo = $this->logo->store('line/logo');
            }
            if (gettype($this->fondo) != 'string') {
                $this->fondo = $this->fondo->store('line/fondo');
            }
            if (gettype($this->firma_autorizacion) != 'string') {
                $this->firma_autorizacion = $this->firma_autorizacion->store('line/firma_autorizacion');
            }
            if (gettype($this->fondo_autorizacion) != 'string') {
                $this->fondo_autorizacion = $this->fondo_autorizacion->store('line/fondo_autorizacion');
            }
            if (gettype($this->fondo_rotulo) != 'string') {
                $this->fondo_rotulo = $this->fondo_rotulo->store('line/fondo_rotulo');
            }
            if (gettype($this->archivo) != 'string') {
                $this->archivo = $this->archivo->store('line/pdf');
            }
            $this->line->update([
                'code' => $this->code,
                'name' => $this->name,
                'logo' => $this->logo,
                'fondo' => $this->fondo,
                'firma_autorizacion' => $this->firma_autorizacion,
                'fondo_autorizacion' => $this->fondo_autorizacion,
                'fondo_rotulo' => $this->fondo_rotulo,
                'archivo' => $this->archivo,
            ]);
            infoLog('Line update', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Line update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $line = Line::find($id);
            $line->delete();
            infoLog('Line deleted', $line->email);
            return true;
        } catch (\Exception $e) {
            errorLog('Line deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $line = Line::find($id);
            $line->isActive = !$line->isActive;
            $line->save();
            infoLog('Line estado ' . $line->isActive, $line->email);
            return true;
        } catch (\Exception $e) {
            errorLog('Line estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new LinesExport, 'lines.xlsx');
    }
}
