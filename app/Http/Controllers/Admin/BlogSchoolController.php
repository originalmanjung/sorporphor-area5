<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSchool;
use Illuminate\Http\Request;
use App\Http\Requests\BlogSchool\StoreBlogSchoolRequest;
use App\Http\Requests\BlogSchool\UpdateBlogSchoolRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class BlogSchoolController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->authorizeResource(BlogSchool::class, 'blogSchool');
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blogSchools = BlogSchool::with('blogSchoolPhotos')->orderBy('created_at', 'desc')->get();
        return view('admin.blogschool.index',[
            'blogSchools' => $blogSchools
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.blogSchools.create');
        return view('admin.blogschool.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreBlogSchoolRequest $request)
    {
        Gate::authorize('app.blogSchools.create');
        $blogSchool = BlogSchool::create([
            'title' => $request->title,
            'description' => $request->description,
            'conditions' => $request->conditions,
            'user_id' => auth()->user()->id,
            'status' => $request->filled('status')
        ]);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            BlogSchool::UploadFile($file, $blogSchool);
        }
        Alert::toast('เพิ่มข้อมูลสำเร็จ!','success');
        return redirect()->route('app.blogSchools.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Http\Response
     */
    public function show(BlogSchool $blogSchool)
    {
        return view('admin.blogschool.show',[
            'blogSchool' => $blogSchool,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogSchool $blogSchool)
    {
        Gate::authorize('app.blogSchools.edit');
        return view('admin.blogschool.form',[
            'blogSchool' => $blogSchool,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateBlogSchoolRequest $request, BlogSchool $blogSchool)
    {
        Gate::authorize('app.blogSchools.edit');
        $blogSchool->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->filled('status')
        ]);
        if ($request->hasfile('file')) {
            $file = $request->file('file');
            BlogSchool::UploadFile($file, $blogSchool);
        }
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.blogSchools.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogSchool  $blogSchool
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogSchool $blogSchool)
    {
        Gate::authorize('app.blogSchools.destroy');
        $blogSchool->delete();
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return redirect()->route('app.blogSchools.index');
    }
}
