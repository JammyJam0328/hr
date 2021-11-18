<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Department;
use App\Models\Position;
class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::create([
            'name' => 'IT',
        ]);
        Department::create([
            'name' => 'Health',
        ]);
        Department::create([
            'name' => 'MIS',
        ]);

        
        Position::create([
            'name' => 'Manager',
        ]);
        Position::create([
            'name' => 'Head',
        ]);
        Position::create([
            'name' => 'Staff',
        ]);
    }
}