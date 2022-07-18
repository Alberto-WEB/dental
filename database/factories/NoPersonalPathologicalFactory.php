<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NoPersonalPathological>
 */
class NoPersonalPathologicalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'drugs' => $this->faker->boolean(),
            'drugs_take' => $this->faker->text(20),
            'smoke' => $this->faker->boolean(),
            'smoke_frequency' => $this->faker->text(20),
            'alcohol' => $this->faker->boolean(),
            'alcohol_frequency' => $this->faker->text(20),
            'pregnant' => $this->faker->boolean(),
            'pregnant_weeks' => $this->faker->text(20),
            'pregnancy_number' => $this->faker->text(20),
            'd_p_p' => $this->faker->date(),
            'patient_id' => Patient::inRandomOrder()->first()->id
        ];
    }
}
