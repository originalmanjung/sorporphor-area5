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
        // กฎหมายและคดี
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การประเมินความเสี่ยงการทุจริตประจำปี',
            'slug' => 'การประเมินความเสี่ยงการทุจริตประจำปี'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การดำเนินการจัดการความเสี่ยง',
            'slug' => 'การดำเนินการจัดการความเสี่ยง'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การเสริมสร้างวัฒนธรรมองค์กร',
            'slug' => 'การเสริมสร้างวัฒนธรรมองค์กร'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนการป้องกันการทุจริตประจำปี',
            'slug' => 'แผนการป้องกันการทุจริตประจำปี'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานการกำกับติดตามการดำเนินการป้องกันการทุจริตรายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการดำเนินการป้องกันการทุจริตรายไตรมาส'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการดำเนินการป้องกันการทุจริตประจำปี',
            'slug' => 'รายงานผลการดำเนินการป้องกันการทุจริตประจำปี'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการป้องกันการขัดกันระหว่างผลประโยชน์ส่วนตนกับผลประโยชน์ส่วนรวม',
            'slug' => 'มาตรการป้องกันการขัดกันระหว่างผลประโยชน์ส่วนตนกับผลประโยชน์ส่วนรวม'
        ]);


        // กฎหมายและคดี
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'คำแนะนำร้องทุกข์-ร้องเรียน',
            'slug' => 'คำแนะนำร้องทุกข์-ร้องเรียน'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ขั้นตอนการร้องทุกข์-ร้องเรียน',
            'slug' => 'ขั้นตอนการร้องทุกข์-ร้องเรียน'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ยื่นแบบออนไลน์ร้องทุกข์-ร้องเรียน',
            'slug' => 'ยื่นแบบออนไลน์ร้องทุกข์-ร้องเรียน'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ข้อมูลสถิติร้องทุกข์-ร้องเรียน',
            'slug' => 'ข้อมูลสถิติร้องทุกข์-ร้องเรียน'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการจัดการเรื่องร้องทุกข์-ร้องเรียน',
            'slug' => 'มาตรการจัดการเรื่องร้องทุกข์-ร้องเรียน'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการป้องกันการรับสินบน',
            'slug' => 'มาตรการป้องกันการรับสินบน'
        ]);

        // อำนวยการ
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'คู่มือหรือมาตรฐานการให้บริการ',
            'slug' => 'คู่มือหรือมาตรฐานการให้บริการ'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ข้อมูลเชิงสถิติการให้บริการ',
            'slug' => 'ข้อมูลเชิงสถิติการให้บริการ'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลสำรวจความพึงพอใจการให้บริการ',
            'slug' => 'รายงานผลสำรวจความพึงพอใจการให้บริการ'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ช่องทางรับฟังความคิดเห็นQ&A',
            'slug' => 'ช่องทางรับฟังความคิดเห็นQ&A'
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของ-สพป.ชม.6',
            'slug' => 'มาตรการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของ-สพป.ชม.6',
        ]);

        // นโยบายและแผน
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนพัฒนาคุณภาพการศึกษา',
            'slug' => 'แผนพัฒนาคุณภาพการศึกษา',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ยุธศาสตร์แผนปฏิบัติราชการ',
            'slug' => 'ยุธศาสตร์แผนปฏิบัติราชการ',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานการกำกับติดตามการดำเนินงานรายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการดำเนินงานรายไตรมาส',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการดำเนินงานประจำปี',
            'slug' => 'รายงานผลการดำเนินงานประจำปี',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนการใช้จ่ายงบประมาณประจำปี',
            'slug' => 'แผนการใช้จ่ายงบประมาณประจำปี',
        ]);

        // ทรัพยากรบุคคล
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'นโยบายการบริหาร',
            'slug' => 'นโยบายการบริหาร',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'การดำเนินการตามนโยบาย',
            'slug' => 'การดำเนินการตามนโยบาย',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'หลักเกณฑ์การบริหารและพัฒนา',
            'slug' => 'หลักเกณฑ์การบริหารและพัฒนา',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการบริหารและพัฒนาทรัพยากรบุคคล',
            'slug' => 'รายงานผลการบริหารและพัฒนาทรัพยากรบุคคล',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ระเบียบ-กฏหมายที่เกี่ยวข้อง',
            'slug' => 'ระเบียบ-กฏหมายที่เกี่ยวข้อง',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'คู่มือหรือมาตรฐานการปฏิบัติงาน',
            'slug' => 'คู่มือหรือมาตรฐานการปฏิบัติงาน',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการตรวจสอบการใช้ดุลพินิจ',
            'slug' => 'มาตรการตรวจสอบการใช้ดุลพินิจ',
        ]);

        // เงินงบประมาณ
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศขายทอดตลาด',
            'slug' => 'ประกาศขายทอดตลาด',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศจัดซื้อจัดจ้าง',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศผลผู้ขนะการจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศผลผู้ขนะการจัดซื้อจัดจ้าง',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศเผยแพร่แผนการจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศเผยแพร่แผนการจัดซื้อจัดจ้าง',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศสัญญาและข้อตกลง',
            'slug' => 'ประกาศสัญญาและข้อตกลง',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนการจัดซื้อจัดจ้างประจำปี',
            'slug' => 'แผนการจัดซื้อจัดจ้างประจำปี',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'ระเบียบที่เกี่ยวข้อง',
            'slug' => 'ระเบียบที่เกี่ยวข้อง',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการจัดซื้อจัดจ้างในรอบปี',
            'slug' => 'รายงานผลการจัดซื้อจัดจ้างในรอบปี',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => ' สรุปผลการจัดซื้อจัดจ้างรายเดือน(สขร.)',
            'slug' => ' สรุปผลการจัดซื้อจัดจ้างรายเดือน(สขร.)',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'แจ้งการโอนเงิน',
            'slug' => 'แจ้งการโอนเงิน',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานการกำกับติดตามการใช้จ่ายงบประมาณ-รายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการใช้จ่ายงบประมาณ-รายไตรมาส',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'เผยแพร่งบทดลองประจำเดือน',
            'slug' => 'เผยแพร่งบทดลองประจำเดือน',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการใช้จ่ายงบประมาณประจำปี',
            'slug' => 'รายงานผลการใช้จ่ายงบประมาณประจำปี',
        ]);
        Intergrity::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการส่งเสริมความโปร่งใสในการจัดซื้อจัดจ้าง',
            'slug' => 'มาตรการส่งเสริมความโปร่งใสในการจัดซื้อจัดจ้าง',
        ]);
    }
}
