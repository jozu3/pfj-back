<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscripcione;
use App\Models\Personale;
use App\Models\Programa;
use App\Models\User;
use App\Models\Contacto;
use Faker\Generator as Faker;

class PersonaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {

        //matrimonios
        $matrimonios_users = User::factory(10)->create();
        $matrimonios_contactos = Contacto::factory(10)->create();

        $i = 0;

        foreach ($matrimonios_users as $matrimonio){
            $matrimonio->assignRole('Matrimonio Director');

            $personale = Personale:: create([
                'contacto_id' => $matrimonios_contactos[$i]->id,
                'user_id' => $matrimonio->id
            ]);

            Inscripcione::create([
                "personale_id" => $personale->id,
                "programa_id" => Programa::all()->random()->id,
                "estado" => 1,
                "fecha" => date('Y-m-d'),
            ]);

            $i = $i+1;
        }

        //consejeros
        $i = 0;

        $consejeros_users = User::factory(50)->create();
        $consejeros_contactos = Contacto::factory(50)->create();

        foreach ($consejeros_users as $consejero){
            $consejero->assignRole('Consejero');

            $personale = Personale:: create([
                'contacto_id' => $consejeros_contactos[$i]->id,
                'user_id' => $consejero->id
            ]);
            
            Inscripcione::create([
                "personale_id" => $personale->id,
                "programa_id" => Programa::all()->random()->id,
                "estado" => 1,
                "fecha" => date('Y-m-d'),
            ]);

            $i = $i+1;

        }
    }
}
