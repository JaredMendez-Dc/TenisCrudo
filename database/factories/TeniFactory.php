<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teni>
 */
class TeniFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
                'color' => $this->faker->safeColorName(),
                'talla' => $this->faker->numberBetween(35, 45),
                'costo' => $this->faker->randomFloat(2, 50, 500),
                'marca_id' => $this->faker->numberBetween(1, 2),
                'categoria' => $this->faker->word(),
                'image' => ''            
        ];
    }
}
