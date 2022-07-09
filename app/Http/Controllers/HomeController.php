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
use App\Models\Corruption;
use App\Models\HumanResource;
use App\Models\Intergrity;
use App\Models\Law;
use App\Models\Letter;
use App\Models\Video;
use App\Models\Personal;
use App\Models\Popupimage;
use App\Models\StandardPraticeGuide;
use App\Models\StandardService;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $videos = Video::limit(6)->latest()->get();
        $bannercarousels = Banner::carousel()->latest()->get();
        $bannercontents = Banner::Content()->latest()->get();
        $newsGeneral = News::general()->latest()->take(15)->get();
        $newsHonest = News::honest()->latest()->take(15)->get();
        $newsCulture = News::culture()->latest()->take(15)->get();
        $newsnewsParticipation = News::participation()->latest()->take(15)->get();
        $blogschools = BlogSchool::active()->latest()->take(15)->get();
        $purchases = Purchase::limit(2)->latest()->get();
        $paymentSlips = PaymentSlip::limit(2)->latest()->get();
        $jobs = Job::limit(2)->latest()->get();
        $budgets = Budget::limit(2)->latest()->get();
        $notices = Notice::limit(2)->latest()->get();
        $noticeSchools = NoticeSchool::limit(4)->latest()->get();
        $intergrities = Intergrity::where('parent_id',NULL)->get();
        $personals = Personal::where('group', 'ผู้บริหาร')->active()->get();
        $letterRegions = Letter::Region()->limit(10)->latest()->get();
        $letterDistricts = Letter::District()->limit(10)->latest()->get();
        $popupimages = Popupimage::latest()->take(1)->get();
        return view('index',[
            'purchases' => $purchases,
            'jobs' => $jobs,
            'paymentSlips' => $paymentSlips,
            'budgets' => $budgets,
            'notices' => $notices,
            'noticeSchools' => $noticeSchools,
            'newsGeneral' => $newsGeneral,
            'newsHonest' => $newsHonest,
            'newsCulture' => $newsCulture,
            'newsnewsParticipation' => $newsnewsParticipation,
            'blogschools' => $blogschools,
            'bannercarousels' => $bannercarousels,
            'bannercontents' => $bannercontents,
            'videos' => $videos,
            'intergrities' => $intergrities,
            'personals' => $personals,
            'letterRegions' => $letterRegions,
            'letterDistricts' => $letterDistricts,
            'popupimages' => $popupimages,
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



    /**
     * กฏหมายที่เกี่ยวข้อง
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function law()
    {
        $laws = Law::where('parent_id',NULL)->get();
        return view('law.index',[
            'laws' => $laws
        ]);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function lawviewPDF(Law $law)
    {
        return view('law.viewPDF',[
            'law' => $law,
        ]);
    }

    /**
     * หลักเกณฑ์การบริหารและพัฒนาทรัพยากรบุคคล
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function humanResource()
    {
        $humanResources = HumanResource::where('parent_id',NULL)->get();
        return view('humanResource.index',[
            'humanResources' => $humanResources
        ]);
    }

    /**
    * Write code on Method
    *
    * @return response()
    */
    public function humanResourceviewPDF(HumanResource $humanResource)
    {
        return view('humanResource.viewPDF',[
            'humanResource' => $humanResource,
        ]);
    }

    /**
     * คู่มือ/มาตรฐานการปฏิบัติงานของกลุ่ม/หน่วย/บุคลากร
     *
     * @return \Illuminate\Http\Response
     */
    public function standardPraticeGuide()
    {
        $standardPraticeGuides = StandardPraticeGuide::where('parent_id',NULL)->get();
        return view('standard-pratice-guide.index',[
            'standardPraticeGuides' => $standardPraticeGuides
        ]);
    }

    /**
     * คู่มือ/มาตรฐานการปฏิบัติงานของกลุ่ม/หน่วย/บุคลากร
     *
     * @return \Illuminate\Http\Response
     */
    public function standardPraticeGuideShow(StandardPraticeGuide $standardPraticeGuide)
    {
        $standardPraticeGuides = StandardPraticeGuide::where('parent_id',$standardPraticeGuide->id)->get();
        return view('standard-pratice-guide.show',[
            'standardPraticeGuides' => $standardPraticeGuides
        ]);
    }

    /**
     * คู่มือ/มาตรฐานการปฏิบัติงานของกลุ่ม/หน่วย/บุคลากร
     *
     * @return \Illuminate\Http\Response
     */
    public function standardPraticeGuidePDF(StandardPraticeGuide $standardPraticeGuide)
    {
        return view('standard-pratice-guide.viewPDF',[
            'standardPraticeGuide' => $standardPraticeGuide
        ]);
    }

    /**
     * คู่มือ/มาตรฐานการให้บริการสถิติการให้บริการ
     *
     * @return \Illuminate\Http\Response
     */
    public function standardService()
    {
        $standardServices = StandardService::where('parent_id',NULL)->get();
        return view('standard-service.index',[
            'standardServices' => $standardServices
        ]);
    }

    /**
     * คู่มือ/มาตรฐานการให้บริการสถิติการให้บริการ
     *
     * @return \Illuminate\Http\Response
     */
    public function standardServiceShow(StandardService $standardService)
    {
        $standardServices = StandardService::where('slug', $standardService->slug)->first();
        return view('standard-service.show',[
            'standardServices' => $standardServices
        ]);
    }

    /**
     * คู่มือ/มาตรฐานการให้บริการสถิติการให้บริการ
     *
     * @return \Illuminate\Http\Response
     */
    public function standardServicePDF(StandardService $standardService)
    {
        return view('standard-service.viewPDF',[
            'standardService' => $standardService
        ]);
    }


    /**
     * จดหมายข่าว
     *
     * @return \Illuminate\Http\Response
     */
    public function letterAll(Letter $letter)
    {
        $letters = Letter::where('type', $letter->type)->orderBy('created_at')->paginate(8);
        return view('letter.letterAll',[
            'letters' => $letters,
            'letter' => $letter
        ]);
    }

     /**
     * ประกาศเจตจำนงสุจริตในการบริหาร
     *
     * @return \Illuminate\Http\Response
     */
    public function corruptionAll()
    {
        $corruptions = Corruption::all();
        return view('corruption.index',[
            'corruptions' => $corruptions
        ]);
    }
    /**
     * คู่มือ/มาตรฐานการให้บริการสถิติการให้บริการ
     *
     * @return \Illuminate\Http\Response
     */
    public function corruptionShow(Corruption $corruption)
    {
        return view('corruption.show',[
            'corruption' => $corruption
        ]);
    }

}
