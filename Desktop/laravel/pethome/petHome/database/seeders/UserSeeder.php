<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Créer un utilisateur admin
        User::create([
            'nom' => 'Admin',
            'prenom' => 'System',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'),
            'telephone' => '1234567890',
            'role' => 'admin',
        ]);

        // Créer quelques utilisateurs clients
        User::create([
            'nom' => 'Dupont',
            'prenom' => 'Jean',
            'email' => 'jean@example.com',
            'password' => Hash::make('password'),
            'telephone' => '9876543210',
            'role' => 'client',
        ]);

        User::create([
            'nom' => 'Martin',
            'prenom' => 'Sophie',
            'email' => 'sophie@example.com',
            'password' => Hash::make('password'),
            'telephone' => '5555555555',
            'role' => 'client',
        ]);
    }
}
