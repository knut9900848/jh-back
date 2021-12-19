<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ApiV1\Admin\Setting\Branch;

class BranchSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $branches = [
            [
                'name' => 'Intrust Energy Solution',
                'kor_name' => '인트러스트 에너지 솔루션',
                'street1' => '109, Munhyeon-ro',
                'street2' => '',
                'city' => 'Dong-gu',
                'state' => 'Ulsan',
                'country' => 'Republic of Korea',
                'kor_address' => '울산광역시 동구 문현로 109 로얄프린스 빌딩 4층',
                'zipcode' => '44107',
                'phone' => '+82 52 252 9835',
                'fax' => '+82 52 252 9839',
                'reg_number' => '230111-0240779',
                'vat_reg_number' => '786-88-00117',
                'email' => 'contact@intrustenergysolution.com',
                'code' => "USN",
                'is_active' => true,
                'description' => ''
            ]
        ];

        foreach ($branches as $branch) {
            Branch::create($branch);
        }
    }
}
