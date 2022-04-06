<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Programa;
use App\Models\Personale_companerismo;

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

}
