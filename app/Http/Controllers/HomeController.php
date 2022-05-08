<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\PaymentSlip;
use App\Models\Job;
use App\Models\Budget;
use App\Models\Notice;
use App\Models\NoticeSchool;
use App\Models\News;
use App\Models\BlogSchool;
use App\Models\Banner;
use App\Models\Intergrity;
use App\Models\Video;
use Illuminate\Http\Request;
use PDF;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::limit(3)->orderBy('created_at', 'desc')->get();
        $bannercarousels = Banner::carousel()->latest()->get();
        $bannercontents = Banner::Content()->latest()->get();
        $news = News::active()->latest()->take(15)->get();
        $blogschools = BlogSchool::active()->latest()->take(15)->get();
        $purchases = Purchase::limit(3)->orderBy('created_at', 'desc')->get();
        $paymentSlips = PaymentSlip::limit(3)->orderBy('created_at', 'desc')->get();
        $jobs = Job::limit(3)->orderBy('created_at', 'desc')->get();
        $budgets = Budget::limit(3)->orderBy('created_at', 'desc')->get();
        $notices = Notice::limit(3)->orderBy('created_at', 'desc')->get();
        $noticeSchools = NoticeSchool::limit(4)->orderBy('created_at', 'desc')->get();
        $intergrities = Intergrity::where('parent_id',NULL)->get();
        return view('home',[
            'purchases' => $purchases,
            'jobs' => $jobs,
            'paymentSlips' => $paymentSlips,
            'budgets' => $budgets,
            'notices' => $notices,
            'noticeSchools' => $noticeSchools,
            'news' => $news,
            'blogschools' => $blogschools,
            'bannercarousels' => $bannercarousels,
            'bannercontents' => $bannercontents,
            'videos' => $videos,
            'intergrities' => $intergrities
        ]);
    }

    public function intergrityMenualWork()
    {
        $intergrityMenualwork = Intergrity::menualwork()->active()->get();
        return view('intergrity-plane-menual.intergrityMenualWork',[
            'intergrityMenualwork' => $intergrityMenualwork
        ]);
    }

    public function intergrityMenualPlaneWork()
    {

        $intergrityPlanelwork = Intergrity::menualplanework()->active()->get();
        return view('intergrity-plane-menual.intergrityPlaneWork',[
            'intergrityPlanelwork' => $intergrityPlanelwork
        ]);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function showPDF(Intergrity $intergrity)
    {
        return view('viewPDF',[
            'intergrity' => $intergrity,
        ]);
    }
}
