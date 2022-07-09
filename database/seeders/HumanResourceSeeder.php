<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\HumanResource;

class HumanResourceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HumanResource::updateOrCreate([
            'user_id' => 1,
            'name' => 'การสรรหาและคัดเลือกบุคลากร',
        ]);
        HumanResource::updateOrCreate([
            'user_id' => 1,
            'name' => 'การบรรจุและแต่งตั้งบุคลากร',
        ]);
        HumanResource::updateOrCreate([
            'user_id' => 1,
            'name' => 'การพัฒนาบุคลากร',
        ]);
        HumanResource::updateOrCreate([
            'user_id' => 1,
            'name' => 'การประเมินและการปฏิบัติงานบุคลากร',
        ]);
        HumanResource::updateOrCreate([
            'user_id' => 1,
            'name' => 'การให้คุณให้โทษและการสร้างขวัญกำลังใจ',
        ]);
    }
}
