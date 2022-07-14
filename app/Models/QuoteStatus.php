<?php

namespace App\Models;

use App\Models\Quote;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuoteStatus extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'type'
    ];

    //relacion de uno a muchos
    public function quote()
    {
        return $this->hasMany(Quote::class);
    }
}
