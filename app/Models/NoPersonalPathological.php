<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NoPersonalPathological extends Model
{
    use HasFactory;

    protected $fillable = [
        'drugs',
        'drugs_take',
        'smoke',
        'smoke_frequency',
        'alcohol',
        'alcohol_frequency',
        'pregnant',
        'pregnant_weeks',
        'pregnancy_number',
        'd_p_p',
        'patient_id'
    ];

    protected $casts = [
        'drugs' => 'boolean',
        'smoke' => 'boolean',
        'alcohol' => 'boolean',
        'pregnant' => 'boolean'
    ];


    //relacion de muchos a uno (inversa)
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
