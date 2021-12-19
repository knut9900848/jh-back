<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiV1\Admin\Setting\BankAccount;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bankAccounts = [
            [
                'name' => 'Industrial Bank of Korea',
                'kor_name' => 'IBK 기업은행',
                'account_number' => '346-131350-56-00011',
                'swift_code' => 'IBKOKRSEXXX',
                'address' => '50, Ulchiro 2-ga, Chung-gu, Seoul, 100-758, SOUTH KOREA',
                'is_active' => true,
                'description' => ''
            ],
            [
                'name' => 'SHINHAN BANK',
                'kor_name' => '신한은행',
                'account_number' => '180-007-066558',
                'swift_code' => 'SHBKKRSE',
                'address' => '20, SEJONG-DAERO 9-GIL, JUNG-GU, SEOUL, SOUTH KOREA',
                'is_active' => true,
                'description' => ''
            ]
        ];

        foreach ($bankAccounts as $bankAccount) {
            BankAccount::create($bankAccount);
        }
    }
}
