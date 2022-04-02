<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Pfj;
use App\Models\Inscripcione;
use App\Models\Personale_unidade;

class Programa extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function grupos(){
        return $this->hasMany(Grupo::class);
    }

    public function pfj(){
        return $this->belongsTo(Pfj::class);
    }

    public function inscripciones(){
    	return $this->hasMany(Inscripcione::class);
    }

    public function inscripcioneEstado($estados = []){
        $inscripcione = Inscripcione::where('programa_id', $this->id)->whereIn('estado', $estados)->get();
        return $inscripcione;
    }

    public function notasGenerateds(){
        $notas_generadas = 0;

        foreach ($this->grupos as $grupo){
            $notas_generadas += $grupo->personale_unidades->count();
        }

        return $notas_generadas;
    }

    public function clasesGenerateds(){
        $capacitaciones_generadas = 0;

        foreach ($this->grupos as $unidad){
            $capacitaciones_generadas += $unidad->capacitaciones->count();
        }

        return $capacitaciones_generadas;
    }

    public function personaleGrupoesporInscripcione(){
        $personale_unidades = 0;

        foreach ($this->grupos as $grupo){
            $personale_unidades = Personale_unidade::select('grupo_id', 'inscripcione_id')->where('grupo_id', $grupo->id)->count();
        }

        return $personale_unidades;
    }

}
/*
Estados
'0' => 'Por iniciar',
'1' => 'Iniciado',
'2' => 'Terminado',

*/