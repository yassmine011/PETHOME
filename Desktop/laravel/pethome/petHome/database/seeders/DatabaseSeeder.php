<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
{
    \App\Models\Categorie::factory(5)->create();
    
    \App\Models\User::factory(10)->create()->each(function ($user) {
        \App\Models\Adresse::factory()->create(['user_id' => $user->id]);
    });
    \App\Models\Categorie::factory(5)->create();
    \App\Models\User::factory(10)->create();
    \App\Models\Adresse::factory(10)->create();
    \App\Models\Animal::factory(20)->create();
    \App\Models\Commande::factory(15)->create();
    \App\Models\Paiement::factory(15)->create();
    \App\Models\Avis::factory(30)->create();
}

}