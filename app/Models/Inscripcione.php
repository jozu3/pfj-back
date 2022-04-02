<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personale;
use App\Models\Asistencia;
use App\Models\Programa;
use App\Models\Obligacione;

class Inscripcione extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function personale(){
    	return $this->belongsTo(Personale::class);
    }

	public function programa(){
    	return $this->belongsTo(Programa::class);
    }

    public function personal(){ //quien realizó la matrícula
    	return $this->belongsTo(Personale::class);
    }

    public function obligaciones(){
        return $this->hasMany(Obligacione::class);
    }

    public function asistencias(){
        return $this->hasMany(Asistencia::class);
    }

    public function personaleUnidades(){
        return $this->hasMany(Personale_unidade::class);
    }

    public function asistenciaCapacitacione(Capacitacione $capacitacione){
        return Asistencia::where('capacitacione_id', $capacitacione->id)->where('inscripcione_id', $this->id)->first();
    }

    public function asistenciasGrupo(Grupo $grupo){
        return Asistencia::where('inscripcione_id', $this->id)
                ->whereHas('clase', function($q) use ($grupo){ 
                    $q->whereHas('grupo', function($qu) use ($grupo){ 
                        $qu->where('id', $grupo->id); 
                    })
                ->where('asistencia', '0');
        })->get();
    }

}
/*
    Estados = [
        0 => Activo/Inscripcionedo
        1 => Retirado
        2 => Suspendido
        3 => Terminado
    ]
*/