<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\LegislationList;

class LegislationListSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // กฎหมายและคดี
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'การประเมินความเสี่ยงการทุจริตประจำปี',
            'slug' => 'การประเมินความเสี่ยงการทุจริตประจำปี'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'การดำเนินการจัดการความเสี่ยง',
            'slug' => 'การดำเนินการจัดการความเสี่ยง'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'การเสริมสร้างวัฒนธรรมองค์กร',
            'slug' => 'การเสริมสร้างวัฒนธรรมองค์กร'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'แผนการป้องกันการทุจริตประจำปี',
            'slug' => 'แผนการป้องกันการทุจริตประจำปี'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'รายงานการกำกับติดตามการดำเนินการป้องกันการทุจริตรายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการดำเนินการป้องกันการทุจริตรายไตรมาส'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'รายงานผลการดำเนินการป้องกันการทุจริตประจำปี',
            'slug' => 'รายงานผลการดำเนินการป้องกันการทุจริตประจำปี'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'มาตรการป้องกันการขัดกันระหว่างผลประโยชน์ส่วนตนกับผลประโยชน์ส่วนรวม',
            'slug' => 'มาตรการป้องกันการขัดกันระหว่างผลประโยชน์ส่วนตนกับผลประโยชน์ส่วนรวม'
        ]);


        // กฎหมายและคดี
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'คำแนะนำร้องทุกข์-ร้องเรียน',
            'slug' => 'คำแนะนำร้องทุกข์-ร้องเรียน'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'ขั้นตอนการร้องทุกข์-ร้องเรียน',
            'slug' => 'ขั้นตอนการร้องทุกข์-ร้องเรียน'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'ยื่นแบบออนไลน์ร้องทุกข์-ร้องเรียน',
            'slug' => 'ยื่นแบบออนไลน์ร้องทุกข์-ร้องเรียน'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'ข้อมูลสถิติร้องทุกข์-ร้องเรียน',
            'slug' => 'ข้อมูลสถิติร้องทุกข์-ร้องเรียน'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'มาตรการจัดการเรื่องร้องทุกข์-ร้องเรียน',
            'slug' => 'มาตรการจัดการเรื่องร้องทุกข์-ร้องเรียน'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มกฎหมายและคดี')->first()->id,
            'name' => 'มาตรการป้องกันการรับสินบน',
            'slug' => 'มาตรการป้องกันการรับสินบน'
        ]);

        // อำนวยการ
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มอำนวยการ')->first()->id,
            'name' => 'คู่มือหรือมาตรฐานการให้บริการ',
            'slug' => 'คู่มือหรือมาตรฐานการให้บริการ'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มอำนวยการ')->first()->id,
            'name' => 'ข้อมูลเชิงสถิติการให้บริการ',
            'slug' => 'ข้อมูลเชิงสถิติการให้บริการ'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มอำนวยการ')->first()->id,
            'name' => 'รายงานผลสำรวจความพึงพอใจการให้บริการ',
            'slug' => 'รายงานผลสำรวจความพึงพอใจการให้บริการ'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มอำนวยการ')->first()->id,
            'name' => 'ช่องทางรับฟังความคิดเห็นQ&A',
            'slug' => 'ช่องทางรับฟังความคิดเห็นQ&A'
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มอำนวยการ')->first()->id,
            'name' => 'มาตรการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของ-สพป.ชม.6',
            'slug' => 'มาตรการเผยแพร่ข้อมูลต่อสาธารณะผ่านเว็บไซต์ของ-สพป.ชม.6',
        ]);

        // นโยบายและแผน
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มนโยบายและแผน')->first()->id,
            'name' => 'แผนพัฒนาคุณภาพการศึกษา',
            'slug' => 'แผนพัฒนาคุณภาพการศึกษา',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มนโยบายและแผน')->first()->id,
            'name' => 'ยุธศาสตร์แผนปฏิบัติราชการ',
            'slug' => 'ยุธศาสตร์แผนปฏิบัติราชการ',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มนโยบายและแผน')->first()->id,
            'name' => 'รายงานการกำกับติดตามการดำเนินงานรายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการดำเนินงานรายไตรมาส',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มนโยบายและแผน')->first()->id,
            'name' => 'รายงานผลการดำเนินงานประจำปี',
            'slug' => 'รายงานผลการดำเนินงานประจำปี',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มนโยบายและแผน')->first()->id,
            'name' => 'แผนการใช้จ่ายงบประมาณประจำปี',
            'slug' => 'แผนการใช้จ่ายงบประมาณประจำปี',
        ]);

        // ทรัพยากรบุคคล
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานบุคคล')->first()->id,
            'name' => 'นโยบายการบริหาร',
            'slug' => 'นโยบายการบริหาร',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานบุคคล')->first()->id,
            'name' => 'การดำเนินการตามนโยบาย',
            'slug' => 'การดำเนินการตามนโยบาย',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานบุคคล')->first()->id,
            'name' => 'หลักเกณฑ์การบริหารและพัฒนา',
            'slug' => 'หลักเกณฑ์การบริหารและพัฒนา',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานบุคคล')->first()->id,
            'name' => 'รายงานผลการบริหารและพัฒนาทรัพยากรบุคคล',
            'slug' => 'รายงานผลการบริหารและพัฒนาทรัพยากรบุคคล',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานบุคคล')->first()->id,
            'name' => 'ระเบียบ-กฏหมายที่เกี่ยวข้อง',
            'slug' => 'ระเบียบ-กฏหมายที่เกี่ยวข้อง',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานบุคคล')->first()->id,
            'name' => 'คู่มือหรือมาตรฐานการปฏิบัติงาน',
            'slug' => 'คู่มือหรือมาตรฐานการปฏิบัติงาน',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานบุคคล')->first()->id,
            'name' => 'มาตรการตรวจสอบการใช้ดุลพินิจ',
            'slug' => 'มาตรการตรวจสอบการใช้ดุลพินิจ',
        ]);

        // เงินงบประมาณ
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'ประกาศขายทอดตลาด',
            'slug' => 'ประกาศขายทอดตลาด',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'ประกาศจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศจัดซื้อจัดจ้าง',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'ประกาศผลผู้ขนะการจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศผลผู้ขนะการจัดซื้อจัดจ้าง',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'ประกาศเผยแพร่แผนการจัดซื้อจัดจ้าง',
            'slug' => 'ประกาศเผยแพร่แผนการจัดซื้อจัดจ้าง',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'ประกาศสัญญาและข้อตกลง',
            'slug' => 'ประกาศสัญญาและข้อตกลง',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'แผนการจัดซื้อจัดจ้างประจำปี',
            'slug' => 'แผนการจัดซื้อจัดจ้างประจำปี',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'ระเบียบที่เกี่ยวข้อง',
            'slug' => 'ระเบียบที่เกี่ยวข้อง',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'รายงานผลการจัดซื้อจัดจ้างในรอบปี',
            'slug' => 'รายงานผลการจัดซื้อจัดจ้างในรอบปี',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => ' สรุปผลการจัดซื้อจัดจ้างรายเดือน(สขร.)',
            'slug' => ' สรุปผลการจัดซื้อจัดจ้างรายเดือน(สขร.)',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'แจ้งการโอนเงิน',
            'slug' => 'แจ้งการโอนเงิน',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'รายงานการกำกับติดตามการใช้จ่ายงบประมาณ-รายไตรมาส',
            'slug' => 'รายงานการกำกับติดตามการใช้จ่ายงบประมาณ-รายไตรมาส',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'เผยแพร่งบทดลองประจำเดือน',
            'slug' => 'เผยแพร่งบทดลองประจำเดือน',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'รายงานผลการใช้จ่ายงบประมาณประจำปี',
            'slug' => 'รายงานผลการใช้จ่ายงบประมาณประจำปี',
        ]);
        LegislationList::updateOrCreate([
            'user_id' => 1,
            'role_id' => Role::where('slug','กลุ่มบริหารงานการเงินและสินทรัพย์')->first()->id,
            'name' => 'มาตรการส่งเสริมความโปร่งใสในการจัดซื้อจัดจ้าง',
            'slug' => 'มาตรการส่งเสริมความโปร่งใสในการจัดซื้อจัดจ้าง',
        ]);
    }
}
