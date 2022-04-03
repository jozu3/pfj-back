<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Inscripcione;
use Livewire\WithPagination;

class InscripcionesIndex extends Component
{
	use WithPagination;

	public $search;
	public $estado = 0;
	public $readyToLoad = false;
    public $estado_retirado = true;
    public $estado_suspendido = true;
    public $estado_habilitado = true;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

	public function loadInscripciones(){
		$this->readyToLoad = true;
		$this->emit('readytoload');
	}
	
    public function render()
    {
    	if ($this->readyToLoad) {
    		$states = [];
	        $this->estado_habilitado == true ? array_push($states, "0") : ''; 
	        $this->estado_retirado == true ? array_push($states, "1") : ''; 
	        $this->estado_suspendido == true ? array_push($states, "2") : ''; 

    		$inscripciones = Inscripcione::/*select('inscripciones.id', 'contactos.apellidos as contacto_apellidos', 
												  'inscripciones.id as idinscripcione', 'inscripciones.estado as incripcione_estado')
    							->*/join('personales', 'personales.id', '=', 'inscripciones.personale_id')
    							->join('contactos', 'contactos.id', '=', 'personales.contacto_id')
                                ->whereIn('inscripciones.estado', $states)
    							->where(function($query) {
			                          $query->orWhere('contactos.nombres', 'like','%'.$this->search.'%')
			                                ->orWhere('contactos.apellidos', 'like','%'.$this->search.'%');
			                            });

    		$user = auth()->user();
    		if ($user->hasRole('Vendedor')) {
				$inscripciones = $inscripciones->where(function($query) {
			                          $query->orWhere('inscripciones.personal_id', auth()->user()->personal->id)
			                                ->orWhere('contactos.personal_id', auth()->user()->personal->id);
			                            });
    		}

    		$inscripciones = $inscripciones->orderBy('inscripciones.id', 'asc')->paginate();

    	} else {
    		$inscripciones = Inscripcione::where('personale_id', '')->paginate();
    	}

        return view('livewire.admin.inscripciones-index', compact('inscripciones'));
    }
}
