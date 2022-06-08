<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'notes'
    ];

    //relacion de muchos a uno
    public function patient() {
        return $this->hasMany('App\Patient');
    }

    //relacion de uno de muchos (inversa)
    public function quotestatus() {
        return $this->belongsTo('App\QuoteStatus');
    }
}
