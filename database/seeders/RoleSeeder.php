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
        $role1 = Role::create(['name' => 'Admin']);
        $role2 = Role::create(['name' => 'Usuario']);


        Permission::create(['name' => 'ejemplares'])->assignRole($role1);
        Permission::create(['name' => 'libros'])->assignRole($role1);
        Permission::create(['name' => 'autores'])->assignRole($role1);
        Permission::create(['name' => 'prestamos'])->syncRoles([$role1, $role2]);
    }
}
