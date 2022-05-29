<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StandardPraticeGuide;


class StandardPraticeGuideSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มอำนวยการ',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มส่งเสริมการจัดการศึกษา',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มนิเทศ ติดตามฯ',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มบิรหารการเงินฯ',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มกฏหมายและคดี',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มนโยบายและแผน',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มบริหารงานบุคคล',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มพัฒนาบุคลากรฯ',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'กลุ่มส่งเสริมการศึกษาทางไกลฯ',
        ]);
        StandardPraticeGuide::updateOrCreate([
            'user_id' => 1,
            'name' => 'หน่วยตรวจสอบภายใน',
        ]);
    }
}
