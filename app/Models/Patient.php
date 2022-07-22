<?php

namespace App\Models;

use Laravel\Scout\Searchable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Patient extends Model
{
    use HasFactory, SoftDeletes, Searchable;

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

    public function scopePatients($query)
    {
        return $query->where('dentist_id', '=', Auth::user()->id);
    }


    //relacion de muchos a uno (inversa)
    public function dentist()
    {
        return $this->belongsTo(Dentist::class, 'dentist_id');
    }

    //relacion de uno a muchos
    public function quote()
    {
        return $this->hasMany(Quote::class);
    }

    //relacion de uno a muchos
    public function inheritFamily()
    {
        return $this->hasMany(InheritFamily::class);
    }


    //relacion de uno a muchos
    public function dentalHistory()
    {
        return $this->hasMany(DentalHistory::class);
    }

    //relacion de uno a muchos
    public function noPersonalPathological()
    {
        return $this->hasMany(NoPersonalPathological::class);
    }

    //relacion de uno a muchos
    public function personalPathological()
    {
        return $this->hasMany(PersonalPathological::class);
    }
}
