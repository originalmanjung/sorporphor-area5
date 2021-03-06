<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Module;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Dashboard
        // $moduleAppDashboard = Module::updateOrCreate(['name' => 'แอดมิน แดชบอร์ด']);
        // Permission::updateOrCreate([
        //     'module_id' => $moduleAppDashboard->id,
        //     'name' => 'Access Dashboard',
        //     'slug' => 'app.dashboard'
        // ]);

        // Role
        $moduleAppRole = Module::updateOrCreate(['name' => 'จัดการสิทธิ์']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Access Role',
            'slug' => 'app.roles.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Create Role',
            'slug' => 'app.roles.create'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Edit Role',
            'slug' => 'app.roles.edit'
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppRole->id,
            'name' => 'Delete Role',
            'slug' => 'app.roles.destroy'
        ]);


        // User
        $moduleAppUser = Module::updateOrCreate(['name' => 'จัดการยูชเซอร์']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Access User',
            'slug' => 'app.users.index',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Create User',
            'slug' => 'app.users.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Edit User',
            'slug' => 'app.users.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppUser->id,
            'name' => 'Delete User',
            'slug' => 'app.users.destroy',
        ]);

        // Personal
        $moduleAppPersonal = Module::updateOrCreate(['name' => 'จัดการบุคลากร']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPersonal->id,
            'name' => 'Create Personal',
            'slug' => 'app.personals.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPersonal->id,
            'name' => 'Edit Personal',
            'slug' => 'app.personals.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPersonal->id,
            'name' => 'Delete Personal',
            'slug' => 'app.personals.destroy',
        ]);

        // Banner
        $moduleAppBanner = Module::updateOrCreate(['name' => 'จัดการแบนเนอร์']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBanner->id,
            'name' => 'Create Banner',
            'slug' => 'app.banners.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBanner->id,
            'name' => 'Edit Banner',
            'slug' => 'app.banners.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBanner->id,
            'name' => 'Delete Banner',
            'slug' => 'app.banners.destroy',
        ]);

        // History
        $moduleAppHistory = Module::updateOrCreate(['name' => 'จัดการประวัติความเป็นมา']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHistory->id,
            'name' => 'Create History',
            'slug' => 'app.histories.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHistory->id,
            'name' => 'Edit History',
            'slug' => 'app.histories.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHistory->id,
            'name' => 'Delete History',
            'slug' => 'app.histories.destroy',
        ]);

        // Duty
        $moduleAppDuty = Module::updateOrCreate(['name' => 'จัดการภาระกิจหน้าที่']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDuty->id,
            'name' => 'Create Duty',
            'slug' => 'app.dutys.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDuty->id,
            'name' => 'Edit Duty',
            'slug' => 'app.dutys.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppDuty->id,
            'name' => 'Delete Duty',
            'slug' => 'app.dutys.destroy',
        ]);

        // Mission
        $moduleAppMission = Module::updateOrCreate(['name' => 'จัดการวิสัยทัศน์ พันธกิจ']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMission->id,
            'name' => 'Create Mission',
            'slug' => 'app.missions.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMission->id,
            'name' => 'Edit Mission',
            'slug' => 'app.missions.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppMission->id,
            'name' => 'Delete Mission',
            'slug' => 'app.missions.destroy',
        ]);

        // ManageStructure
        $moduleAppManageStructure = Module::updateOrCreate(['name' => 'จัดการโครงการสร้างการบริหาร']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppManageStructure->id,
            'name' => 'Create ManageStructure',
            'slug' => 'app.manageStructures.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppManageStructure->id,
            'name' => 'Edit ManageStructure',
            'slug' => 'app.manageStructures.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppManageStructure->id,
            'name' => 'Delete ManageStructure',
            'slug' => 'app.manageStructures.destroy',
        ]);

        // News
        $moduleAppNews = Module::updateOrCreate(['name' => 'กิจกรรม สพป.']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNews->id,
            'name' => 'Create News',
            'slug' => 'app.news.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNews->id,
            'name' => 'Edit News',
            'slug' => 'app.news.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNews->id,
            'name' => 'Delete News',
            'slug' => 'app.news.destroy',
        ]);

        // BlogSchool
        $moduleAppBlogSchool = Module::updateOrCreate(['name' => 'กิจกรรมโรงเรียน']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBlogSchool->id,
            'name' => 'Create BlogSchool',
            'slug' => 'app.blogSchools.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBlogSchool->id,
            'name' => 'Edit BlogSchool',
            'slug' => 'app.blogSchools.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBlogSchool->id,
            'name' => 'Delete BlogSchool',
            'slug' => 'app.blogSchools.destroy',
        ]);

        // Video
        $moduleAppVideo = Module::updateOrCreate(['name' => 'จัดการวีดีโอ']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppVideo->id,
            'name' => 'Create Video',
            'slug' => 'app.videos.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppVideo->id,
            'name' => 'Edit Video',
            'slug' => 'app.videos.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppVideo->id,
            'name' => 'Delete Video',
            'slug' => 'app.videos.destroy',
        ]);

        // Notice
        $moduleAppNotice = Module::updateOrCreate(['name' => 'จัดการประกาศ']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNotice->id,
            'name' => 'Create Notice',
            'slug' => 'app.notices.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNotice->id,
            'name' => 'Edit Notice',
            'slug' => 'app.notices.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNotice->id,
            'name' => 'Delete Notice',
            'slug' => 'app.notices.destroy',
        ]);

        // Notice School
        $moduleAppNoticeSchool = Module::updateOrCreate(['name' => 'จัดการประชาสัมพันธ์']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNoticeSchool->id,
            'name' => 'Create NoticeSchool',
            'slug' => 'app.noticeSchools.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNoticeSchool->id,
            'name' => 'Edit NoticeSchool',
            'slug' => 'app.noticeSchools.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppNoticeSchool->id,
            'name' => 'Delete NoticeSchool',
            'slug' => 'app.noticeSchools.destroy',
        ]);

        // Purchase
        $moduleAppPurchase = Module::updateOrCreate(['name' => 'จัดการประกาศจัดซื้อ-จัดจ้าง']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPurchase->id,
            'name' => 'Create Purchase',
            'slug' => 'app.purchases.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPurchase->id,
            'name' => 'Edit Purchase',
            'slug' => 'app.purchases.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPurchase->id,
            'name' => 'Delete Purchase',
            'slug' => 'app.purchases.destroy',
        ]);

        // Job
        $moduleAppJob = Module::updateOrCreate(['name' => 'จัดการสมัครงาน']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppJob->id,
            'name' => 'Create Job',
            'slug' => 'app.jobs.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppJob->id,
            'name' => 'Edit Job',
            'slug' => 'app.jobs.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppJob->id,
            'name' => 'Delete Job',
            'slug' => 'app.jobs.destroy',
        ]);

        // Payment Slip
        $moduleAppPaymentSlip = Module::updateOrCreate(['name' => 'จัดการแจ้งการโอนเงิน']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPaymentSlip->id,
            'name' => 'Create PaymentSlip',
            'slug' => 'app.paymentSlips.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPaymentSlip->id,
            'name' => 'Edit PaymentSlip',
            'slug' => 'app.paymentSlips.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPaymentSlip->id,
            'name' => 'Delete PaymentSlip',
            'slug' => 'app.paymentSlips.destroy',
        ]);

        // Budget
        $moduleAppBudget = Module::updateOrCreate(['name' => 'จัดการงบทดลอง']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBudget->id,
            'name' => 'Create Budget',
            'slug' => 'app.budgets.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBudget->id,
            'name' => 'Edit Budget',
            'slug' => 'app.budgets.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppBudget->id,
            'name' => 'Delete Budget',
            'slug' => 'app.budgets.destroy',
        ]);


        // Intergrity
        $moduleAppIntergrity = Module::updateOrCreate(['name' => 'จัดการเพิ่มข้อมูล ITA']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppIntergrity->id,
            'name' => 'Create Intergrities',
            'slug' => 'app.intergrities.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppIntergrity->id,
            'name' => 'Edit Intergrities',
            'slug' => 'app.intergrities.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppIntergrity->id,
            'name' => 'Delete Intergrities',
            'slug' => 'app.intergrities.destroy',
        ]);

        // Compaint
        $moduleAppComplaint = Module::updateOrCreate(['name' => 'รับเรื่องร้องเรียน-ร้องทุกข์']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppComplaint->id,
            'name' => 'Edit Complaint',
            'slug' => 'app.complaints.edit',
        ]);

        // Opinion
        $moduleAppOpinion = Module::updateOrCreate(['name' => 'รับฟังความคิดเห็น']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppOpinion->id,
            'name' => 'Edit Opinion',
            'slug' => 'app.opinions.edit',
        ]);

        // Q&A
        $moduleQuestion = Module::updateOrCreate(['name' => 'Q&A']);
        Permission::updateOrCreate([
            'module_id' => $moduleQuestion->id,
            'name' => 'Edit Question',
            'slug' => 'app.questions.edit',
        ]);

        // Law
        $moduleAppLaw = Module::updateOrCreate(['name' => 'กฏหมายที่เกี่ยวข้อง']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppLaw->id,
            'name' => 'Create Laws',
            'slug' => 'app.laws.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppLaw->id,
            'name' => 'Edit Laws',
            'slug' => 'app.laws.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppLaw->id,
            'name' => 'Delete Laws',
            'slug' => 'app.laws.destroy',
        ]);

        // คู่มือมาตรฐานการปฏิบัติงาน
        $moduleAppStandardPraticeGuide = Module::updateOrCreate(['name' => 'คู่มือมาตรฐานการปฏิบัติงาน']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppStandardPraticeGuide->id,
            'name' => 'Create Standard Pratice Guide',
            'slug' => 'app.standardPraticeGuides.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppStandardPraticeGuide->id,
            'name' => 'Edit Standard Pratice Guide',
            'slug' => 'app.standardPraticeGuides.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppStandardPraticeGuide->id,
            'name' => 'Delete Standard Pratice Guide',
            'slug' => 'app.standardPraticeGuides.destroy',
        ]);

        // คู่มือมาตรฐานการให้บริการ
        $moduleAppStandardService = Module::updateOrCreate(['name' => 'คู่มือมาตรฐานการให้บริการ']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppStandardService->id,
            'name' => 'Create Standard Service',
            'slug' => 'app.standardServices.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppStandardService->id,
            'name' => 'Edit Standard Service',
            'slug' => 'app.standardServices.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppStandardService->id,
            'name' => 'Delete Standard Service',
            'slug' => 'app.standardServices.destroy',
        ]);

        // Letter
        $moduleAppLetter = Module::updateOrCreate(['name' => 'จัดการจดหมายข่าว']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppLetter->id,
            'name' => 'Create Letter',
            'slug' => 'app.letters.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppLetter->id,
            'name' => 'Edit Letter',
            'slug' => 'app.letters.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppLetter->id,
            'name' => 'Delete Letter',
            'slug' => 'app.letters.destroy',
        ]);

        // Corruption
        $moduleAppCorruption = Module::updateOrCreate(['name' => 'การดำเนินงานเพื่อป้องกันการทุจริต']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppCorruption->id,
            'name' => 'Create Corruption',
            'slug' => 'app.corruptions.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppCorruption->id,
            'name' => 'Edit Corruption',
            'slug' => 'app.corruptions.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppCorruption->id,
            'name' => 'Delete Corruption',
            'slug' => 'app.corruptions.destroy',
        ]);

        // Popup Images
        $moduleAppPopupimage = Module::updateOrCreate(['name' => 'รูปป๊อบอัฟ']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPopupimage->id,
            'name' => 'Create Popupimage',
            'slug' => 'app.popupimages.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPopupimage->id,
            'name' => 'Edit Popupimage',
            'slug' => 'app.popupimages.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppPopupimage->id,
            'name' => 'Delete Popupimage',
            'slug' => 'app.popupimages.destroy',
        ]);

        // Human Resource
        $moduleAppHumanResource = Module::updateOrCreate(['name' => 'หลักเกณฑ์การบริหารและพัฒนาทรัพยากรบุคคล']);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHumanResource->id,
            'name' => 'Create HumanResource',
            'slug' => 'app.humanResources.create',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHumanResource->id,
            'name' => 'Edit HumanResource',
            'slug' => 'app.humanResources.edit',
        ]);
        Permission::updateOrCreate([
            'module_id' => $moduleAppHumanResource->id,
            'name' => 'Delete HumanResource',
            'slug' => 'app.humanResources.destroy',
        ]);


    }
}
