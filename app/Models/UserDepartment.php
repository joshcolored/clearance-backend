<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserDepartment extends Model
{
    use HasFactory;

    protected $connection = 'payslip';   
    protected $table = 'Departments';           
    protected $primaryKey = 'idDepartments';

    protected $fillable = [
        'access',
        'cat',
        'dept'
    ];
}
