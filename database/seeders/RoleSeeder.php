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
         $administrateurs=Role::create(['name' => 'Administrateurs']);
        $gestionnaires = Role::create(['name' => 'Gestionnaires']);
        $employees = Role::create(['name' => 'employees']);
        $administrateurs->givePermissionTo([
            'manage-departement',
            'manage-poste',
            'manage-conge',
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

        $employees->givePermissionTo([
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
