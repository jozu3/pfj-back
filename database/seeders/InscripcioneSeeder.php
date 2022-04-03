<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscripcione;
use App\Models\Programa;
use App\Models\User;

class InscripcioneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      //  Inscripcione::factory(150)->create();
      $matrimonio_users = User::whereHas("roles", function($q) {
                    $q->whereIn("name", ['Matrimonio Director']); 
          });
          
      foreach ($matrimonio_users as $user){
        Inscripcione::create([
          "personale_id" => $user->personale->id,
          "programa_id" => Programa::all()->random()->id,
          "estado" => 1,
          "fecha" => new DateTime('NOW'),
        ]);
      }
    }
}