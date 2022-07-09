<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\NewsController;
use App\Http\Controllers\Admin\NewsPhotoController;
use App\Http\Controllers\Admin\BlogSchoolController;
use App\Http\Controllers\Admin\BlogSchoolPhotoController;
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
use App\Http\Controllers\Admin\CorruptionController;
use App\Http\Controllers\Admin\OpinionController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\MissionController;
use App\Http\Controllers\Admin\DutyController;
use App\Http\Controllers\Admin\HistoryController;
use App\Http\Controllers\Admin\HumanResourceController;
use App\Http\Controllers\Admin\IntergrityController;
use App\Http\Controllers\Admin\LawController;
use App\Http\Controllers\Admin\LetterController;
use App\Http\Controllers\Admin\ManageStructureController;
use App\Http\Controllers\Admin\PopupimageController;
use App\Http\Controllers\Admin\StandardPraticeGuideController;
use App\Http\Controllers\Admin\StandardServiceController;

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
Route::resource('complaints', ComplaintController::class)->only(['index', 'show', 'update', 'viewPDF']);
Route::get('complaints/pdf/{complaint}', [ComplaintController::class,'viewPDF'])->name('complaints.viewPDF');
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
// ITA
Route::resource('intergrities', IntergrityController::class);
Route::get('intergrities/pdf/{intergrity}', [IntergrityController::class,'showPDF'])->name('intergrities.showPDF');
Route::delete('intergrities/file/{intergrity}', [IntergrityController::class,'deleteFile'])->name('intergrities.deleteFile');
// กฏหมายที่เกี่ยวข้อง
Route::resource('laws', LawController::class);
Route::get('laws/child-law/{law}', [LawController::class,'createChild'])->name('laws.createChild');
Route::get('laws/pdf/{law}', [LawController::class,'viewPDF'])->name('laws.viewPDF');
// หลักเกณฑ์การบริหารและพัฒนาทรัพยากรบุคคล
Route::resource('humanResources', HumanResourceController::class);
Route::get('humanResources/child-humanResource/{humanResource}', [HumanResourceController::class,'createChild'])->name('humanResources.createChild');
Route::get('humanResources/pdf/{humanResource}', [HumanResourceController::class,'viewPDF'])->name('humanResources.viewPDF');
// คู่มือมาตรฐานการปฏิบัติงาน
Route::resource('standardPraticeGuides', StandardPraticeGuideController::class);
Route::get('standardPraticeGuides/child-standardPraticeGuide/{standardPraticeGuide}', [StandardPraticeGuideController::class,'createChild'])->name('standardPraticeGuides.createChild');
Route::get('standardPraticeGuides/view-pdf/{standardPraticeGuide}', [StandardPraticeGuideController::class,'viewPDF'])->name('standardPraticeGuides.viewPDF');
// คู่มือมาตรฐานการให้บริการ
Route::resource('standardServices', StandardServiceController::class);
Route::get('standardServices/child-standardService/{standardService}', [StandardServiceController::class,'createChild'])->name('standardServices.createChild');
// จดหมายข่าว
Route::resource('letters', LetterController::class)->except(['show']);
// การดำเนินงานเพื่อป้องกันการทุจริต
Route::resource('corruptions', CorruptionController::class);
// Popup หน้าโฮม
Route::resource('popupimages', PopupimageController::class)->except(['show']);;
