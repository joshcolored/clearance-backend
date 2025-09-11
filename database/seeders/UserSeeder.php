<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        $users = [
            ['name'=>'Super Admin','username'=>'superadmin','ntlogin'=>null,'role'=>'super_admin'],
            ['name'=>'HR Manager','username'=>'hr','ntlogin'=>null,'role'=>'hr'],
            ['name'=>'IT Manager','username'=>'it','ntlogin'=>null,'role'=>'it'],
            ['name'=>'Team Leader','username'=>'teamlead','ntlogin'=>null,'role'=>'team_leader'],
            ['name'=>'Engineer','username'=>'engineering','ntlogin'=>null,'role'=>'engineering_auxiliary'],
            ['name'=>'Facilities','username'=>'facilities','ntlogin'=>null,'role'=>'admin_facilities'],
            ['name'=>'Account','username'=>'account','ntlogin'=>null,'role'=>'account_coordinator'],
            ['name'=>'Operations','username'=>'operations','ntlogin'=>null,'role'=>'operations_manager'],
            ['name'=>'John Doe','username'=>'jdoe','ntlogin'=>'jcgrijaldo','role'=>'employee'],
        ];

        foreach ($users as $u) {
            User::create([
                'name' => $u['name'],
                'username' => $u['username'],
                'ntlogin'  => $u['ntlogin'],
                'password' => Hash::make('password123'),
                'role' => $u['role'],
            ]);
        }
    }
}
