<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiV1\Admin\Setting\Position;

class PositionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $positions = [
            [
                'name' => 'Director',
                'display_name' => '전무',
                'code' => 'DRT',
                'description' => '',
                'is_active' => true,
                'department_id' => 1
            ]
        ];

        foreach ($positions as $position) {
            Position::create($position);
        }
    }
}
