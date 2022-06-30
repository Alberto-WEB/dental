<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'surname',
        'age',
        'sex',
        'address',
        'civil_status',
        'religion',
        'occupation',
        'phone',
        'email_patient',
        'status',
        'dentist_id',
        /* 'inherit_families_id',
        'dental_histories_id',
        'no_personal_pathologicals_id',
        'personal_pathologicals_id' */
    ];

    //relacion de muchos a uno (inversa)
    public function dentist()
    {
        return $this->belongsTo('App\Dentist', 'dentist_id');
    }

    //relacion de uno a muchos
    public function quote()
    {
        return $this->hasMany('App\Quote');
    }

    //relacion de uno a muchos
    public function question()
    {
        return $this->hasMany('App\Question');
    }


    //relacion de uno a muchos
    public function inheritFamily()
    {
        return $this->hasMany('App\InheritFamily');
    }


    //relacion de uno a muchos
    public function dentalHistory()
    {
        return $this->hasMany('App\DentalHistory');
    }

    //relacion de uno a muchos
    public function noPersonalPathological()
    {
        return $this->hasMany('App\NoPersonalPathological');
    }

    //relacion de uno a muchos
    public function personalPathological()
    {
        return $this->hasMany('App\PersonalPathological');
    }
}
