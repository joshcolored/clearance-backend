<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayslipUser;

class PayslipUserController extends Controller
{
    public function getUser(Request $request)
    {


            $result = PayslipUser::from('users as u')
            ->join('Departments as d', 'u.access', '=', 'd.access')
            ->where('u.username', $request->ntlogin)
            ->select('u.*', 'd.dept', 'd.cat')
            ->get();

        return response()->json(['message' => $result]);
    }
}
