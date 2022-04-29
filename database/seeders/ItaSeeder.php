<?php

namespace Database\Seeders;

use App\Models\Ita;
use Illuminate\Database\Seeder;

class ItaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // กฎหมายและคดี
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'การประเมินความเสี่ยงการทุจริตประจำปี',
            'slug' => 'การประเมินความเสี่ยงการทุจริตประจำปี'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'การดำเนินการจัดการความเสี่ยง',
            'slug' => 'การดำเนินการจัดการความเสี่ยง'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'การเสริมสร้างวัฒนธรรมองค์กร',
            'slug' => 'การเสริมสร้างวัฒนธรรมองค์กร'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนการป้องกันการทุจริตประจำปี',
            'slug' => 'แผนการป้องกันการทุจริตประจำปี'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานการกำกับติดตามการดำเนินการป้องกันการทุจริตรายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการดำเนินการป้องกันการทุจริตรายไตรมาส'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการดำเนินการป้องกันการทุจริตประจำปี',
            'slug' => 'รายงานผลการดำเนินการป้องกันการทุจริตประจำปี'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการป้องกันการขัดกันระหว่างผลประโยชน์ส่วนตนกับผลประโยชน์ส่วนรวม',
            'slug' => 'มาตรการป้องกันการขัดกันระหว่างผลประโยชน์ส่วนตนกับผลประโยชน์ส่วนรวม'
        ]);


        // กฎหมายและคดี
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'คำแนะนำร้องทุกข์-ร้องเรียน',
            'slug' => 'คำแนะนำร้องทุกข์-ร้องเรียน'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ขั้นตอนการร้องทุกข์-ร้องเรียน',
            'slug' => 'ขั้นตอนการร้องทุกข์-ร้องเรียน'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ยื่นแบบออนไลน์ร้องทุกข์-ร้องเรียน',
            'slug' => 'ยื่นแบบออนไลน์ร้องทุกข์-ร้องเรียน'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ข้อมูลสถิติร้องทุกข์-ร้องเรียน',
            'slug' => 'ข้อมูลสถิติร้องทุกข์-ร้องเรียน'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการจัดการเรื่องร้องทุกข์-ร้องเรียน',
            'slug' => 'มาตรการจัดการเรื่องร้องทุกข์-ร้องเรียน'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการป้องกันการรับสินบน',
            'slug' => 'มาตรการป้องกันการรับสินบน'
        ]);

        // อำนวยการ
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'คู่มือหรือมาตรฐานการให้บริการ',
            'slug' => 'คู่มือหรือมาตรฐานการให้บริการ'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ข้อมูลเชิงสถิติการให้บริการ',
            'slug' => 'ข้อมูลเชิงสถิติการให้บริการ'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลสำรวจความพึงพอใจการให้บริการ',
            'slug' => 'รายงานผลสำรวจความพึงพอใจการให้บริการ'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ช่องทางรับฟังความคิดเห็นQ&A',
            'slug' => 'ช่องทางรับฟังความคิดเห็นQ&A'
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของ-สพป.ชม.6',
            'slug' => 'มาตรการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของ-สพป.ชม.6',
        ]);

        // นโยบายและแผน
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนพัฒนาคุณภาพการศึกษา',
            'slug' => 'แผนพัฒนาคุณภาพการศึกษา',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ยุธศาสตร์แผนปฏิบัติราชการ',
            'slug' => 'ยุธศาสตร์แผนปฏิบัติราชการ',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานการกำกับติดตามการดำเนินงานรายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการดำเนินงานรายไตรมาส',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการดำเนินงานประจำปี',
            'slug' => 'รายงานผลการดำเนินงานประจำปี',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนการใช้จ่ายงบประมาณประจำปี',
            'slug' => 'แผนการใช้จ่ายงบประมาณประจำปี',
        ]);

        // ทรัพยากรบุคคล
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'นโยบายการบริหาร',
            'slug' => 'นโยบายการบริหาร',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'การดำเนินการตามนโยบาย',
            'slug' => 'การดำเนินการตามนโยบาย',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'หลักเกณฑ์การบริหารและพัฒนา',
            'slug' => 'หลักเกณฑ์การบริหารและพัฒนา',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการบริหารและพัฒนาทรัพยากรบุคคล',
            'slug' => 'รายงานผลการบริหารและพัฒนาทรัพยากรบุคคล',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ระเบียบ-กฏหมายที่เกี่ยวข้อง',
            'slug' => 'ระเบียบ-กฏหมายที่เกี่ยวข้อง',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'คู่มือหรือมาตรฐานการปฏิบัติงาน',
            'slug' => 'คู่มือหรือมาตรฐานการปฏิบัติงาน',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการตรวจสอบการใช้ดุลพินิจ',
            'slug' => 'มาตรการตรวจสอบการใช้ดุลพินิจ',
        ]);

        // เงินงบประมาณ
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศขายทอดตลาด',
            'slug' => 'ประกาศขายทอดตลาด',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศจัดซื้อจัดจ้าง',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศผลผู้ขนะการจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศผลผู้ขนะการจัดซื้อจัดจ้าง',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศเผยแพร่แผนการจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศเผยแพร่แผนการจัดซื้อจัดจ้าง',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ประกาศสัญญาและข้อตกลง',
            'slug' => 'ประกาศสัญญาและข้อตกลง',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'แผนการจัดซื้อจัดจ้างประจำปี',
            'slug' => 'แผนการจัดซื้อจัดจ้างประจำปี',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'ระเบียบที่เกี่ยวข้อง',
            'slug' => 'ระเบียบที่เกี่ยวข้อง',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการจัดซื้อจัดจ้างในรอบปี',
            'slug' => 'รายงานผลการจัดซื้อจัดจ้างในรอบปี',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => ' สรุปผลการจัดซื้อจัดจ้างรายเดือน(สขร.)',
            'slug' => ' สรุปผลการจัดซื้อจัดจ้างรายเดือน(สขร.)',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'แจ้งการโอนเงิน',
            'slug' => 'แจ้งการโอนเงิน',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานการกำกับติดตามการใช้จ่ายงบประมาณ-รายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการใช้จ่ายงบประมาณ-รายไตรมาส',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'เผยแพร่งบทดลองประจำเดือน',
            'slug' => 'เผยแพร่งบทดลองประจำเดือน',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'รายงานผลการใช้จ่ายงบประมาณประจำปี',
            'slug' => 'รายงานผลการใช้จ่ายงบประมาณประจำปี',
        ]);
        Ita::updateOrCreate([
            'user_id' => 1,
            'name' => 'มาตรการส่งเสริมความโปร่งใสในการจัดซื้อจัดจ้าง',
            'slug' => 'มาตรการส่งเสริมความโปร่งใสในการจัดซื้อจัดจ้าง',
        ]);
    }
}
