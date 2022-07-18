<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\InheritFamily>
 */
class InheritFamilyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'f_sicks' => $this->faker->boolean(),
            'm_sicks' => $this->faker->text(20),
            'f_alive' => $this->faker->boolean(),
            'm_alive' => $this->faker->boolean(),
            'pa_gf_alive' => $this->faker->boolean(),
            'ma_gm_alive' => $this->faker->boolean(),
            'pa_gm_alive' => $this->faker->boolean(),
            'ma_gf_alive' => $this->faker->boolean(),
            'pa_gf_sicks' => $this->faker->text(20),
            'pa_gm_sicks' => $this->faker->text(20),
            'ma_gf_sicks' => $this->faker->text(20),
            'ma_gm_sicks' => $this->faker->text(20),
            'others_alive' => $this->faker->text(20),
            'others_sicks' => $this->faker->text(20),
            'patient_id' => Patient::inRandomOrder()->first()->id
        ];
    }
}
