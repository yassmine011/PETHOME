<?php

namespace Database\Factories;

use App\Models\Avis;
use App\Models\User;
use App\Models\Animal;
use Illuminate\Database\Eloquent\Factories\Factory;

class AvisFactory extends Factory
{
    protected $model = Avis::class;

    public function definition()
    {
        return [
            'user_id' => User::factory(),
            'animal_id' => Animal::factory(),
            'commentaire' => $this->faker->text(200),
            'date_avis' => $this->faker->dateTimeBetween('-6 months', 'now'),
        ];
    }
}
