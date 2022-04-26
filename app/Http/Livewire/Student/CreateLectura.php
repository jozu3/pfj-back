<?php

namespace App\Http\Livewire\Student;

use App\Models\Inscripcione;
use App\Models\InscripcioneTarea;
use App\Models\Programa;
use Livewire\Component;

class CreateLectura extends Component
{
    public $programa;
    public $checkTarea = "esto es un texto";

    public function render()
    {
        $programa = $this->programa;
        $inscripcione = Inscripcione::where('personale_id', auth()->user()->personale->id)->where('programa_id', $this->programa->id)->first();
        $inscripcioneTarea = InscripcioneTarea::where('inscripcione_id', $inscripcione->id)->get();
        return view('livewire.student.create-lectura', compact('programa', 'inscripcioneTarea'));
    }

    public function realizado($tarea)
    {
        $inscripcione = Inscripcione::where('personale_id', auth()->user()->personale->id)->where('programa_id', $this->programa->id)->first();

        $inscripcioneTarea = InscripcioneTarea::where('inscripcione_id', $inscripcione->id)->where('tarea_id', $tarea)->first();

        if ($inscripcioneTarea) {
            $this->checkTarea = !$inscripcioneTarea->realizado;
            $inscripcioneTarea->realizado = $this->checkTarea;

        } else {
            $inscripcioneTarea = new InscripcioneTarea([
                'inscripcione_id' => $inscripcione->id,
                'tarea_id' => $tarea,
                'realizado' => true,
            ]);

        }

        $inscripcioneTarea->save();

        $this->checkTarea = 'Cambio relaizado';

    }
}
