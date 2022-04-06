<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Inscripcione;
use App\Models\Personale_grupo;
use App\Models\Personale;
use App\Models\Programa;
use Spatie\Permission\Models\Role;
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
        $matrimonios_users = User::factory(40)->create();
        $matrimonios_contactos = Contacto::factory(40)->create();

        $i = 0;

        foreach ($matrimonios_users as $matrimonio){
            $matrimonio->assignRole('Matrimonio Director');

            $personale = Personale:: create([
                'contacto_id' => $matrimonios_contactos[$i]->id,
                'user_id' => $matrimonio->id,
            ]);

            $personale->contacto->update([
                'email' => $matrimonio->email
            ]);

            $personale->user->update([
                'name' => $personale->contacto->nombres . ' ' . $personale->contacto->apellidos
            ]);
            
            Inscripcione::create([
                "personale_id" => $personale->id,
                "programa_id" => Programa::all()->random()->id,
                'role_id' => Role::find(2)->id,
                "estado" => 1,
                "fecha" => date('Y-m-d'),
            ]);

            $i = $i+1;
        }

        //consejeros
        $i = 0;

        $consejeros_users = User::factory(500)->create();
        $consejeros_contactos = Contacto::factory(500)->create();

        foreach ($consejeros_users as $consejero){
            $consejero->assignRole('Consejero');

            $personale = Personale:: create([
                'contacto_id' => $consejeros_contactos[$i]->id,
                'user_id' => $consejero->id,
            ]);

            $personale->contacto->update([
                'email' => $consejero->email,
                'estado' => 5
            ]);
            
            $personale->user->update([
                'name' => $personale->contacto->nombres . ' ' . $personale->contacto->apellidos
            ]);
            
            $inscripcione = Inscripcione::create([
                "personale_id" => $personale->id,
                "programa_id" => Programa::all()->random()->id,
                'role_id' => Role::find(6)->id,
                "estado" => 1,
                "fecha" => date('Y-m-d'),
            ]);

            $i = $i+1;
         /*   $grupos = $inscripcione->programa->grupos;


            Personale_grupo::create([
                'grupo_id' => $faker->randomElement($grupos)->id,
                'personale_id' => $inscripcione->id
            ]);*/

        }

        $inscripciones = Inscripcione::whereNotIn('role_id', [1,2,3])->get();
        
        foreach ($inscripciones as $inscripcione) {
            Personale_grupo::create([
                'grupo_id' => $faker->randomElement($inscripcione->programa->grupos)->id,
                'personale_id' => $inscripcione->personale->id
            ]);
        }

        


    }
}
