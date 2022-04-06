<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personale_companerismo;
use App\Models\Seguimiento;
use App\Models\Programa;
use App\Models\Contacto;
use App\Models\User;
use App\Models\Inscripcione;

class Personale extends Model
{
    use HasFactory;

    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function seguimientos(){
        return $this->hasMany(Seguimiento::class);
    }

    public function user(){
    	return $this->belongsTo(User::class);
    }

    public function inscripciones(){
        return $this->hasMany(Inscripcione::class);
    }

    public function contacto(){
    	return $this->belongsTo(Contacto::class);
    }
    
    public function personale_companerismos(){
    	return $this->hasMany(Personale_companerismo::class);
    }
    public function rolPrograma(Programa $programa){
        return Inscripcione::where('programa_id', $programa->id)->where('personale_id', $this->id)->first()->role;
    }
}
