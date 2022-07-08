<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    public function  noticeAll()
    {
        $notices = Notice::latest()->paginate(8);
        return view('notice.noticeAll',[
            'notices' => $notices
        ]);
    }

    public function  noticeShow($notice)
    {
        $notice = Notice::where('slug', $notice)->firstOrFail();
        return view('notice.noticeShow',[
            'notice' => $notice
        ]);
    }
}
