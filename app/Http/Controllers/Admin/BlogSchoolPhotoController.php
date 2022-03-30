<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogSchoolPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class BlogSchoolPhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\BlogSchoolPhoto  $blogSchoolPhoto
     * @return \Illuminate\Http\Response
     */
    public function show(BlogSchoolPhoto $blogSchoolPhoto)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\BlogSchoolPhoto  $blogSchoolPhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(BlogSchoolPhoto $blogSchoolPhoto)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\BlogSchoolPhoto  $blogSchoolPhoto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BlogSchoolPhoto $blogSchoolPhoto)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\BlogSchoolPhoto  $blogSchoolPhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogSchoolPhoto $blogSchoolPhoto)
    {
        if (Storage::exists('public/blogschool_photos/'.$blogSchoolPhoto->filename)) {
            Storage::delete('public/blogschool_photos/'.$blogSchoolPhoto->filename);
            $blogSchoolPhoto->delete();
            Alert::toast('ลบข้อมูลสำเร็จ!','success');
            return back();
        } else {
            Alert::error('File Not Found');
            return back();
        }
    }
}
