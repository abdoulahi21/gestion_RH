<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
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
        ];

        // Looping and Inserting Array's Permissions into Permission Table
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}
