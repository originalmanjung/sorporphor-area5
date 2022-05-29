<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NoticeSchool;
use Illuminate\Http\Request;
use App\Http\Requests\NoticeSchool\StoreNoticeSchoolRequest;
use App\Http\Requests\NoticeSchool\UpdateNoticeSchoolRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class NoticeSchoolController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(NoticeSchool::class, 'noticeSchool');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $noticeSchools = NoticeSchool::orderBy('created_at', 'desc')->get();
        return view('admin.noticeSchool.index',[
            'noticeSchools' => $noticeSchools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.noticeSchools.create');
        return view('admin.noticeSchool.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreNoticeSchoolRequest $request)
    {
        Gate::authorize('app.noticeSchools.create');
        $noticeSchool = new NoticeSchool;
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            NoticeSchool::UploadFile($file, $noticeSchool);
        }
        $noticeSchool->name = $request->name;
        $noticeSchool->description = $request->description;
        $noticeSchool->save();
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.noticeSchools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\NoticeSchool  $noticeSchool
     * @return \Illuminate\Http\Response
     */
    public function show(NoticeSchool $noticeSchool)
    {
        return view('admin.noticeSchool.show',[
            'noticeSchool' => $noticeSchool
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\NoticeSchool  $noticeSchool
     * @return \Illuminate\Http\Response
     */
    public function edit(NoticeSchool $noticeSchool)
    {
        Gate::authorize('app.noticeSchools.edit');
        return view('admin.noticeSchool.form',[
            'noticeSchool' => $noticeSchool
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\NoticeSchool  $noticeSchool
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateNoticeSchoolRequest $request, NoticeSchool $noticeSchool)
    {
        Gate::authorize('app.noticeSchools.edit');
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            NoticeSchool::UploadFile($file, $noticeSchool);
        }
        $noticeSchool->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.noticeSchools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\NoticeSchool  $noticeSchool
     * @return \Illuminate\Http\Response
     */
    public function destroy(NoticeSchool $noticeSchool)
    {
        Gate::authorize('app.noticeSchools.destroy');
        if (Storage::exists('public/noticeSchool_files/'.$noticeSchool->file)) {
            Storage::delete('public/noticeSchool_files/'.$noticeSchool->file);
            $noticeSchool->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
