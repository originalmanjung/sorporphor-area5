<?php

namespace App\Http\Controllers;

use App\Models\NoticeSchool;
use Illuminate\Http\Request;

class NoticeSchoolController extends Controller
{
    public function  noticeSchoolAll()
    {
        $noticeSchools = NoticeSchool::orderBy('created_at')->paginate(8);
        return view('noticeSchool.noticeSchoolAll',[
            'noticeSchools' => $noticeSchools
        ]);
    }

    public function  noticeSchoolShow($noticeSchool)
    {
        $noticeSchool = NoticeSchool::where('slug', $noticeSchool)->firstOrFail();
        return view('noticeSchool.noticeSchoolShow',[
            'noticeSchool' => $noticeSchool
        ]);
    }
}
