<?php

namespace Database\Seeders;

use App\Models\Intergrity;
use Illuminate\Database\Seeder;

class IntergritySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ข้อมูลพื้นฐาน',
            'slug' => 'ข้อมูลพื้นฐาน',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การประชาสัมพันธ์',
            'slug' => 'การประชาสัมพันธ์',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การปฏิสัมพันธ์ข้อมูล',
            'slug' => 'การปฏิสัมพันธ์ข้อมูล',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การปฏิบัติงานการให้บริการ',
            'slug' => 'การปฏิบัติงานการให้บริการ',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การเสริมสร้างวัฒนธรรมองค์กร',
            'slug' => 'การเสริมสร้างวัฒนธรรมองค์กร',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนการดำเนินงาน',
            'slug' => 'แผนการดำเนินงาน',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนการใช้จ่ายงบประมาณประจำปี',
            'slug' => 'แผนการใช้จ่ายงบประมาณประจำปี',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การบริหาร พัฒนาทรัพยากรบุคคล',
            'slug' => 'การบริหาร พัฒนาทรัพยากรบุคคล',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การจัดซื้อจัดจ้าง จัดหาพัสดุ',
            'slug' => 'การจัดซื้อจัดจ้าง จัดหาพัสดุ',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'เจตจำนงสุจริตของผู้บริหาร',
            'slug' => 'เจตจำนงสุจริตของผู้บริหาร',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนปฏิบัติการป้องกันการทุจริต',
            'slug' => 'แผนปฏิบัติการป้องกันการทุจริต',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การจัดการเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ',
            'slug' => 'การจัดการเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การบริหารความเสี่ยงเพื่อป้องกันการทุจริต',
            'slug' => 'การบริหารความเสี่ยงเพื่อป้องกันการทุจริต',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการภายในเพื่อส่งเสริมความโปร่งใสและป้องกันการทุจริต',
            'slug' => 'มาตรการภายในเพื่อส่งเสริมความโปร่งใสและป้องกันการทุจริต',
        ]);
    }
}
