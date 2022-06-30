<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Dentist>
 */
class DentistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'company_name' => $this->faker->name(),
            'rfc' => $this->faker->name(),
            'street' => $this->faker->name(),
            'house_number' => $this->faker->randomNumber(),
            'postal_code' => $this->faker->randomNumber(),
            'state' => $this->faker->country(),
            'city' => $this->faker->city(),
            'phone' => $this->faker->phoneNumber(),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
