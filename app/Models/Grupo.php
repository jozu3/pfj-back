<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programa;
use App\Models\Personale_grupo;

class Grupo extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];
    
    public function Programa(){
    	return $this->belongsTo(Programa::class);
    }


    public function capacitaciones(){
        return $this->hasMany(Capacitacione::class);
    } 

    public function personale_grupos()   {
        return $this->hasMany(Personale_grupo::class);
    }
}
