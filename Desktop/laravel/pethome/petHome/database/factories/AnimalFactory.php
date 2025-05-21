<?php

namespace Database\Factories;

use App\Models\Animal;
use App\Models\Categorie;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<Animal>
 */
class AnimalFactory extends Factory
{
    protected $model = Animal::class;

    public function definition(): array
    {
        return [
            'nom' => $this->faker->firstName,
            'age' => $this->faker->numberBetween(1, 10),
            'date_naissance' => $this->faker->date(),
            'sex' => $this->faker->randomElement(['male', 'femelle']),
            'description' => $this->faker->text(100),
            'prix' => $this->faker->numberBetween(100, 1000),
            'quantite_stock' => $this->faker->numberBetween(1, 10),
            'disponible' => $this->faker->boolean(),
            'photo' => $this->faker->imageUrl(),
            'categories_id' => Categorie::factory(),

        ];
    }
}
