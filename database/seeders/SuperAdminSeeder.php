<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Creating Super Admin User
        $administrateur = User::create([
            'name' => 'abdoulahi',
            'email' => 'abdou@gmail.com',
            'password' => Hash::make('abdou1234')
        ]);
        $administrateur->assignRole('Administrateurs');

        // Creating Admin User
        $utilisateurs = User::create([
            'name' => 'Sembene',
            'email' => 'sembene@gmail.com',
            'password' => Hash::make('sembene1234')
        ]);
        $utilisateurs->assignRole('Utilisateurs');

        // Creating Product Manager User
        $gestionnaires = User::create([
            'name' => 'samba',
            'email' => 'samba@gmail.com',
            'password' => Hash::make('samba1234')
        ]);
        $gestionnaires->assignRole('Gestionnaires');
    }
}
