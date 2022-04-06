<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Grupo;
use App\Models\Personale_grupo;
use App\Models\Personale;
use Faker\Generator as Faker;

class GrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $grupos = Grupo::factory(100)->create();
        

        // foreach ($grupos as $grupo){

		// 	Personale_grupo::create([
        //         'grupo_id' => $grupo->id,
        //         'personale_id' => $faker->randomElement(Personale::all()->pluck('id'))
        //     ]);
        // }
    }
}
