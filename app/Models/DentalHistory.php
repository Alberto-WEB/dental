<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DentalHistory extends Model
{
    use HasFactory;

    protected $fillable = [
        'reason_medical_visit',
        'medications',
        'wath_medication',
        'dental_trauma',
        'wath_dental_trauma',
        'speaking_difficulty',
        'chewing_difficulty',
        'openning_the_mounth_difficulty',
        'have_pain',
        'where_is_pain',
        'caused_by',
        'pain_type',
        'calms_with',
        'gums_bleed',
        'abnormal_lips',
        'abnormal_lips_linjury',
        'abnormal_cheeks',
        'abnormal_cheeks_injury',
        'abnormal_gums',
        'abnormal_gums_ingury',
        'abnormal_palate',
        'abnormal_palate_injury',
        'abnormal_tongue',
        'abnormal_tongue_injury',
        'abnormal_under_tongue',
        'abnormal_under_tongue_injury',
        'anywhere_else_abnormal',
        'how_is_injury',
        'injury_has_pus',
        'when_has_pus',
        'has_ulcers',
        'when_has_ulcers',
        'patient_id'
    ];

    protected $casts = [
        'medications' => 'boolean',
        'dental_trauma' => 'boolean',
        'speaking_difficulty' => 'boolean',
        'chewing_difficulty' => 'boolean',
        'openning_the_mounth_difficulty' => 'boolean',
        'have_pain' => 'boolean',
        'gums_bleed' => 'boolean',
        'abnormal_lips' => 'boolean',
        'abnormal_cheeks' => 'boolean',
        'abnormal_gums' => 'boolean',
        'abnormal_palate' => 'boolean',
        'abnormal_tongue' => 'boolean',
        'abnormal_under_tongue' => 'boolean',
        'injury_has_pus' => 'boolean',
        'has_ulcers' => 'boolean'
    ];


    //relacion de muchos a uno (inversa)
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
