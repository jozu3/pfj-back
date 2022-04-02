<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Personale_unidade;

class UnidadNotaShow extends Component
{
    public $is_report = false;
	public $personaleUnidade_id;
    public $personaleUnidad;
    public $icon_comment = 'fa-comment';

    public $open_modalComentario = false;

    public $comentario = '';

    protected $rules = [
        'comentario' => 'max:300'
    ];

	protected function getListeners()
    {
        return ['show-promedio'.$this->personaleUnidade_id => 'render'];
    }

    public function render()
    {	

    	$this->personaleUnidad = Personale_unidade::find($this->personaleUnidade_id);

        if ($this->personaleUnidad->comentario != '') {
            $this->icon_comment = 'fa-comment-dots';
        } else {
            $this->icon_comment = 'fa-comment';
        }

        return view('livewire.admin.unidad-nota-show');
    }

    public function openModalComentario(){
        $this->open_modalComentario = true;
        $this->comentario = $this->personaleUnidad->comentario;
    }

    public function saveComentario(){
        $this->validate();

        $result = $this->personaleUnidad->update([
            'comentario' => $this->comentario
        ]);

        if ($result) {
            $this->emit('alert', $result);
            $this->reset(['open_modalComentario']);
        }
    }

    public function updated($propertyName){
        $this->validateOnly($propertyName);
    }
}
