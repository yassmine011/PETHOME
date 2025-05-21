<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Adresse>
 */
class AdresseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
   public function definition(): array
{
    return [
        'ville' => $this->faker->city,
        'rue' => $this->faker->streetName,
        'code_postal' => $this->faker->postcode,
        'pays' => $this->faker->country,
        'user_id' => \App\Models\User::factory(), // clé étrangère
    ];
}

}
