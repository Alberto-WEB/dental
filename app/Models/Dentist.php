<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dentist extends Model
{
  use HasFactory;

  protected $fillable = [
    'company_name',
    'rfc',
    'street',
    'house_number',
    'postal_code',
    'state',
    'city',
    'phone',
    'user_id'
  ];

  //relacion de uno a muchos (inversa)
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  //relacion de uno a muchos  
  public function service()
  {
    return $this->hasMany(Service::class);
  }

  //relacion de uno a muchos
  public function patient()
  {
    return $this->hasMany(Patient::class);
  }
}
