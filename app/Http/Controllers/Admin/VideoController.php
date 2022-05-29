<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use App\Http\Requests\Video\StoreVideoRequest;
use App\Http\Requests\Video\UpdateVideoRequest;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
Use Alert;

class VideoController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->authorizeResource(Video::class, 'video');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $videos = Video::all();
        return view('admin.video.index',[
            'videos' => $videos
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        Gate::authorize('app.videos.create');
        return view('admin.video.form');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreVideoRequest $request)
    {
        Gate::authorize('app.videos.create');
        if ($request->hasFile('file')) {
            $photo = $request->file('file');
            $filename  = 'photo-' . uniqid() . '.' .$photo->getClientOriginalExtension();
            $photo->storeAs('video_photos', $filename, 'public');
        }
        Video::create([
            'name' => $request->name,
            'description' => $request->description,
            'filename' => $filename,
            'url' => $request->url,
            'user_id' => auth()->user()->id,
        ]);
        Alert::toast('บันทึกข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.videos.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function show(Video $video)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function edit(Video $video)
    {
        Gate::authorize('app.videos.edit');
        return view('admin.video.form',[
            'video' => $video
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateVideoRequest $request, Video $video)
    {
        Gate::authorize('app.videos.edit');
        if ($request->hasFile('file')) {
            storage::disk('public')->delete('video_photos/'.$video->filename);
            $photo = $request->file('file');
            $filename  = 'photo-' . uniqid() . '.' .$photo->getClientOriginalExtension();
            $photo->storeAs('video_photos', $filename, 'public');
        }
        $video->update([
            'name' => $request->name,
            'description' => $request->description,
            'filename' => isset($filename) ? $filename : $video->filename,
            'url' => $request->url,
            'user_id' => auth()->user()->id,
        ]);
        Alert::toast('อัฟเดทข้อมูลสำเร็จ!','success');
        return  redirect()->route('app.videos.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Video  $video
     * @return \Illuminate\Http\Response
     */
    public function destroy(Video $video)
    {
        Gate::authorize('app.videos.destroy');
        if($video->filename != null){
            storage::disk('public')->delete('video_photos/'.$video->filename);
        }
        $video->delete();
        Alert::toast('ลบข้อมูลสำเร็จ!','success');
        return redirect()->route('app.videos.index');
    }
}
