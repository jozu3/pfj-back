<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Grupo;
use App\Models\User;

class Cord_auxiliare extends Model
{
    use HasFactory;
    protected $guarded = ['id', 'created_at', 'updated_at'];

 /*   public function grupo(){
        return $this->hasOne(Grupo::class);
    }
*/
    public function user(){
        return $this->belongsTo(User::class);
    }

}