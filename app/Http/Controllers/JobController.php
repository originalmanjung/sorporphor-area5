<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class JobController extends Controller
{
    public function  jobAll()
    {
        $jobs = Job::orderBy('created_at')->paginate(8);
        return view('job.jobAll',[
            'jobs' => $jobs
        ]);
    }

    public function  jobShow($job)
    {
        $job = Job::where('slug', $job)->firstOrFail();
        return view('job.jobShow',[
            'job' => $job
        ]);
    }
}
