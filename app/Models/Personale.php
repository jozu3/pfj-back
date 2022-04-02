<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Seguimiento;
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
    
    public function grupos(){
    	return $this->hasMany(Grupo::class);
    }
}
