<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Personale;
use App\Models\User;
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
        $matrimonios_users = User::factory(8)->create(); // user_ids -> 13-19

        foreach ($matrimonios_users as $matrimonio){
            $matrimonio->assignRole('Matrimonio Director');
        }

        //personal sin rol
        $consejeros_users = User::factory(10)->create();
        foreach ($consejeros_users as $consejero){
            $consejero->assignRole('Consejero');
        }
        Personale::factory(10)->create();

    }
}
