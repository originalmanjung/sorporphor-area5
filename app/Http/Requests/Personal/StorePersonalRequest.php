<?php

namespace App\Http\Requests\Personal;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StorePersonalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        Gate::authorize('app.personals.create');
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'   => 'nullable|string|max:255',
            'birthday'   => 'nullable|date_format:"d-m-Y"',
            'phone' => 'nullable|numeric|digits:10',
            'email' => 'nullable|string|email|max:255',
            'facebook' => 'nullable|string|max:255',
            'twitter' => 'nullable|string|max:255',
            'instagram' => 'nullable|string|max:255',
            'position'   => 'nullable|string|max:255',
            'position_general' => 'nullable|in:ผู้อำนวยการ สพป.เชียงใหม่ เขต 5,รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5,ผู้อำนวยการกลุ่มอำนวยการ,ผู้อำนวยการกลุ่มนโยบายและแผน,ผู้อำนวยการกลุ่มบริหารบุคคล,ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์,ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา,ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา,ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา,ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร,ผู้อำนวยการกลุ่มกฎหมายและคดี,ผู้อำนวยการหน่วยตรวจสอบภายใน',
            'level' => 'nullable|string|max:255',
            'layer' => 'nullable|string|max:255',
            'role_id' => 'required|exists:roles,id',
            'personal_type' => 'nullable|in:ข้าราชการ,พนักงานราชการ,ลูกจ้างประจำ,ลูกจ้างชั่วคราว',
            'avatar' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ];
    }
}
