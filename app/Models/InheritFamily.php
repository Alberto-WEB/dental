<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InheritFamily extends Model
{
    use HasFactory;

    protected $fillable = [
        'f_sicks',
        'm_sicks',
        'f_alive',
        'm_alive',
        'pa_gf_alive',
        'ma_gm_alive',
        'pa_gm_alive',
        'ma_gf_alive',
        'pa_gf_sicks',
        'pa_gm_sicks',
        'ma_gf_sicks',
        'ma_gm_sicks',
        'others_alive',
        'others_sicks',
        'patient_id'
    ];

    protected $casts = [
        'f_alive' => 'boolean',
        'm_alive' => 'boolean',
        'pa_gf_alive' => 'boolean',
        'ma_gm_alive' => 'boolean',
        'pa_gm_alive' => 'boolean',
        'ma_gf_alive' => 'boolean'
    ];


    //relacion de muchos a uno (inversa)
    public function patient()
    {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
