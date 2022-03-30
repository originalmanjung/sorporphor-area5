<?php

namespace App\Http\Controllers;

use App\Models\MenuPersonalWork;
use App\Models\Role;
use Illuminate\Http\Request;

class MenuPersonalWorkController extends Controller
{
    public function menualPersonalWorkAll()
    {
        $menualPersonalWorks = Role::with('menuPersonalWorks')->whereNotIn('name', ['แอดมิน', 'ผู้ใช้ทั่วไป', 'โรงเรียน', 'ผู้บริหารสพป.ชม.5'])->get();
        return view('menualPersonalWork.menualPersonalWorkAll',[
            'menualPersonalWorks' => $menualPersonalWorks
        ]);
    }

    public function menualPersonalWorkShow($slug)
    {
        $MenuPersonalWorks = MenuPersonalWork::where('slug', $slug)->firstOrFail();
        return view('menualPersonalWork.menualPersonalWorkShow',[
            'MenuPersonalWorks' => $MenuPersonalWorks
        ]);
    }
}
