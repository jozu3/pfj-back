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
            'email' => $user1->email,
            'doc' => $faker->unique()->dni,
            'estado' => $faker->numberBetween($min = 0, $max = 3),
        ]);

        Personale::create([
            'permiso_obispo' => 1,
            'contacto_id' => $contacto->id,
            'user_id' => $user1->id,
        ]);
        
    }
}
