<?php

namespace App\Http\Controllers;

use App\Models\Personal;
use Illuminate\Http\Request;

class PersonalController extends Controller
{
    public function personalDepartment($group)
    {
        $myArr = ['ผู้บริหาร', 'กลุ่มบริหารงานการเงินและสินทรัพย์', 'กลุ่มบริหารงานบุคคล', 'กลุ่มนโยบายและแผน', 'กลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา', 'กลุ่มส่งเสริมการจัดการศึกษา', 'กลุ่มอำนวยการ','กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร', 'กลุ่มพัฒนาครูและบุคลากรทางการศึกษา', 'กลุ่มกฎหมายและคดี','หน่วยตรวจสอบภายใน'];
        if (in_array($group, $myArr)) {
            if ($group == 'ผู้บริหาร') {
                $personals = Personal::manager()->active()->orderBy('id', 'asc')->get();
            } else {
                $personals = Personal::department($group)->active()->orderBy('id', 'asc')->get();
            }
            return view('personal',[
                'personals' => $personals,
                'group' => $group,
    
            ]);
        } else {
            return abort(404);
        }
    }

}
