<?php

namespace App\Livewire;

use Livewire\Component;

class Filter extends Component
{

    public $label;
    public $options;
    public $value;
    
    public function render()
    {
       
        return view('livewire.filter');
    }
}
