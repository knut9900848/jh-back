<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiV1\Admin\Setting\Department;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = [
            [
                'name' => 'Administration',
                'display_name' => '관리부',
                'code' => 'ADM',
                'description' => '',
                'is_active' => true,
                'branch_id' => 1
            ]
        ];

        foreach ($departments as $department) {
            Department::create($department);
        }
    }
}
