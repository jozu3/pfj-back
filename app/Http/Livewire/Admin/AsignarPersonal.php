<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AsignarPersonal extends Component
{
    public $programa;
    
    public function render()
    {
        return view('livewire.admin.asignar-personal');
    }
}
