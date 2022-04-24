<?php

namespace App\Http\Livewire\Admin;

use App\Models\Tarea;
use Livewire\Component;

class TareaLista extends Component
{
    public $programa;
    public $addTarea = false;

    public $fecha;
    public $descripcion;

    protected $listeners = ['render' => 'render'];
    protected $rules = [
        'fecha' => 'required',
        'descripcion' => 'required'
    ];

    public function saveTarea()
    {
        $this->validate();
        Tarea::create([
            'fecha' => $this->fecha,
            'descripcion' => $this->descripcion,
            'programa_id' => $this->programa->id
        ]);

        $this->reset(['addTarea', 'fecha', 'descripcion']);

        $this->emitTo('tarea-lista', 'render');

    }

    public function render()
    {
        $programa = $this->programa;
        return view('livewire.admin.tarea-lista', compact('programa'));
    }
}
