<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = [
            [
                'name' => 'Steve Yoo',
                'kor_name' => '유용훈',
                'gender' => 'Male',
                'email' => 'steve.yoo@intrustenergysolution.com',
                'password' => bcrypt('!pencouch78'),
                'position' => 'It Manager',
                'kor_position' => '전산실장',
                'is_active' => true,
                'mobile' => '+82 10 2559 9835',
                'tel' => '+82 52 252 9837',
                'branch_id' => 1,
                'department_id' => 1,
                'position_id' => 1,
            ]
        ];

        foreach ($users as $user) {
            User::create($user);
        }
    }
}
