<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Notice;
use Illuminate\Http\Request;
use App\Http\Requests\Notice\StoreNoticeRequest;
use App\Http\Requests\Notice\UpdateNoticeRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class NoticeController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Notice::class, 'notice');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notices = Notice::orderBy('created_at', 'desc')->get();
        return view('admin.notice.index',[
            'notices' => $notices
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.notices.create');
        return view('admin.notice.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticeRequest $request)
    {
        Gate::authorize('app.notices.create');
        $notice = new Notice;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            Notice::UploadFile($file, $notice);
        }
        $notice->user_id = auth()->user()->id;
        $notice->name = $request->name;
        $notice->description = $request->description;
        $notice->save();
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.notices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice)
    {
        return view('admin.notice.show',[
            'notice' => $notice
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice)
    {
        Gate::authorize('app.notices.edit');
        return view('admin.notice.form',[
            'notice' => $notice
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticeRequest $request, Notice $notice)
    {
        Gate::authorize('app.notices.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            Notice::UploadFile($file, $notice);
        }
        $notice->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.notices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice)
    {
        Gate::authorize('app.notices.destroy');
        if (Storage::exists('public/notice_files/'.$notice->file)) {
            Storage::delete('public/notice_files/'.$notice->file);
            $notice->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
