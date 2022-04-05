<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;

class CapacitacionesIndex extends Component
{
	public $programa;

    public function render()
    {
    	$capacitaciones = $this->programa->capacitaciones;

        return view('livewire.admin.capacitaciones-index', compact('capacitaciones'));
    }
}
