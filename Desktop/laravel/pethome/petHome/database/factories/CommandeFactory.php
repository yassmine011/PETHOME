<?php

namespace Database\Factories;

use App\Models\Commande;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Animal;


class CommandeFactory extends Factory
{
    protected $model = Commande::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'date_commandea' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'statut' => $this->faker->randomElement(['en_attente', 'confirmee', 'expediee', 'livree', 'annulee','en cours']),
            'total' => $this->faker->randomFloat(2, 20, 500),
            'animaux_id' => Animal::factory(),

        ];
    }
}
