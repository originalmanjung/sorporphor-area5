<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminPermission = Permission::all();

        Role::updateOrCreate([
            'name' => 'แอดมิน',
            'slug' => 'แอดมิน',
            'deletable' => false
        ])->permissions()->sync($adminPermission->pluck('id'));

        Role::updateOrCreate([
            'name' => 'โรงเรียน',
            'slug' => 'โรงเรียน',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'ผู้บริหารสพป.ชม.5',
            'slug' => 'ผู้บริหารสพป.ชม.5',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มอำนวยการ',
            'slug' => 'กลุ่มอำนวยการ',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มนโยบายและแผน',
            'slug' => 'กลุ่มนโยบายและแผน',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มบริหารงานบุคคล',
            'slug' => 'กลุ่มบริหารงานบุคคล',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มบริหารงานการเงินและสินทรัพย์',
            'slug' => 'กลุ่มบริหารงานการเงินและสินทรัพย์',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มส่งเสริมการจัดการศึกษา',
            'slug' => 'กลุ่มส่งเสริมการจัดการศึกษา',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มพัฒนาครูและบุคลากรทางการศึกษา',
            'slug' => 'กลุ่มพัฒนาครูและบุคลากรทางการศึกษา',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา',
            'slug' => 'กลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร',
            'slug' => 'กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'หน่วยตรวจสอบภายใน',
            'slug' => 'หน่วยตรวจสอบภายใน',
            'deletable' => false
        ]);

        Role::updateOrCreate([
            'name' => 'กลุ่มกฎหมายและคดี',
            'slug' => 'กลุ่มกฎหมายและคดี',
            'deletable' => false
        ]);
    }
}
