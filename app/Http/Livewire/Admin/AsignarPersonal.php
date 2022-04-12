<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class AsignarPersonal extends Component
{
    public $programa;

    public $alert;
    public $data;
 
    public function getListeners() {

        return ["moverPersonal:{$this->data}" => 'incrementPostCount'];
    }
 
    public function incrementPostCount()
    {
        $this->alert = 'as';
    }
    
    public function render()
    {
        return view('livewire.admin.asignar-personal');
    }
}
