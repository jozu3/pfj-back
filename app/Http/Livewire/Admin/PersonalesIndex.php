<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Personale;
use Livewire\WithPagination;


class PersonalesIndex extends Component
{
	use WithPagination;

	public $search;
	
	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}
	
    public function render()
    {
		$that = $this;

    	$personales = Personale::select('*','personales.id as id', 'contactos.id as idcontacto')
							->join('contactos', 'personales.contacto_id', '=', 'contactos.id')
							->where(function($query) use ($that) {
								$query->orWhere('contactos.apellidos', 'like','%'.$that->search.'%')
										->orWhere('contactos.nombres', 'like','%'.$that->search.'%')
										->orWhere('contactos.telefono', 'like','%'.$that->search.'%')
										->orWhere('contactos.email', 'like','%'.$that->search.'%');
								})
							->paginate();

        return view('livewire.admin.personales-index', compact('personales'));
    }
}
