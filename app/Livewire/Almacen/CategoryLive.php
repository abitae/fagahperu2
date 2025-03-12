<?php

namespace App\Livewire\Almacen;

use App\Livewire\Forms\CategoryForm;
use App\Models\Category;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;

class CategoryLive extends Component
{
    use WithPagination, WithoutUrlPagination;
    use LivewireAlert;
    public CategoryForm $categoryForm;
    public $search = '';
    public $num = 10;
    public $isOpenModal = false;
    public $isOpenModalExport = false;
    #[Computed]
    public function categories()
    {
        return Category::where('code', 'LIKE', '%' . $this->search . '%')
            ->orWhere('name', 'LIKE', '%' . $this->search . '%')
            ->paginate($this->num, '*', 'page');
    }
    public function render()
    {
        return view('livewire.almacen.category-live');
    }
    public function create()
    {
        $this->categoryForm->reset();
        $this->isOpenModal = true;
    }
    public function update(Category $category)
    {
        $this->categoryForm->reset();
        $this->categoryForm->setCategory($category);
        $this->isOpenModal = true;
    }
    public function delete(Category $category)
    {
        if ($this->categoryForm->destroy($category->id)) {
            $this->message('success', 'En hora buena!', 'Registro eliminado correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo eliminar el registro!');
        }
    }
    public function estado(Category $category)
    {
        if ($this->categoryForm->estado($category->id)) {
            $this->message('success', 'En hora buena!', 'Registro actualiza correctamente!');
        } else {
            $this->message('error', 'Error!', 'No se pudo actualizar el registro!');
        }
    }
    public function createCategory()
    {
        if ($this->categoryForm->store()) {
            $this->message('success', 'En hora buena!', 'Registro creado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function updateCategory()
    {
        if ($this->categoryForm->update()) {
            $this->message('success', 'En hora buena!', 'Registro actualizado correctamente!');
            $this->isOpenModal = false;
        } else {
            $this->message('error', 'Error!', 'Verifique los datos ingresados!');
        }
    }
    public function exportCategory()
    {
        $this->isOpenModalExport = false;
        return $this->categoryForm->export();
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
