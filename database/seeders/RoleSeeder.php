<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $role1 = Role::create(['name' => 'Admin', 'slug' => 'admin']);
        $role2 = Role::create(['name' => 'Matrimonio Director', 'slug' => 'mdirector']);
        $role3 = Role::create(['name' => 'Matrimonio de Logística', 'slug' => 'mlogística']);
        $role4 = Role::create(['name' => 'Cordinador', 'slug' => 'cordinador']);
        $role5 = Role::create(['name' => 'Cordinador auxiliar', 'slug' => 'cordauxiliar']);
        $role6 = Role::create(['name' => 'Consejero', 'slug' => 'consejero']);        

        Permission::create(['name' => 'admin.home', 'description' => 'Ver el panel administratico'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);

        //Permisos USUARIO
        Permission::create(['name' => 'admin.users.index', 'description' => 'Ver listado de usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.create', 'description' => 'Crear usuarios'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.users.edit', 'description' => 'Editar usuarios'])->syncRoles([$role1]);
        //Permisos ROL
        Permission::create(['name' => 'admin.roles.index', 'description' => 'Ver listado de roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.create', 'description' => 'Crear roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.edit', 'description' => 'Editar roles'])->syncRoles([$role1]);
        Permission::create(['name' => 'admin.roles.destroy', 'description' => 'Eliminar roles'])->syncRoles([$role1]);
        
        //Permisos Contacto
        Permission::create(['name' => 'admin.contactos.index', 'description' => 'Ver listado de contactos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.create', 'description' => 'Crear contactos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.edit', 'description' => 'Editar contactos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.editAll', 'description' => 'Editar cualquier contacto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactos.asignarVendedor', 'description' => 'Asignar vendedor'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.contactos.destroy', 'description' => 'Eliminar Contactos'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.contactos.destroyAll', 'description' => 'Eliminar cualquier contacto'])->syncRoles([$role1, $role2]);

        //Permisos Seguimiento
        Permission::create(['name' => 'admin.seguimientos.index', 'description' => 'Ver listado de comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.create', 'description' => 'Crear comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.edit', 'description' => 'Editar comentarios'])->syncRoles([$role1, $role2, $role3]);
        Permission::create(['name' => 'admin.seguimientos.destroy', 'description' => 'Eliminar comentarios'])->syncRoles([$role1, $role2, $role3]);
        
        //Permisos personale
        Permission::create(['name' => 'admin.personales.index', 'description' => 'Ver listado de personales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.personales.create', 'description' => 'Crear personales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.personales.edit', 'description' => 'Editar personales'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.personales.destroy', 'description' => 'Eliminar personales'])->syncRoles([$role1, $role2, $role3, $role4]);

        //Permisos pfj
        Permission::create(['name' => 'admin.pfjs.index', 'description' => 'Ver listado de pfjs'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.pfjs.create', 'description' => 'Crear pfjs'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.pfjs.edit', 'description' => 'Editar pfjs'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.pfjs.destroy', 'description' => 'Eliminar pfjs'])->syncRoles([$role1, $role2, $role4]);

        //Permisos programa/sesion
        Permission::create(['name' => 'admin.programas.index', 'description' => 'Ver listado de programas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.programas.create', 'description' => 'Crear programas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.programas.edit', 'description' => 'Editar programas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.programas.destroy', 'description' => 'Eliminar programas'])->syncRoles([$role1, $role2, $role4]);
        Permission::create(['name' => 'admin.programas.viewList', 'description' => 'Ver lista de personales de todos los programas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.programas.misprogramas', 'description' => 'Ver lista de personales de todos los programas'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.programas.grupos', 'description' => 'Ver los grupos de su sesión'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        
        //Permisos grupo
        Permission::create(['name' => 'admin.grupos.index', 'description' => 'Ver listado de grupos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.grupos.create', 'description' => 'Crear grupos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.grupos.edit', 'description' => 'Editar grupos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.grupos.destroy', 'description' => 'Eliminar grupos'])->syncRoles([$role1, $role2, $role3, $role4, $role5]);
        Permission::create(['name' => 'admin.grupos.migrupo', 'description' => 'Ver el grupo del que es cordinador auxiliar'])->syncRoles([$role1, $role4, $role5]);

        //Permisos Nota
        Permission::create(['name' => 'admin.notas.index', 'description' => 'Ver listado de notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.notas.create', 'description' => 'Crear notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.notas.edit', 'description' => 'Editar notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.notas.destroy', 'description' => 'Eliminar notas'])->syncRoles([$role1, $role2, $role4, $role5]);

        //Permisos inscripciones
        Permission::create(['name' => 'admin.inscripciones.index', 'description' => 'Ver listado de inscripciones'])->syncRoles([$role1, $role2, $role3, $role4]);
        Permission::create(['name' => 'admin.inscripciones.create', 'description' => 'Crear inscripciones'])->syncRoles([$role1, $role2, $role3,]);
        Permission::create(['name' => 'admin.inscripciones.createAll', 'description' => 'Crear inscripciones de cualquier contacto'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.inscripciones.edit', 'description' => 'Editar inscripciones'])->syncRoles([$role1, $role2, $role3,]);
        Permission::create(['name' => 'admin.inscripciones.destroy', 'description' => 'Eliminar inscripciones'])->syncRoles([$role1, $role2, $role3,]);

         //Permisos Obligacione
        Permission::create(['name' => 'admin.obligaciones.index', 'description' => 'Ver listado de obligaciones de pago'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.obligaciones.create', 'description' => 'Crear obligaciones de pago'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.obligaciones.edit', 'description' => 'Editar obligaciones de pago'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.obligaciones.destroy', 'description' => 'Eliminar obligaciones de pago'])->syncRoles([$role1, $role2]);

         //Permisos Pagos
        Permission::create(['name' => 'admin.pagos.index', 'description' => 'Ver listado de pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.create', 'description' => 'Crear pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.edit', 'description' => 'Editar pagos'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.pagos.destroy', 'description' => 'Eliminar pagos'])->syncRoles([$role1]);

         //Permisos Cuentas
        Permission::create(['name' => 'admin.cuentas.index', 'description' => 'Ver listado de cuentas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cuentas.create', 'description' => 'Crear cuentas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cuentas.edit', 'description' => 'Editar cuentas'])->syncRoles([$role1, $role2]);
        Permission::create(['name' => 'admin.cuentas.destroy', 'description' => 'Eliminar cuentas'])->syncRoles([$role1, $role2]);

        //Permisos personale grupo
        Permission::create(['name' => 'admin.personale_companerismos.index', 'description' => 'Ver listado de personale grupos'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.personale_companerismos.create', 'description' => 'Crear personale grupos'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.personale_companerismos.edit', 'description' => 'Editar personale grupos'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.personale_companerismos.destroy', 'description' => 'Eliminar personale grupos'])->syncRoles([$role1, $role2, $role4, $role5]);

        //Permisos personale nota
        Permission::create(['name' => 'admin.personale_notas.index', 'description' => 'Ver listado de personale notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.personale_notas.create', 'description' => 'Crear personale notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.personale_notas.edit', 'description' => 'Editar personale notas'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.personale_notas.destroy', 'description' => 'Eliminar personale notas'])->syncRoles([$role1, $role2, $role4, $role5]);

         //Permisos capacitaciones
        Permission::create(['name' => 'admin.capacitaciones.index', 'description' => 'Ver listado de capacitaciones'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.capacitaciones.create', 'description' => 'Crear capacitaciones'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.capacitaciones.edit', 'description' => 'Editar capacitaciones'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.capacitaciones.destroy', 'description' => 'Eliminar capacitaciones'])->syncRoles([$role1, $role2, $role4, $role5]);

         //Permisos asistencias
        Permission::create(['name' => 'admin.asistencias.index', 'description' => 'Ver listado de asistencias'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.asistencias.create', 'description' => 'Crear asistencias'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.asistencias.edit', 'description' => 'Editar asistencias'])->syncRoles([$role1, $role2, $role4, $role5]);
        Permission::create(['name' => 'admin.asistencias.destroy', 'description' => 'Eliminar asistencias'])->syncRoles([$role1, $role2, $role4, $role5]);




    }
}
