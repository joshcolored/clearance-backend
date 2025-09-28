<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PayslipUser;
use App\Models\UserDepartment;

class PayslipUserController extends Controller
{
    public function getUser(Request $request)
    {


           $result = PayslipUser::where('username', 'like', '%' . $request->ntlogin . '%')
            ->join('Departments as d', function($join) {
                $join->on('users.access', '=', 'd.access')
                    ->whereRaw('d.idDepartments = (
                        SELECT MAX(idDepartments)
                        FROM Departments
                        WHERE Departments.access = users.access
                    )');
            })
            ->select('users.name',
            'users.empno as employeeId',
            'users.username as ntlogin',
            'd.idDepartments','d.dept as department')
            ->get();

            

        return response()->json(['message' => $result]);
    }
}
