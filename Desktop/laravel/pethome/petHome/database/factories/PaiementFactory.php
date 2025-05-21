<?php

namespace Database\Factories;

use App\Models\Paiement;
use App\Models\Commande;
use Illuminate\Database\Eloquent\Factories\Factory;

class PaiementFactory extends Factory
{
    protected $model = Paiement::class;

    public function definition()
    {
        return [
            'commande_id' => Commande::factory(),
            'montant' => $this->faker->randomFloat(2, 20, 500),
            'mode_paiement' => $this->faker->randomElement(['carte bancaire', 'paypal', 'virement']),
            'date_paiement' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
