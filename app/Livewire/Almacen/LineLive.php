<?php

namespace App\Livewire\Almacen;

use App\Livewire\Forms\LineForm;
use App\Models\Line;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class LineLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    use WithFileUploads;
    public LineForm $lineForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    #[Computed]
    public function lines()
    {
        return Line::where('code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.almacen.line-live');
    }
    public function create()
    {
        $this->lineForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Line $line)
    {
        $this->lineForm->reset();
        $this->lineForm->setLine($line);
        $this->isOpenModal = true;
    }
    public function delete(Line $line)
    {
        if ($this->lineForm->destroy($line->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Line $line)
    {
        if ($this->lineForm->estado($line->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createLine()
    {
        if ($this->lineForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateLine()
    {
        if ($this->lineForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportLine()
    {
        $this->isOpenModalExport = false;
        return $this->lineForm->export();
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
