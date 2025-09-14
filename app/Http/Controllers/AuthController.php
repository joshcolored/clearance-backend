<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\UsersAccount;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\PayslipUser;


class AuthController extends Controller
{
    // login accepts either username or ntlogin as "identifier"
//    public function login()
//     {
//     return response()->json(['message' => 'Login endpoint']);
//     // //    return response()->json([    
//     // //         'user' => $request->all()
//     // //     ]);
//     //     $request->validate([
//     //         'identifier' => 'required|string',
//     //         'password' => 'required|string'
//     //     ]);

//     //     $identifier = $request->input('identifier');
//     //     $password = md5($request->input('password'));

         
//     //     // try find by username or ntlogin
//     //     $user = UsersAccount::where('username', $identifier)
//     //                 ->orWhere('ntlogin', $identifier)
//     //                 ->first();

//     //     if (!$user || $password !== $user->password) {
//     //         return response()->json(['message' => 'Invalid credentials'], 401);
//     //     }
        

//     //     // log in (session-based) and regenerate session
//     //     Auth::login($user);
//     //     // $request->session()->regenerate();

//     //     return response()->json([
//     //         'user' => $user->only(['id','name','username','ntlogin','role']),
//     //         'session' => session()->regenerate()
//     //     ]);
//     }



public function login(Request $request)
{
    $request->validate([
        'identifier' => 'required|string',
        'password' => 'required|string',
    ]);

    $user = PayslipUser::where('username', $request->identifier)->first();

    if (!$user || $user->password !== md5($request->password)) {
        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    Auth::login($user); 

    return response()->json([
        'message' => 'Login successful',
        'user' => [
            'id' => $user->userid,
            'name' => $user->name,
            'empno' => $user->empno,
            'role' => (string)$user->access
        ]
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
        return response()->json($user->only(['id','name','username','ntlogin']));
    }
}
