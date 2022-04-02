<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Contacto;
use App\Models\Personale;
use Illuminate\Support\Facades\DB;
use Livewire\WithPagination;

class ContactosIndex extends Component
{
	use WithPagination;

    public $search;
    public $nocontactado = true;
    public $contactado = true;
    public $probable = true;
	public $confirmado = true;
	public $sortBy = 'newassign';
    public $sortDirection = 'desc';
    public $page = 1;

    public function sortBy($field)
    {
        $this->sortDirection = $this->sortBy === $field
            ? $this->reverseSort()
            : 'asc';

        $this->sortBy = $field;
    }

    public function reverseSort()
    {
        return $this->sortDirection === 'asc'
            ? 'desc'
            : 'asc';
    }

	protected $paginationTheme = 'bootstrap';

	public function updatingSearch(){
		$this->resetPage();
	}

 	public function render()
    {
        $personales = Personale::all();
        $vendedor = null;
        $that = $this;
        $states = [];
        $this->nocontactado == true ? array_push($states, "1") : ''; 
        $this->contactado == true ? array_push($states, "2") : ''; 
        $this->probable == true ? array_push($states, "3") : '';
        $this->confirmado == true ? array_push($states, "4") : '';


        if (auth()->user()->roles[0]->id == 3) {//vendedor

            $contactos = Contacto::where('personal_id', '=', auth()->user()->personal->id)
                                ->where('estado', '>=', '1')
                                ->where('estado', '<=', '4')
                                ->whereIn('estado', $states)
                                ->where(function($query) use ($that) {
                                      $query->orWhere('nombres', 'like','%'.$that->search.'%')
                                            ->orWhere('apellidos', 'like','%'.$that->search.'%')
                                            ->orWhere('telefono', 'like','%'.$that->search.'%');
                                           // ->orWhere('email', 'like','%'.$that->search.'%');
                                })
                                ->orderBy($this->sortBy, $this->sortDirection)
                                ->paginate();            
        } 

        if (auth()->user()->hasRole('Admin') || auth()->user()->hasRole('Asistente')) {//admin o asistente
            
/*
            $contactos_1 = Contacto::select('contactos.id')
                            ->innerJoin()
            $select1 = Contacto::query("
                SELECT 
                        c.id as idcontacto, c.nombres as nombres, c.apellidos, c.telefono, c.estado, c.personal_id as idpersonal, concat_ws(' ', e.nombres, e.apellidos) as nomVendedor, concat_ws('-', c.id, c.personal_id) AS vendedor, concat_ws('-', s.contacto_id, s.personal_id) as contact_comentador, e.nombres as personal, count(s.comentario) as totalcomentarios, 0 as comentariosvendedor FROM contactos c
                        inner join seguimientos s on c.id = s.contacto_id
                        inner join personales e on e.id = c.personal_id
                        where c.estado <= 4 and c.estado >=1
                        group by c.id, c.nombres, c.apellidos, c.telefono, c.estado, idpersonal, nomVendedor, vendedor, contact_comentador, personal
                        ")->get();
                              //      dd($select1);
*/
       /*    $contactos = DB::select("
                select idcontacto, nombres, apellidos, telefono, estado, idpersonal, nomVendedor, SUM(comentariosvendedor) as comentariosvendedorr, sum(totalcomentarios) as totalcomentarioss
                from 
                (SELECT 
                        c.id as idcontacto, c.nombres as nombres, c.apellidos, c.telefono, c.estado, c.personal_id as idpersonal, concat_ws(' ', e.nombres, e.apellidos) as nomVendedor, concat_ws('-', c.id, c.personal_id) AS vendedor, concat_ws('-', s.contacto_id, s.personal_id) as contact_comentador, e.nombres as personal, count(s.comentario) as totalcomentarios, 0 as comentariosvendedor FROM contactos c
                        inner join seguimientos s on c.id = s.contacto_id
                        inner join personales e on e.id = c.personal_id
                        where c.estado <= 4 and c.estado >=1
                        group by c.id, c.nombres, c.apellidos, c.telefono, c.estado, idpersonal, nomVendedor, vendedor, contact_comentador, personal
                        union 
                        SELECT c.id as idcontacto, c.nombres as nombres, c.apellidos, c.telefono, c.estado, c.personal_id as idpersonal, concat_ws(' ', e.nombres, e.apellidos) as nomVendedor, concat_ws('-', c.id, c.personal_id) AS vendedor, concat_ws('-', s.contacto_id, s.personal_id) as contact_comentador, e.nombres as comentador , 0 as totalcomentarios, count(s.comentario) as comentariosvendedor FROM contactos c
                        inner join seguimientos s on c.id = s.contacto_id
                        inner join personales e on e.id = c.personal_id
                        WHERE concat_ws('-', c.id, c.personal_id) LIKE concat_ws('-', s.contacto_id, s.personal_id)
                        and c.estado <= 4 and c.estado >=1
                        group by concat_ws('-', s.contacto_id, s.personal_id), c.id, c.nombres, c.apellidos, c.telefono, c.estado, idpersonal, nomVendedor, vendedor, comentador
                        union 
                        select c.id as idcontacto, c.nombres as nombres, c.apellidos, c.telefono, c.estado, c.personal_id as idpersonal, concat_ws(' ', e.nombres, e.apellidos) as nomVendedor, 0 as contact_comentador, 0 as vendedor, 0 as personal, 0 as totalcomentarios, 0 as comentariosvendedor from contactos c 
                                inner join personales e on e.id = c.personal_id
                                where estado <= 4 and estado >=1
                            ) a
                group by a.idcontacto, a.nombres, apellidos, telefono, estado, idpersonal, nomVendedor")->paginate();

            dd($contactos);*/


          $contactos= Contacto::where('estado', '>=', '1')
                                ->where('estado', '<=', '4')
                                ->whereIn('estado', $states)
                                ->where(function($query) use ($that) {
                                      $query->orWhere('nombres', 'like','%'.$that->search.'%')
                                            ->orWhere('apellidos', 'like','%'.$that->search.'%')
                                            ->orWhere('telefono', 'like','%'.$that->search.'%');
                                           // ->orWhere('email', 'like','%'.$that->search.'%');
                                })
                                ->orderBy($this->sortBy, $this->sortDirection)
                                ->paginate();
        }



        $this->page = 1;

        return view('livewire.admin.contactos-index',compact('contactos', 'personales'));
    }
}

