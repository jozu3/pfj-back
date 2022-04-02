<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Nota;
use App\Models\Personale_unidade;

class Personale_nota extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

    public function personaleUnidade(){
    	return $this->belongsTo(Personale_unidade::class);
    }
    
    public function nota(){
    	return $this->belongsTo(Nota::class);
    }
}