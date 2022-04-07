<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Programa;
use App\Models\Personale_companerismo;

class ProgramasGrupos extends Component
{
    public $programa_id;
    public $programa;
    
    public function render()
    {
        $this->programa = Programa::find($this->programa_id);

        return view('livewire.admin.programas-grupos');
    }
}
