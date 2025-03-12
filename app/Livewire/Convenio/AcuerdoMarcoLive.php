<?php

namespace App\Livewire\Convenio;

use App\Livewire\Forms\AcuerdoMarcoForm;
use App\Models\AcuerdoMarco;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class AcuerdoMarcoLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public AcuerdoMarcoForm $acuerdoMarcoForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    protected $paginationTheme = "bootstrap";
    #[Computed]
    public function acuerdoMarcos()
    {
        return AcuerdoMarco::where('code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.convenio.acuerdo-marco-live');
    }
    public function create()
    {
        $this->acuerdoMarcoForm->reset();
        $this->isOpenModal = true;
    }
    public function update(AcuerdoMarco $acuerdoMarco)
    {
        $this->acuerdoMarcoForm->reset();
        $this->acuerdoMarcoForm->setAcuerdoMarco($acuerdoMarco);
        $this->isOpenModal = true;
    }
    public function delete(AcuerdoMarco $acuerdoMarco)
    {
        if ($this->acuerdoMarcoForm->destroy($acuerdoMarco->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(AcuerdoMarco $acuerdoMarco)
    {
        if ($this->acuerdoMarcoForm->estado($acuerdoMarco->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createAcuerdoMarco()
    {
        if ($this->acuerdoMarcoForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateAcuerdoMarco()
    {
        if ($this->acuerdoMarcoForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportAcuerdoMarco()
    {
        $this->isOpenModalExport = false;
        return $this->acuerdoMarcoForm->export();
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