/*

select idcontacto, nombres, apellidos, telefono, estado, idpersonal, nomVendedor, SUM(comentariosvendedor), sum(totalcomentarios)
from (
        SELECT c.id as idcontacto, c.nombres, c.apellidos, c.telefono, c.estado, e.id as idpersonal, concat_ws(' ', e.nombres, e.apellidos) as nomVendedor, concat_ws('-', c.id, c.personal_id) AS vendedor,concat_ws('-', s.contacto_id, s.personal_id) as comentador, e.nombres as personal, count(s.comentario) as totalcomentarios, 0 as comentariosvendedor FROM contactos c
        inner join seguimientos s on c.id = s.contacto_id
        inner join personales e on e.id = s.personal_id
        where c.estado <= 4 and c.estado >=1
        group by c.id
        union 
        SELECT c.id as idcontacto, c.nombres, c.apellidos, c.telefono, c.estado, e.id as idpersonal, concat_ws(' ', e.nombres, e.apellidos) as nomVendedor, concat_ws('-', c.id, c.personal_id) AS vendedor, concat_ws('-', s.contacto_id, s.personal_id) as comentador, e.nombres as personal , 0 as totalcomentarios, count(s.comentario) as comentariosvendedor FROM contactos c
        inner join seguimientos s on c.id = s.contacto_id
        inner join personales e on e.id = s.personal_id
        WHERE concat_ws('-', c.id, c.personal_id) LIKE concat_ws('-', s.contacto_id, s.personal_id)
        and c.estado <= 4 and c.estado >=1
        group by concat_ws('-', s.contacto_id, s.personal_id)
        union 
        select c.id as idcontacto, c.nombres, c.apellidos, c.telefono, c.estado, e.id as idpersonal, concat_ws(' ', e.nombres, e.apellidos) as nomVendedor, 0 as comentador, 0 as vendedor, 0 as personal, 0 as totalcomentarios, 0 as comentariosvendedor from contactos c 
        inner join personales e on e.id = c.personal_id
        where estado <= 4 and estado >=1
    ) a 
group by idcontacto


*/