<?php

namespace App\Models;

use App\Models\QuoteStatus;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Quote extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'notes'
    ];

    //relacion de muchos a uno
    public function patient()
    {
        return $this->hasMany(Patient::class);
    }

    //relacion de uno de muchos (inversa)
    public function quotestatus()
    {
        return $this->belongsTo(QuoteStatus::class);
    }
}
