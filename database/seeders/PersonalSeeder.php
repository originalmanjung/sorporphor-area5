<?php

namespace Database\Seeders;
use App\Models\User;
use App\Models\Role;
use App\Models\Personal;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonalSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // ผู้อำนวยการ
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'ผู้บริหาร',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        // รองผู้อำนวยการ
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'ผู้บริหาร',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'ผู้บริหาร',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'ผู้บริหาร',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'ผู้บริหาร',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'ผู้บริหาร',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มอำนวยการ
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มอำนวยการ',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มอำนวยการ',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มบริหารงานการเงินและสินทรัพย์',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มนโยบายและแผน
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มนโยบายและแผน',
            'user_id' => 1,
            'position_general' => 'ผู้อำนวยการกลุ่มนโยบายและแผน',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มส่งเสริมการจัดการศึกษา',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มบริหารงานบุคคล
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มบริหารงานบุคคล',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มบริหารงานบุคคล',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร',
            'status' => false,
            'deletable' => false
        ]);

         // ผู้อำนวยการหน่วยตรวจสอบภายใน
         Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'หน่วยตรวจสอบภายใน',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการหน่วยตรวจสอบภายใน',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มพัฒนาครูและบุคลากรทางการศึกษา',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มกฎหมายและคดี
        Personal::updateOrCreate([
            'name' => str_random(10),
            'group' => 'กลุ่มกฎหมายและคดี',
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มกฎหมายและคดี',
            'status' => false,
            'deletable' => false
        ]);

    }
}
