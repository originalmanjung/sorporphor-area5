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
            'position' => 'ผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'role_id' => Role::where('slug','ผู้บริหารสพป.ชม.5')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        // รองผู้อำนวยการ
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'role_id' => Role::where('slug','ผู้บริหารสพป.ชม.5')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'role_id' => Role::where('slug','ผู้บริหารสพป.ชม.5')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'role_id' => Role::where('slug','ผู้บริหารสพป.ชม.5')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'role_id' => Role::where('slug','ผู้บริหารสพป.ชม.5')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'role_id' => Role::where('slug','ผู้บริหารสพป.ชม.5')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มอำนวยการ
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มอำนวยการ',
            'role_id' => Role::where('slug','กลุ่มอำนวยการ')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มอำนวยการ',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์',
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มนโยบายและแผน
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มนโยบายและแผน',
            'role_id' => Role::where('slug','กลุ่มนโยบายและแผน')->first()->id,
            'user_id' => 1,
            'position_general' => 'ผู้อำนวยการกลุ่มนโยบายและแผน',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา',
            'role_id' => Role::where('slug','กลุ่มส่งเสริมการจัดการศึกษา')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มบริหารงานบุคคล
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มบริหารงานบุคคล',
            'role_id' => Role::where('slug','กลุ่มบริหารงานบุคคล')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มบริหารงานบุคคล',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา',
            'role_id' => Role::where('slug','กลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร',
            'role_id' => Role::where('slug','กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร',
            'status' => false,
            'deletable' => false
        ]);

         // ผู้อำนวยการหน่วยตรวจสอบภายใน
         Personal::updateOrCreate([
             'name' => str_random(10),
             'position' => 'ผู้อำนวยการหน่วยตรวจสอบภายใน',
            'role_id' => Role::where('slug','หน่วยตรวจสอบภายใน')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการหน่วยตรวจสอบภายใน',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา',
            'role_id' => Role::where('slug','กลุ่มพัฒนาครูและบุคลากรทางการศึกษา')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา',
            'status' => false,
            'deletable' => false
        ]);

        // ผู้อำนวยการกลุ่มกฎหมายและคดี
        Personal::updateOrCreate([
            'name' => str_random(10),
            'position' => 'ผู้อำนวยการกลุ่มกฎหมายและคดี',
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'user_id' => 1,
            'personal_type' => 'ข้าราชการ',
            'position_general' => 'ผู้อำนวยการกลุ่มกฎหมายและคดี',
            'status' => false,
            'deletable' => false
        ]);

    }
}
