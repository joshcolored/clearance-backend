<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class PayslipUser extends Authenticatable
{
    protected $connection = 'payslip';   
    protected $table = 'users';           
    protected $primaryKey = 'userid';     

    public $timestamps = false;           

    protected $fillable = [
        'username',
        'password',
        'name',
        'empno',
    ];

    protected $hidden = [
        'password',
    ];

    
    public function getAuthPassword()
    {
        return $this->password;
    }
}
