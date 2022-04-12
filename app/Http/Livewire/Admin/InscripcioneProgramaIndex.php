<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Inscripcione;
use App\Models\Programa;
use App\Models\Grupo;

class InscripcioneProgramaIndex extends Component
{
    public $inscripciones;
    public $grupo_id;
    public $programa_id;

    public function render()
    {
        $that = $this;
        if($this->grupo_id != ''){
            $this->inscripciones = Inscripcione::whereHas('inscripcioneCompanerismos', function ($q) use ($that){
                $q->whereHas('companerismo', function($qu) use ($that){
                    $qu->where('grupo_id', $that->grupo_id);
                });                
            })->get();
            $programa = Grupo::find($this->grupo_id)->programa;
        } 
        
        if($this->programa_id != '') {
            $this->inscripciones = Inscripcione::where('programa_id', $this->programa_id)->get();
            $programa = Programa::find($this->programa_id);
        }
        

        return view('livewire.admin.inscripcione-programa-index', compact('programa'));
    }
}
