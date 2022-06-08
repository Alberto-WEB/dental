<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumable extends Model
{
    use HasFactory;

    protected $fillable = [
        'material_name',
        'price_general',
        'amount_package',
        'unit_price',
        'price_final'
    ];

    //relacion de uno a muchos (inversa)
    public function service() {
		return $this->belongsTo('App\Service');
	}
}
