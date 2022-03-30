<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function videoAll()
    {
        $videos = Video::orderBy('created_at')->paginate(8);
        return view('video.videoAll',[
            'videos' => $videos
        ]);
    }

    public function videoshow($video)
    {
        $video = video::where('slug', $video)->firstOrFail();
        return view('video.videoshow',[
            'video' => $video
        ]);
    }
}
