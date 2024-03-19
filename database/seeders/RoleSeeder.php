<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $administrateur= Role::create(['name' => 'Administrateurs']);
        $gestionnaires = Role::create(['name' => 'Gestionnaires']);
        $utilisateurs = Role::create(['name' => ' Utilisateurs']);

        $administrateur->givePermissionTo([
            'manage-base',
            'alimentent',
            'feed',
            'edit',
            'consult',
            'delete',
            ''

        ]);

        $gestionnaires->givePermissionTo([
            'delete',
            'edit',
            'consult',
            'update'

        ]);

        $utilisateurs->givePermissionTo([
          'consult'
        ]);
    }
}
