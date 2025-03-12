<?php

namespace App\Livewire\Forms;

use App\Exports\CategoriesExport;
use App\Models\Category;
use Illuminate\Support\Facades\Log;
use Livewire\Attributes\Validate;
use Livewire\Form;
use Maatwebsite\Excel\Facades\Excel;
use Spatie\LaravelIgnition\Recorders\LogRecorder\LogMessage;

class CategoryForm extends Form
{
    public ?Category $category;
    #[Validate('required|min:5|unique:categories')]
    public $code = '';
    public $name = '';
    public $isActive = false;
    public function setCategory(Category $category)
    {
        $this->category = $category;
        $this->code = $category->code;
        $this->name = $category->name;
    }
    public function store()
    {
        try {
            $this->validate();
            Category::create($this->all());
            infoLog('Category store', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Category store', $e);
            return false;
        }
    }
    public function update()
    {
        try {
            $this->category->update([
                'code' => $this->code,
                'name' => $this->name,
            ]);
            infoLog('Category update', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Category update', $e);
            return false;
        }
    }
    public function destroy($id)
    {
        try {
            $category = Category::find($id);
            $category->delete();
            infoLog('Category deleted', $category->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Category deleted', $e);
            return false;
        }
    }
    public function estado($id)
    {
        try {
            $category = Category::find($id);
            $category->isActive = !$category->isActive;
            $category->save();
            infoLog('Category estado ' . $category->isActive, $category->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Category estado', $e);
            return false;
        }
    }
    public function export()
    {
        return Excel::download(new CategoriesExport, 'categorys.xlsx');
    }
}
