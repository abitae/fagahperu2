<?php

namespace App\Livewire\Forms;

use App\Models\CodeExit;
use App\Models\ProductStore;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CodeExitForm extends Form
{
    //public ProductStore $product;
    #[Validate('required')]
    public $product_store_id;
    #[Validate('required|min:2')]
    public $name;
    public function store()
    {
        
        try {
            $this->validate();
            CodeExit::create($this->all());
            infoLog('Code exit store', $this->name);
            return true;
        } catch (\Exception $e) {
            errorLog('Code exit store', $e);
            return false;
        }
    }
}
