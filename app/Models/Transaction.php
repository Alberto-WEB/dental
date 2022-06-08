<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'amount',
        'method',
        'status',
        'currency',
        'description',
        'was_refund',
        'refund_date',
        'stripe_payment_intent',
        'stripe_charge_id',
        'user_id'
    ];

    //relacion de uno a muchos (inversa)
    public function user(){
        return $this->belongsTo('App\Transaction');
    }
}
