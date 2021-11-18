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

        User::create([
            'role'=>'employee',
            'name' => 'Human Resource',
            'email' => 'hr@gmail.com',
            'password' => bcrypt('hr12345'),
            'is_hr'=>true,
        ]);

        User::create([
            'role'=>'employee',
            'name' => 'Richard Do',
            'email' => 'richard@gmail.com',
            'password' => bcrypt('richard123'),
        ]);

    }
}