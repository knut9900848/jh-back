<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiV1\Admin\Setting\Currency;

class CurrencySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $currencies = [
            [
                'name' => 'USD',
                'exchange_rate' => 1150,
                'symbol' => '$',
                'country' => 'United State',
                'is_active' => true,
                'description' => ''
            ],
            [
                'name' => 'KRW',
                'exchange_rate' => 1,
                'symbol' => '₩',
                'country' => 'Republic of Korea',
                'is_active' => true,
                'description' => ''
            ],
            [
                'name' => 'EUR',
                'exchange_rate' => 1350,
                'symbol' => '€',
                'country' => 'Eurozone',
                'is_active' => true,
                'description' => ''
            ],
            [
                'name' => 'GBP',
                'exchange_rate' => 1700,
                'symbol' => '£',
                'country' => 'United Kingdom',
                'is_active' => true,
                'description' => ''
            ],
            [
                'name' => 'CNY',
                'exchange_rate' => 250,
                'symbol' => '¥',
                'country' => 'UnChina',
                'is_active' => true,
                'description' => ''
            ],
            [
                'name' => 'JPY',
                'exchange_rate' => 100,
                'symbol' => '¥',
                'country' => 'Japan',
                'is_active' => true,
                'description' => ''
            ],
            [
                'name' => 'VND',
                'exchange_rate' => 0.05,
                'symbol' => '₫',
                'country' => 'Vietnam',
                'is_active' => true,
                'description' => ''
            ],
        ];

        foreach ($currencies as $currency) {
            Currency::create($currency);
        }
    }
}
