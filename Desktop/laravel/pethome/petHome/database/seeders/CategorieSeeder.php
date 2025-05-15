<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Categorie;

class CategorieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = [
            [
                'nom' => 'Chiens',
                'description' => 'Tous types de chiens domestiques'
            ],
            [
                'nom' => 'Chats',
                'description' => 'Tous types de chats domestiques'
            ],
            [
                'nom' => 'Oiseaux',
                'description' => 'Oiseaux domestiques et exotiques'
            ],
            [
                'nom' => 'Poissons',
                'description' => 'Poissons d\'eau douce et d\'eau salée'
            ],
            [
                'nom' => 'Reptiles',
                'description' => 'Serpents, lézards et autres reptiles'
            ],
            [
                'nom' => 'Rongeurs',
                'description' => 'Hamsters, lapins, cochons d\'Inde, etc.'
            ],
        ];

        foreach ($categories as $categorie) {
            Categorie::create($categorie);
        }
    }
}
