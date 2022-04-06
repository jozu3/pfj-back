<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use App\Models\Inscripcione;
use App\Models\Personale_grupo;

class PersonaleGrupoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $inscripciones = Inscripcione::whereNotIn('role_id', [1,2,3])->get();

        foreach ($inscripciones as $inscripcione) {
            $grupos = $inscripcione->programa->grupos;
            
            Personale_grupo::create([
                'grupo_id' => $faker->randomElement($grupos)->id,
                'personale_id' => $inscripcione->id
            ]);
        }

    }
}
