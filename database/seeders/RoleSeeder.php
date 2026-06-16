<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $role_admin = Role::updateOrCreate([
            'name' => 'admin',
            ],
            ['name' => 'admin']
        );
        $role_agent =Role::updateOrCreate([
            'name' => 'agent',
            ],
            ['name' => 'agent']
        );

        $role_anggota =Role::updateOrCreate([
            'name' => 'anggota',
            ],
            ['name' => 'anggota']
        );
    }
}
