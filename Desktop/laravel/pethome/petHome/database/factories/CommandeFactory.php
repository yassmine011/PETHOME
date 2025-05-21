<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommandeFactory extends Factory
{
    protected $model = Commande::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date_commande' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'statut' => $this->faker->randomElement(['en cours', 'livrée', 'annulée']),
            'total' => $this->faker->randomFloat(2, 20, 500),
        ];
    }
}
