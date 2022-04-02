<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Contacto;
use App\Models\Seguimiento;
use App\Models\Personale;
use Faker\Generator as Faker;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $nom_admin_1 = 'Josué';
        $ape_admin_1 = 'Vitate';

        $user1 = User::create([
            'name' => $nom_admin_1.' '.$ape_admin_1,
            'email' => 'josue.vitate@gmail.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ]);
        $user1->assignRole('Admin');


        $contacto = Contacto::create([
            'nombres' => $nom_admin_1,
            'apellidos' => $ape_admin_1,
            'telefono' => $faker->phoneNumber(),
            'email' => $faker->unique()->safeEmail,
            'doc' => $faker->unique()->dni,
            'estado' => $faker->numberBetween($min = 0, $max = 3),
        ]);

        Personale::create([
            'permiso_obispo' => 1,
            'contacto_id' => $contacto->id,
            'user_id' => $user1->id,
        ]);
        
        /*
        Personale::create([
            'nombres' => $nom_admin_2,
            'apellidos' => $ape_admin_2,
            'telefono' => '987564321',
            'user_id' => 2,
        ]);*/

//Coordinador
      /*  $nom_admin_3 = 'Carlos';
        $ape_admin_3 = 'Cumba';

        User::create([
            'name' => $nom_admin_3.' '.$ape_admin_3,
            'email' => 'direccionacademica@gmail.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Coordinador');

        Personale::create([
            'nombres' => $nom_admin_3,
            'apellidos' => $ape_admin_3,
            'telefono' => '987564321',
            'user_id' => 3,
        ]);


//Asistente
        $nom_admin_4 = 'Karol';
        $ape_admin_4 = 'Mendoza';


        User::create([
            'name' => $nom_admin_4.' '.$ape_admin_4,
            'email' => 'karolinyawaperu@gmail.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Asistente');

        Personale::create([
            'nombres' => $nom_admin_4,
            'apellidos' => $ape_admin_4,
            'telefono' => '987564321',
            'user_id' => 4,
        ]);


//Vendedor

        $nom_admin_5 = 'Martin';
        $ape_admin_5 = 'Carbajal';


        User::create([
            'name' => $nom_admin_5.' '.$ape_admin_5,
            'email' => 'm.carbajal@inyawaperu.com',
            'estado' => 1,
            'password' => bcrypt('password')
        ])->assignRole('Vendedor');

        Personale::create([
            'nombres' => $nom_admin_5,
            'apellidos' => $ape_admin_5,
            'telefono' => '987564321',
            'user_id' => 5,
        ]);        
*/
    }
}
