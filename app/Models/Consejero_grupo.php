<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personale_grupo extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function grupo(){
    	return $this->belongsTo(Grupo::class);
    }
    public function personale(){
    	return $this->belongsTo(Personale::class);
    }
  
}
