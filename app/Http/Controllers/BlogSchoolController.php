<?php

namespace App\Http\Controllers;

use App\Models\BlogSchool;
use Illuminate\Http\Request;

class BlogSchoolController extends Controller
{
    public function blogschoolAll()
    {
        $blogschools = BlogSchool::active()->latest()->paginate(8);
        return view('blogschool.blogschoolAll',[
            'blogschools' => $blogschools
        ]);
    }

    public function blogschoolShow($blogschool)
    {
        $blogschool = BlogSchool::with('blogSchoolPhotos')->slug($blogschool)->firstOrFail();
        return view('blogschool.blogschoolShow',[
            'blogschool' => $blogschool
        ]);
    }
}
