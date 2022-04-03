<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personale;
use App\Models\Personale_nota;

class Personale_grupo extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function grupo(){
    	return $this->belongsTo(Grupo::class);
    }
    
    public function inscripcione(){
    	return $this->belongsTo(Inscripcione::class);
    }

    public function personaleNotas(){
    	return $this->hasMany(Personale_nota::class);
    }

    public function personaleNotasorden($orden){
        return Personale_nota::select('personale_notas.valor as valorpersonale_nota', 'notas.descripcion as descripcionnota', 'notas.tipo as tiponota')->join('notas', 'personale_notas.nota_id', '=', 'notas.id')->where('personale_unidade_id', $this->id)->orderBy('notas.tipo', $orden)->get();
    }
}
