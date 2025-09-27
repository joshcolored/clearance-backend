<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Api\EmployeeController;
use App\Http\Controllers\Api\ClearanceItemController;
use App\Http\Controllers\Api\PayslipUserController;

Route::get('/sanctum/csrf-cookie', function () {
    return response()->json(['status' => 'csrf cookie']);
});

Route::get('/test', function(){
    return "Test";
});

Route::post('/login', [AuthController::class, 'login']);
Route::post('/loginJWT', [AuthController::class, 'loginJWT']);


Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
Route::get('/user', [AuthController::class, 'user'])->middleware('auth:sanctum');


// Employee Routes
Route::get('/employees', [EmployeeController::class, 'index']);
Route::post('/employees', [EmployeeController::class, 'store']);
Route::put('/employees/{employee}', [EmployeeController::class, 'update']);
Route::put('/employees/{id}/status', [EmployeeController::class, 'updateStatus']);
Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);
Route::post('/employees/getUsers', [PayslipUserController::class, 'getUser']);

Route::post('/clearance-items/{clearanceItem}/complete', [ClearanceItemController::class, 'complete']);