<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\NoticeSchoolController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\PurchaseController;
use App\Http\Controllers\PaymentSlipController;
use App\Http\Controllers\BudgetController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\BlogSchoolController;
use App\Http\Controllers\VideoController;
use App\Http\Controllers\PersonalController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\OpinionController;
use App\Http\Controllers\QuestionController;
use App\Http\Controllers\MenuPersonalWorkController;
use App\Http\Controllers\MissionController;
use App\Http\Controllers\DutyController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\ManageStructureController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Route::get('/test', function () {
//     return view('index');
// });
Route::get('/', [HomeController::class, 'index'])->name('home');
// ประชาสัมพันธ์
Route::get('notices', [NoticeController::class, 'noticeAll'])->name('noticeAll');
Route::get('notice/{slug}', [NoticeController::class, 'noticeShow'])->name('noticeShow');
// ประชาสัมพันธ์โรงเรียน
Route::get('noticeSchools', [NoticeSchoolController::class, 'noticeSchoolAll'])->name('noticeSchoolAll');
Route::get('noticeSchools/{slug}', [NoticeSchoolController::class, 'noticeSchoolShow'])->name('noticeSchoolShow');
// รับสมัครงาน
Route::get('jobs', [JobController::class, 'jobAll'])->name('jobAll');
Route::get('job/{slug}', [JobController::class, 'jobShow'])->name('jobShow');
// จัดซื้อ-จัดจ้าง
Route::get('purchases', [PurchaseController::class, 'purchaseAll'])->name('purchaseAll');
Route::get('pruchase/{slug}', [PurchaseController::class, 'purchaseShow'])->name('purchaseShow');
// แจ้งการโอนเงิน
Route::get('paymentSlips', [PaymentSlipController::class, 'paymentSlipAll'])->name('paymentSlipAll');
Route::get('paymentSlip/{slug}', [PaymentSlipController::class, 'paymentSlipShow'])->name('paymentSlipShow');
// งบทดลอง
Route::get('budgets', [BudgetController::class, 'budgetAll'])->name('budgetAll');
Route::get('budget/{slug}', [BudgetController::class, 'budgetShow'])->name('budgetShow');
// กิจกรรม สพป.
Route::get('news', [NewsController::class, 'newsAll'])->name('newsAll');
Route::get('news/{slug}', [NewsController::class, 'newsShow'])->name('newsShow');
// กิจกรรมโรงเรียนในสังกัด
Route::get('blogschools', [BlogSchoolController::class, 'blogschoolAll'])->name('blogschoolAll');
Route::get('blogschools/{slug}', [BlogSchoolController::class, 'blogschoolShow'])->name('blogschoolShow');
// วีดีโอ
Route::get('videos', [VideoController::class, 'videoAll'])->name('videoAll');
Route::get('videos/{slug}', [VideoController::class, 'videoShow'])->name('videoShow');
// บุคลกรแต่ละกลุ่ม
Route::get('personalDepartment/{slug?}', [PersonalController::class, 'personalDepartment'])->name('personalDepartment');
Route::get('personalDepartment/{slug?}', [PersonalController::class, 'personalDepartment'])->name('personalDepartment');
// แจ้งเรื่องร้องทุกข์
Route::resource('complaints', ComplaintController::class)->only(['index','create','store']);
// รับฟังความคิดเห็น
Route::resource('opinions', OpinionController::class)->only(['create','store']);
// Q&A
Route::resource('questions', QuestionController::class)->except(['edit','update','destroy']);
//คู่มือปฏิบัติงานกลุ่ม
Route::get('intergrityMenualWork', [HomeController::class, 'intergrityMenualWork'])->name('menual.work');
//ยุธศาสตร์แผนปฏิบัติราชการ
Route::get('intergrityMenualPlanWork', [HomeController::class, 'intergrityMenualPlaneWork'])->name('menual.planework');
// คู่มือปฏิบัติงานรายบุคคล
Route::get('menualPersonalWork', [MenuPersonalWorkController::class, 'menualPersonalWorkAll'])->name('menualPersonalWorkAll');
Route::get('menualPersonalWorkFile/{slug}', [MenuPersonalWorkController::class, 'menualPersonalWorkShow'])->name('menualPersonalWorkShow');
// วิสัยทัศน์ พันธกิจ
Route::get('missions', [MissionController::class, 'index'])->name('mission.index');
// ภาระกิจหน้าที่
Route::get('dutys', [DutyController::class, 'index'])->name('duty.index');
// ประวัติความเป็นมา
Route::get('histories', [HistoryController::class, 'index'])->name('histories.index');
// โครงสร้างการบริหารงาน
Route::get('manageStructures', [ManageStructureController::class, 'index'])->name('manageStructure.index');

// pdf
Route::get('intergrity-pdf-view/{intergrity}', [HomeController::class, 'showPDF'])->name('showPDF');

Route::get('contact/', function () {
    return view('contact');
});

Route::get('bigdata/', function () {
    return view('bigdata');
});

Auth::routes(['register' => false]);

