<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PersonalPathological extends Model
{
    use HasFactory;

    protected $fillable = [
        'sarampion',
        'rubeola',
        'varicela',
        'parotiditis',
        'tosferina',
        'escarlatina',
        'other_childern_sicks',
        'hip_art',
        'hip_art_since',
        'hip_art_medicaments',
        'hip_art_status',
        'dia_mell',
        'dia_mell_since',
        'dia_mell_medicaments',
        'dia_mell_status',
        'epilepsia',
        'epi_since',
        'epi_medicaments',
        'epi_status',
        'sida', //20
        'sida_since',
        'sida_medicaments',
        'sida_status',
        'hep_c',
        'hep_c_since',
        'hep_c_medicaments',
        'hep_c_status',
        'asma',
        'asma_since',
        'asma_medicaments',
        'asma_status',
        'artitris',
        'artritis_since',
        'artritis_medicaments',
        'artritis_status',
        'tiroidismo',
        'tiroidismos_since',
        'tiroidismos_medicaments',
        'tiroidismos_status',
        'cancer', //40
        'cancer_since',
        'cancer_medicaments',
        'cancer_status',
        'other_actual_sicks',
        'wath_other_actual_sicks',
        'wath_other_actual_sicks_medicaments',
        'wath_other_actual_sicks_status',
        'alergies',
        'blood_coagulation',
        'kidney_problems', //50
        'what_kidney_problems',
        'liver_problems',
        'what_liver_problems',
        'ets',
        'wath_ets',
        'surgeries',
        'surgeries_reason',
        'blood_transfution',
        'blood_transfution_reason',
        'patient_id'
    ];

    protected $casts = [
        'sarampion' => 'boolean',
        'rubeola' => 'boolean',
        'varicela' => 'boolean',
        'parotiditis' => 'boolean',
        'tosferina' => 'boolean',
        'escarlatina' => 'boolean',
        'hip_art' => 'boolean',
        'dia_mell' => 'boolean',
        'epilepsia' => 'boolean',
        'sida' => 'boolean',
        'hep_c' => 'boolean',
        'asma' => 'boolean',
        'artitris' => 'boolean',
        'tiroidismo' => 'boolean',
        'cancer' => 'boolean',
        'other_actual_sicks' => 'boolean',
        'blood_coagulation' => 'boolean',
        'kidney_problems' => 'boolean',
        'liver_problems' => 'boolean',
        'ets' => 'boolean',
        'surgeries' => 'boolean'
    ];


    //relacion de muchos a uno (inversa)
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
