<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiV1\Admin\Setting\Unit;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $units = [
            [
                'name' => 'EA',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'Kg(Kilogram)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'g(Gram)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'M(Meter)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'Cm(centimeter)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'mm(Millimeter)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'L(Liter)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'ml(Milliliter)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'Set',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'Lot',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'Sheet',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'Mh(Man Hour)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'Md(Man Day)',
                'description' => '',
                'is_active' => true
            ],
            [
                'name' => 'Lump sum',
                'description' => '',
                'is_active' => true
            ],
        ];

        foreach ($units as $unit) {
            Unit::create($unit);
        }
    }
}
