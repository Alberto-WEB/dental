<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Consumable>
 */
class ConsumableFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'material_name' => $this->faker->name(),
            'price_general' => $this->faker->numberBetween($min = 1000, $max = 2000),
            'amount_package' => $this->faker->numberBetween($min = 100, $max = 200),
            'unit_price' => $this->faker->numberBetween($min = 100, $max = 900),
            'price_final' => $this->faker->numberBetween($min = 1500, $max = 6000),
        ];
    }
}
