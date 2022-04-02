<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programa;
use App\Models\Cord_auxiliare;
use App\Models\Nota;

class Grupo extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function Programa(){
    	return $this->belongsTo(Programa::class);
    }

    public function cordAuxiliare(){
    	return $this->belongsTo(Cord_auxiliare::class);
    }

    public function notas(){
        return $this->hasMany(Nota::class);
    }

    public function capacitaciones(){
        return $this->hasMany(Capacitacione::class);
    } 

    public function personale_unidades()   {
        return $this->hasMany(Personale_unidade::class);
    }
}
