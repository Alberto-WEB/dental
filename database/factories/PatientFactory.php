<?php

namespace Database\Factories;

use App\Models\Dentist;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'age' => $this->faker->randomNumber(),
            'sex' => $this->faker->randomElement(['Hombre', 'Mujer', 'Otro']),
            'address' => $this->faker->address(),
            'civil_status' => $this->faker->randomElement(['Casado', 'Soltero', 'Divorciado', 'Viudo']),
            'religion' => $this->faker->randomElement(['Catolico', 'Judio', 'Infu']),
            'occupation' => $this->faker->randomElement(['Comerciante', 'Doctor', 'Servicio Publico', 'Carpintero', 'Ingeniero']),
            'phone' => $this->faker->phoneNumber(),
            'email_patient' => $this->faker->unique()->safeEmail(),
            //'status' => $this->faker->randomElement(['Activado', 'Desactivado']),
            'dentist_id' => Dentist::inRandomOrder()->first()->id
        ];
    }
}
