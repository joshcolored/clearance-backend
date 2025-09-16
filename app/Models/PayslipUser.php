<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class PayslipUser extends Authenticatable
{
    protected $connection = 'payslip';   // name from config/database.php
    protected $table = 'users';           // table in your Bluehost DB
    protected $primaryKey = 'userid';     // your table's primary key

    public $timestamps = false;           // if your table has no created_at/updated_at

    protected $fillable = [
        'username',
        'password',
        'name',
        'empno',
    ];

    protected $hidden = [
        'password',
    ];

    // Since you're using md5 passwords, disable Laravel's default hashing
    public function getAuthPassword()
    {
        return $this->password;
    }
}
