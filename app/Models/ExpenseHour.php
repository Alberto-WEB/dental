<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseHour extends Model
{
    use HasFactory;

    protected $fillable = [
        'price_hour',
        'formula',
    ];

    //relacion de uno a muchos
    public function service()
    {
        return $this->hasMany(Service::class);
    }
}
