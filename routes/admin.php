<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsPhotoController;
use App\Http\Controllers\Admin\BlogSchoolController;
use App\Http\Controllers\Admin\BlogSchoolPhotoController;
use App\Http\Controllers\Admin\LegislationListController;
use App\Http\Controllers\Admin\LegislationController;
use App\Http\Controllers\Admin\LegislationFileController;
use App\Http\Controllers\Admin\MenuPersonalWorkController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\NoticeSchoolController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\PaymentSlipController;
use App\Http\Controllers\Admin\BudgetController;
use App\Http\Controllers\Admin\VideoController;
use App\Http\Controllers\Admin\PersonalController;
use App\Http\Controllers\Admin\BannerController;
use App\Http\Controllers\Admin\ComplaintController;
use App\Http\Controllers\Admin\OpinionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\DutyController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\ManageStructureController;

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

Route::get('dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index'])->name('dashboard');
Route::resource('roles', RoleController::class)->except(['show']);
Route::resource('users', UserController::class);
// กิจกรรม สพป.
Route::resource('news', NewsController::class);
Route::resource('news-photos', NewsPhotoController::class)->only(['destroy']);
// กิจกรรมโรงเรียน
Route::resource('blogSchools', BlogSchoolController::class);
Route::resource('blogSchoolPhotos', BlogSchoolPhotoController::class)->only(['destroy']);
// กฏระเบียบแต่ละฝ่าย
Route::resource('legislationLists', LegislationListController::class)->except(['show']);
Route::resource('legislations', LegislationController::class)->only(['index','create','store']);
Route::resource('legislationFiles', LegislationFileController::class)->only(['destroy', 'show']);
// คู่มือปฏิบัติงานรายบุคคล
Route::resource('menuPersonalWorks', MenuPersonalWorkController::class);
// ประกาศประชาสัมพันธ์ สพป.
Route::resource('notices', NoticeController::class);
// ประกาศประชาสัมพันธ์โรงเรียน
Route::resource('noticeSchools', NoticeSchoolController::class);
// ประกาศจัดซื้อจัดจ้าง
Route::resource('purchases', PurchaseController::class);
// ประกาศรับสมัครงาน
Route::resource('jobs', JobController::class);
// แจ้งโอนเงิน
Route::resource('paymentSlips', PaymentSlipController::class);
// งบทดลอง
Route::resource('budgets', BudgetController::class);
// วีดีโอ
Route::resource('videos', VideoController::class)->except(['show']);
// บุคลากร
Route::resource('personals', PersonalController::class);
// รูปแบนเนอร์
Route::resource('banners', BannerController::class)->except(['show']);
// แจ้งเรื่องร้องทุกข์
Route::resource('complaints', ComplaintController::class)->only(['index', 'show', 'update']);
Route::get('complaints/approved', [ComplaintController::class, 'approved'])->name('complaints.approved');
// รับฟังความคิดเห็น
Route::resource('opinions', OpinionController::class)->only(['index', 'show', 'update']);
Route::get('opinions/approved', [OpinionController::class, 'approved'])->name('opinions.approved');
// Q&A
Route::resource('questions', QuestionController::class);
// วิสัยทัศน์ พันธกิจ
Route::resource('missions', MissionController::class);
// ภาระกิจหน้าที่
Route::resource('dutys', DutyController::class);
// ประวัติความเป็นมา
Route::resource('histories', HistoryController::class);
// โครงสร้างการบริหาร
Route::resource('manageStructures', ManageStructureController::class)->except(['show']);

