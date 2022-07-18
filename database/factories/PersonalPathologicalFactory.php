<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PersonalPathological>
 */
class PersonalPathologicalFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'sarampion' => $this->faker->boolean(),
            'rubeola' => $this->faker->boolean(),
            'varicela' => $this->faker->boolean(),
            'parotiditis' => $this->faker->boolean(),
            'tosferina' => $this->faker->boolean(),
            'escarlatina' => $this->faker->boolean(),
            'other_childern_sicks' => $this->faker->text(20),
            'hip_art' => $this->faker->boolean(),
            'hip_art_since' => $this->faker->text(20),
            'hip_art_medicaments' => $this->faker->text(20),
            'hip_art_status' => $this->faker->text(20),
            'dia_mell' => $this->faker->boolean(),
            'dia_mell_since' => $this->faker->text(20),
            'dia_mell_medicaments' => $this->faker->text(20),
            'dia_mell_status' => $this->faker->text(20),
            'epilepsia' => $this->faker->boolean(),
            'epi_since' => $this->faker->text(20),
            'epi_medicaments' => $this->faker->text(20),
            'epi_status' => $this->faker->text(20),
            'sida' => $this->faker->boolean(),
            'sida_since' => $this->faker->text(20),
            'sida_medicaments' => $this->faker->text(20),
            'sida_status' => $this->faker->text(20),
            'hep_c' => $this->faker->boolean(),
            'hep_c_since' => $this->faker->text(20),
            'hep_c_medicaments' => $this->faker->text(20),
            'hep_c_status' => $this->faker->text(20),
            'asma' => $this->faker->boolean(),
            'asma_since' => $this->faker->text(20),
            'asma_medicaments' => $this->faker->text(20),
            'asma_status' => $this->faker->text(20),
            'artitris' => $this->faker->boolean(),
            'artritis_since' => $this->faker->text(20),
            'artritis_medicaments' => $this->faker->text(20),
            'artritis_status' => $this->faker->text(20),
            'tiroidismo' => $this->faker->boolean(),
            'tiroidismos_since' => $this->faker->text(20),
            'tiroidismos_medicaments' => $this->faker->text(20),
            'tiroidismos_status' => $this->faker->text(20),
            'cancer' => $this->faker->boolean(),
            'cancer_since' => $this->faker->text(20),
            'cancer_medicaments' => $this->faker->text(20),
            'cancer_status' => $this->faker->text(20),
            'other_actual_sicks' => $this->faker->boolean(),
            'wath_other_actual_sicks' => $this->faker->text(20),
            'wath_other_actual_sicks_medicaments' => $this->faker->text(20),
            'wath_other_actual_sicks_status' => $this->faker->text(20),
            'alergies' => $this->faker->text(20),
            'blood_coagulation' => $this->faker->boolean(),
            'kidney_problems' => $this->faker->boolean(),
            'what_kidney_problems' => $this->faker->text(20),
            'liver_problems' => $this->faker->boolean(),
            'what_liver_problems' => $this->faker->text(20),
            'ets' => $this->faker->boolean(),
            'wath_ets' => $this->faker->text(20),
            'surgeries' => $this->faker->boolean(),
            'surgeries_reason' => $this->faker->text(20),
            'blood_transfution' => $this->faker->text(20),
            'blood_transfution_reason' => $this->faker->text(20),
            'patient_id' => Patient::inRandomOrder()->first()->id
        ];
    }
}
