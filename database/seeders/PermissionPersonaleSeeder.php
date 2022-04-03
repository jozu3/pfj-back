<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class PermissionPersonaleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /**************************Permisos del personale*************************/
        $role1 = Role::where('name','Admin')->first();
        $role6 = Role::where('name','Consejero')->first();

        //permisos 

        Permission::create(['name' => 'student.home', 'description' => 'Ingresar a perfil de estudiante'])->syncRoles([$role6, $role1]);
        Permission::create(['name' => 'student.programas.index', 'description' => 'Ver sus programas'])->syncRoles([$role6, $role1]);
        Permission::create(['name' => 'student.grupos.index', 'description' => 'Ver sus grupos'])->syncRoles([$role6, $role1]);
        Permission::create(['name' => 'student.anuncios.index', 'description' => 'Ver todos los anuncios'])->syncRoles([$role6, $role1]);
        Permission::create(['name' => 'student.capacitaciones.index', 'description' => 'Ver todos los anuncios'])->syncRoles([$role6, $role1]);
        Permission::create(['name' => 'student.lecturas.index', 'description' => 'Ver sus lecturas'])->syncRoles([$role6, $role1]);
        Permission::create(['name' => 'student.lecturas.edit', 'description' => 'Editar sus lecturas'])->syncRoles([$role6, $role1]);


    }
}