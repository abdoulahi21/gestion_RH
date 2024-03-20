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
            'manage-employees',
            'manage-contracts',
            'manage-talents',
            'manage-documents',
            'manage-absences',
            'manage-leave',
            'view-dashboard',
            'create-user',
            'edit-user',
            'delete-user',
            'create-role',
            'edit-role',
            'delete-role',
            'manage-departement',
            'manage-poste',
            'manage-conge',
        ]);

        $gestionnaires->givePermissionTo([
            'view-dashboard',
            'manage-employees',
            'manage-contracts',
            'manage-talents',
            'manage-documents',
            'manage-absences',
            'manage-leave',
            'manage-departement',
            'manage-poste',
            'manage-conge',
        ]);

        $utilisateurs->givePermissionTo([
            'view-employees',
            'view-contracts',
            'view-talents',
            'view-documents',
            'view-absences',
            'view-leave',
            'view-departement',
            'view-poste',
            'view-conge',
        ]);
    }
}
