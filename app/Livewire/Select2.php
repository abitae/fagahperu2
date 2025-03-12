<?php

namespace App\Livewire;

use Livewire\Component;
use Spatie\Permission\Models\Role;

class Select2 extends Component
{
    public $options;
    public $selectedOption;

    public function mount($options = [])
    {
        $this->options = Role::all();
    }
    public function render()
    {
        return view('livewire.select2');
    }
    public function updatedSelectedOption($value)
    {
        $this->emit('select2Changed', $value);
    }
}
