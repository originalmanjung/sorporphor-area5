<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StandardService;

class StandardServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // คู่มือหรือมาตรฐานการให้บริการ
        $mainService = StandardService::updateOrCreate(['name' => 'คู่มือหรือมาตรฐานการให้บริการ','user_id' => 1,]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มบริหารงานบุคคล',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มส่งเสริมการจัดการศึกษา',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มบริหารงานการเงินและสินทรัพย์',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มอำนวยการ',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'หน่วยตรวจสอบภายใน',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มกฎหมายและคดี',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มส่งเสริมการศึกษาทางไกล เทคโนโลยีสารสนเทศและการสื่อสาร',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มนโยบายและแผน',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มนิเทศ ติดตาม และประเมินผลการจัดการศึกษา',
            'user_id' => 1,
        ]);

        // ข้อมูลเชิงสถิติการให้บริการ
        $mainService = StandardService::updateOrCreate(['name' => 'ข้อมูลเชิงสถิติการให้บริการ','user_id' => 1,]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'ข้อมูลเชิงสถิติการให้บริการ',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มบริหารงานบุคคล',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มส่งเสริมการจัดการศึกษา',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มบริหารงานการเงินและสินทรัพย์',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มอำนวยการ',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'หน่วยตรวจสอบภายใน',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มกฎหมายและคดี',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มส่งเสริมการศึกษาทางไกล เทคโนโลยีสารสนเทศและการสื่อสาร',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มนโยบายและแผน',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มนิเทศ ติดตาม และประเมินผลการจัดการศึกษา',
            'user_id' => 1,
        ]);

        // รายงานผลสำรวจความพึงพอใจการให้บริการ
        $mainService = StandardService::updateOrCreate(['name' => 'รายงานผลสำรวจความพึงพอใจการให้บริการ','user_id' => 1,]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'รายงานผลสำรวจความพึงพอใจการให้บริการ',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มบริหารงานบุคคล',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มส่งเสริมการจัดการศึกษา',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มบริหารงานการเงินและสินทรัพย์',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มอำนวยการ',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'หน่วยตรวจสอบภายใน',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มกฎหมายและคดี',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มส่งเสริมการศึกษาทางไกล เทคโนโลยีสารสนเทศและการสื่อสาร',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มนโยบายและแผน',
            'user_id' => 1,
        ]);
        StandardService::updateOrCreate([
            'parent_id' => $mainService->id,
            'name' => 'กลุ่มนิเทศ ติดตาม และประเมินผลการจัดการศึกษา',
            'user_id' => 1,
        ]);
    }
}
