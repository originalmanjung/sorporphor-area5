<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;
use App\Models\News;
use App\Policies\NewsPolicy;
use App\Models\BlogSchool;
use App\Policies\BlogSchoolPolicy;
use App\Models\Notice;
use App\Policies\NoticePolicy;
use App\Models\NoticeSchool;
use App\Policies\NoticeSchoolPolicy;
use App\Models\Purchase;
use App\Policies\PurchasePolicy;
use App\Models\Job;
use App\Policies\JobPolicy;
use App\Models\PaymentSlip;
use App\Policies\PaymentSlipPolicy;
use App\Models\Budget;
use App\Policies\BudgetPolicy;
use App\Models\Video;
use App\Policies\VideoPolicy;
use App\Models\Banner;
use App\Policies\BannerPolicy;
use App\Models\MenuPersonalWork;
use App\Policies\MenuPersonalWorkPolicy;
use App\Models\Mission;
use App\Policies\MissionPolicy;
use App\Models\Intergrity;
use App\Policies\IntergrityPolicy;
use App\Models\Corruption;
use App\Policies\CorruptionPolicy;


class AuthServiceProvider extends ServiceProvider
{
    /**
     * The policy mappings for the application.
     *
     * @var array
     */
    protected $policies = [
        // 'App\Models\Model' => 'App\Policies\ModelPolicy',
        News::class => NewsPolicy::class,
        Notice::class => NoticePolicy::class,
        NoticeSchool::class => NoticeSchoolPolicy::class,
        Purchase::class => PurchasePolicy::class,
        Job::class => JobPolicy::class,
        PaymentSlip::class => PaymentSlipPolicy::class,
        Budget::class => BudgetPolicy::class,
        Video::class => VideoPolicy::class,
        Banner::class => BannerPolicy::class,
        BlogSchool::class => BlogSchoolPolicy::class,
        MenuPersonalWork::class => MenuPersonalWorkPolicy::class,
        Mission::class => MissionPolicy::class,
        Intergrity::class => IntergrityPolicy::class,
        Corruption::class => CorruptionPolicy::class,
    ];

    /**
     * Register any authentication / authorization services.
     *
     * @return void
     */
    public function boot()
    {
        $this->registerPolicies();

        //
    }
}
