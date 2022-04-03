<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Programa;
use App\Models\Grupo;
use Livewire\WithPagination;

class ProgramasIndex extends Component
{
	use WithPagination;

	public $search;
	public $pfj_id;
	public $estado = 1;
	public $poriniciar = true;
    public $iniciado = true;
    public $terminado = true;

	protected $paginationTheme = 'bootstrap';
	public $cant = 15;


	public function updatingSearch(){
		$this->resetPage();
	}

    public function render()
    {
		$states = [];
		$this->poriniciar == true ? array_push($states, "0") : ''; 
	    $this->iniciado == true ? array_push($states, "1") : '';
	    $this->terminado == true ? array_push($states, "2") : '';
	    //$pfj_id = $this->pfj_id;

    	$programas = Programa::select('programas.id as idprograma','pfjs.nombre','programas.nombre as nombreprograma',  'programas.fecha_inicio', 'programas.estado', 'programas.id', 'pfjs.id as idcurso')
										->join('pfjs', 'pfjs.id', '=', 'programas.pfj_id');

		if($this->pfj_id != ''){
			$programas = $programas->where('pfjs.id', '=', $this->pfj_id)	;
		}

		$programas = $programas->where('pfjs.nombre', 'like','%'.$this->search.'%')
			->orWhere('programas.nombre', 'like','%'.$this->search.'%')
			->whereIn('programas.estado', $states)
			->orderby('programas.fecha_inicio', 'desc')
		    ->paginate($this->cant);

		// if (auth()->user()->hasRole('Profesor')) {
        // 	$programas = Programa::select('programas.id as idprograma', 'pfjs.nombre','programas.fecha_inicio','programas.fecha_fin', 'programas.estado', 'programas.id', 'pfjs.id as idcurso')
        // 					->join('grupos', 'grupos.programa_id', '=', 'programas.id')
        // 					->join('pfjs', 'programas.pfj_id', '=', 'pfjs.id')
        // 					->where('grupos.profesore_id', auth()->user()->profesore->id)
        // 					->where('pfjs.nombre', 'like','%'.$this->search.'%')
        // 					->groupBy('programas.id', 'pfjs.nombre', 'programas.fecha_inicio', 'programas.estado', 'idcurso')
        // 					->paginate();
        // }

		$this->resetPage();

        return view('livewire.admin.programas-index', compact('programas'));
    }
}