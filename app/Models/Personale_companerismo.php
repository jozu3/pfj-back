<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Personale;

class Personale_companerismo extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function companerismo(){
    	return $this->belongsTo(Companerismo::class);
    }
    
    public function personale(){
    	return $this->belongsTo(Personale::class);
    }

   
}
