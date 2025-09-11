<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable; // <-- important

class UsersAccount extends Authenticatable
{
    use HasApiTokens, Notifiable;

    protected $fillable = [
        'name', 'username', 'ntlogin', 'email', 'password', 'role'
    ];

    protected $hidden = [
        'password',
    ];
}
