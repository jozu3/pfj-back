<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Personale;
use App\Models\Programa;
use App\Models\Grupo;

class PersonaleProgramaIndex extends Component
{
    public $personales;
    public $grupo_id;
    public $programa_id;

    public function render()
    {
        $that = $this;
        if($this->grupo_id != ''){
            $this->personales = Personale::whereHas('personale_grupos', function ($q) use ($that){
                $q->where('grupo_id', $that->grupo_id);
            })->get();
            $programa = Grupo::find($this->grupo_id)->programa;
        } 
        
        if($this->programa_id != '') {
            $this->personales = Personale::whereHas('inscripciones', function ($q) use ($that){
                $q->where('programa_id', $that->programa_id);
            })->get();
            $programa = Programa::find($this->programa_id);
        }
        

        return view('livewire.admin.personale-programa-index', compact('programa'));
    }
}
