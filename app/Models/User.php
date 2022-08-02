<?php

namespace App\Models;

use App\Models\Dentist;
use App\Models\UserType;
use App\Models\Transaction;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'surname',
        'email',
        'password',
        'avatar',
        'user_type_id'

    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /*  public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this->email));

    } */

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //relacion uno a muchos
    public function dentist()
    {
        return $this->hasMany(Dentist::class);
    }

    //relacion de uno a muchos (inversa)
    public function usertype()
    {
        return $this->belongsTo(UserType::class);
    }

    //relacion de muchos a uno
    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }
}
