<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DentalHistory>
 */
class DentalHistoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reason_medical_visit' => $this->faker->text(20),
            'medications' => $this->faker->boolean(),
            'wath_medication' => $this->faker->text(20),
            'dental_trauma' => $this->faker->boolean(),
            'wath_dental_trauma' => $this->faker->text(20),
            'speaking_difficulty' => $this->faker->boolean(),
            'chewing_difficulty' => $this->faker->boolean(),
            'openning_the_mounth_difficulty' => $this->faker->boolean(),
            'have_pain' => $this->faker->boolean(),
            'where_is_pain' => $this->faker->text(20),
            'caused_by' => $this->faker->text(20),
            'pain_type' => $this->faker->text(20),
            'calms_with' => $this->faker->text(20),
            'gums_bleed' => $this->faker->boolean(),
            'abnormal_lips' => $this->faker->boolean(),
            'abnormal_lips_linjury' => $this->faker->text(20),
            'abnormal_cheeks' => $this->faker->boolean(),
            'abnormal_cheeks_injury' => $this->faker->text(20),
            'abnormal_gums' => $this->faker->boolean(),
            'abnormal_gums_ingury' => $this->faker->text(20),
            'abnormal_palate' => $this->faker->boolean(),
            'abnormal_palate_injury' => $this->faker->text(20),
            'abnormal_tongue' => $this->faker->boolean(),
            'abnormal_tongue_injury' => $this->faker->text(20),
            'abnormal_under_tongue' => $this->faker->boolean(),
            'abnormal_under_tongue_injury' => $this->faker->text(20),
            'anywhere_else_abnormal' => $this->faker->text(20),
            'how_is_injury' => $this->faker->text(20),
            'injury_has_pus' => $this->faker->boolean(),
            'when_has_pus' => $this->faker->text(20),
            'has_ulcers' => $this->faker->boolean(),
            'when_has_ulcers' => $this->faker->text(20),
            'patient_id' => Patient::inRandomOrder()->first()->id
        ];
    }
}
