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
            'name' => 'abdoulahi Diallo',
            'email' => 'abdou@gmail.com',
            'password' => Hash::make('abdou1234'),
            'date_naissance' => '2000-21-06',
            'adresse' => 'Dakar',
            'telephone' => '778888888',
            'sexe' => 'Homme',
            'situation_matrimoniale' => 'Celibataire',
            'nationalite' => 'Senegalais',
            'numero_identite' => '123456789',
            'lieu_naissance' => 'Dakar',



        ]);
        $administrateur->assignRole('Administrateurs');

        $gestionnaires = User::create([
            'name' => 'samba Diouf',
            'email' => 'samba@gmail.com',
            'password' => Hash::make('samba1234'),
            'date_naissance' => '2000-21-06',
            'adresse' => 'Dakar',
            'telephone' => '778888888',
            'sexe' => 'Homme',
            'situation_matrimoniale' => 'Celibataire',
            'nationalite' => 'Senegalais',
            'numero_identite' => '123456789',
            'lieu_naissance' => 'Dakar',

        ]);
        $gestionnaires->assignRole('Gestionnaires');
        // Creating Admin User
        $employees = User::create([
            'name' => ' Pape BirameSembene',
            'email' => 'sembene@gmail.com',
            'password' => Hash::make('sembene1234'),
            'date_naissance' => '1998-12-12',
            'adresse' => 'Dakar',
            'telephone' => '778888888',
            'sexe' => 'Homme',
            'situation_matrimoniale' => 'Celibataire',
            'nationalite' => 'Senegalais',
            'numero_identite' => '123456789',
            'lieu_naissance' => 'Dakar',
        ]);
        $employees->assignRole('employees');

    }
}
