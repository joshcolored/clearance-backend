<?php
// app/Auth/Md5UserProvider.php
namespace App\Auth;

use Illuminate\Auth\EloquentUserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;


class Md5UserProvider extends EloquentUserProvider
{
    public function validateCredentials(UserContract $user, array $credentials)
    {
        $plain = $credentials['password'];
        return $user->getAuthPassword() === md5($plain);
    }
}
