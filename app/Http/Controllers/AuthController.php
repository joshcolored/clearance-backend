<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersAccount;

class AuthController extends Controller
{
    // login accepts either username or ntlogin as "identifier"
   public function login(Request $request)
{   
    
    $request->validate([
        'identifier' => 'required|string',
        'password' => 'required|string'
    ]);

    $identifier = $request->input('identifier');
    $password = md5($request->input('password'));

    // try find by username or ntlogin
    $user = UsersAccount::where('username', $identifier)
                ->orWhere('ntlogin', $identifier)
                ->first();

    if (!$user || $password !== $user->password) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    // log in (session-based) and regenerate session
    Auth::login($user);
    $request->session()->regenerate();

    return response()->json([
        'user' => $user->only(['id','name','username','ntlogin','role'])
    ]);
}


    public function logout(Request $request)
    {
        Auth::guard('web')->logout(); 
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return response()->json(['message' => 'Logged out']);
    }

    // return current authenticated user
    public function user(Request $request)
    {
        $user = $request->user();
        if (!$user) {
            return response()->json(null, 401);
        }
        return response()->json($user->only(['id','name','username','ntlogin','role']));
    }
}
