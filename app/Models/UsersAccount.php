<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable; // <-- important
use Tymon\JWTAuth\Contracts\JWTSubject;

class UsersAccount extends Authenticatable implements JWTSubject
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'username', 'ntlogin', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}
