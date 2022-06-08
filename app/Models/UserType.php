<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        "type",
    ];


    
    //relacion uno a muchos
    public function dentist() {
        return $this->hasMany('App\User');
    }
}
