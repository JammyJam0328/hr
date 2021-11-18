<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;
class AccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'role'=>'admin',
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
        ]);

        $hr = User::create([
            'role'=>'employee',
            'name' => 'Human Resource',
            'email' => 'hr@gmail.com',
            'password' => bcrypt('hr12345'),
            'is_hr'=>true,
        ]);

        $employee = $hr->employee()->create([
            'firstname'=>'Human Resource',
            'middlename'=>'Human Resource',
            'lastname'=>'Human Resource',
            'address'=>'Address 101',
            'contact_number'=>'09123456789',
            'department_id'=>1,
        ]);
        
        
        User::create([
            'role'=>'employee',
            'name' => 'Richard Do',
            'email' => 'richard@gmail.com',
            'password' => bcrypt('richard123'),
        ]);

    }
}