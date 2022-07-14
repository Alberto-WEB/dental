<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $fillable = [
        'service_name',
        'spending_hour',
        'work_price',
        'bank_commision',
        'utility',
        'hour_service_cost',
        'time_service_hour',
        'total_cost',
        'dentist_id',
        'consumable_id',
        'expense_hours_id'
    ];

    //relacion de uno a muchos (inversa)
    public function dentist()
    {
        return $this->belongsTo(Dentist::class);
    }

    //relacion de uno a muchos
    public function consumable()
    {
        return $this->hasMany(Consumable::class);
    }

    //relacion de uno a muchos (inversa)
    public function expencehour()
    {
        return $this->belongsTo(ExpenceHour::class);
    }
}
