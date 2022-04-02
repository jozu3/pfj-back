<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Asistencia;

class CreateAsistencia extends Component
{
	public $clase_id;
	public $inscripcione_id;
	public $asistencia;
	public $result = false;
	public $readyToLoad = false;
	public $is_report = false;

	public function saveAsistencia(){
		
		$asis = Asistencia::where('clase_id', $this->clase_id)->where('inscripcione_id', $this->inscripcione_id)->first();

		if(isset($asis)){
			$this->result = $asis->update([
				'asistencia' => $this->asistencia,
			]);

    	} else {
			$new_asis = Asistencia::create([
				'clase_id' => $this->clase_id,
				'inscripcione_id' => $this->inscripcione_id,
				'asistencia' => $this->asistencia,
			]);

			if ($new_asis->id != 0) {
				$this->result = true;
			}
    	}

    	if ($this->result) {
				$this->emit('alert', $this->result);				
		}
	}

	public function loadPosts(){
		$this->readyToLoad = true;	
	}

    public function render()
    {
    	//if ($this->readyToLoad) {
	    	$asis = Asistencia::where('clase_id', $this->clase_id)->where('inscripcione_id', $this->inscripcione_id)->first();
	    	if(isset($asis)){
	    		$this->asistencia = $asis->asistencia;
	    	}
    	/*} else {
    		$asis = [];
    	}*/

        return view('livewire.admin.create-asistencia');
    }
}
