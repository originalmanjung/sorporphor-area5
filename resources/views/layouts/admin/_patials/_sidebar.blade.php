<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <div class="sb-sidenav-menu-heading">Core</div>
                <a class="nav-link {{ Route::is('app.dashboard') ? 'active' : '' }}" href="{{ route('app.dashboard') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    แดชบอร์ด
                </a>
                @if (Auth::user()->role->slug == 'แอดมิน')
                    <a class="nav-link collapsed {{ Route::is('app.roles*') || Route::is('app.users*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsUsers" aria-expanded="false" aria-controls="collapseLayoutsUsers">
                        <div class="sb-nav-link-icon"><i class="fas fa-users-cog"></i></div>
                        ตั้งค่าผู้ใช้งาน
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Route::is('app.roles*') || Route::is('app.users*') ? 'show' : '' }}" id="collapseLayoutsUsers" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Route::is('app.roles*') ? 'active' : '' }}" href="{{ route('app.roles.index') }}">สิทธิ์</a>
                            <a class="nav-link {{ Route::is('app.users*') ? 'active' : '' }}" href="{{ route('app.users.index') }}">ผู้ใช้</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">Interface</div>
                    <a class="nav-link collapsed {{ Route::is('app.personals*') || Route::is('app.banners*') || Route::is('app.histories*') || Route::is('app.missions*') || Route::is('app.dutys*') || Route::is('app.manageStructures*') ? 'show' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsWeb" aria-expanded="false" aria-controls="collapseLayoutsWeb">
                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        ตั้งค่าส่วนเว็ปไซด์
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Route::is('app.personals*') || Route::is('app.banners*') || Route::is('app.histories*') || Route::is('app.missions*') || Route::is('app.dutys*') || Route::is('app.manageStructures*')  ? 'show' : '' }}" id="collapseLayoutsWeb" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Route::is('app.histories*') ? 'active' : '' }}" href="{{ route('app.histories.index') }}">ประวัติความเป็นมา</a>
                            <a class="nav-link {{ Route::is('app.missions*') ? 'active' : '' }}" href="{{ route('app.missions.index') }}">วิสัยทัศน์ พันธกิจ</a>
                            <a class="nav-link {{ Route::is('app.dutys*') ? 'active' : '' }}" href="{{ route('app.dutys.index') }}">อำนาจหน้าที่</a>
                            <a class="nav-link {{ Route::is('app.manageStructures*') ? 'active' : '' }}" href="{{ route('app.manageStructures.index') }}">โครงสร้างการบริหาร</a>
                            <a class="nav-link {{ Route::is('app.banners*') ? 'active' : '' }}" href="{{ route('app.banners.index') }}">แบนเนอร์</a>
                            <a class="nav-link {{ Route::is('app.personals*') ? 'active' : '' }}" href="{{ route('app.personals.index') }}">บุคลากร</a>
                        </nav>
                    </div>
                @endif

                @if (Auth::user()->role->slug != 'โรงเรียน')
                    <div class="sb-sidenav-menu-heading">GENERAL</div>
                    <a class="nav-link collapsed {{ Route::is('app.news*') || Route::is('app.videos*') || Route::is('app.notices*') || Route::is('app.jobs*') || Route::is('app.purchases*') || Route::is('app.paymentSlips*') || Route::is('app.budgets*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsGeneral" aria-expanded="false" aria-controls="collapseLayoutsGeneral">
                        <div class="sb-nav-link-icon"><i class="fas fa-cogs"></i></div>
                        การใช้งานทั่วไป
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Route::is('app.news*') || Route::is('app.videos*') || Route::is('app.notices*') || Route::is('app.jobs*') || Route::is('app.purchases*') || Route::is('app.paymentSlips*') || Route::is('app.budgets*')  ? 'show' : '' }}" id="collapseLayoutsGeneral" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{ Route::is('app.news*') ? 'active' : '' }}" href="{{ route('app.news.index') }}">กิจจกรรม สพป.</a>
                            <a class="nav-link {{ Route::is('app.videos*') ? 'active' : '' }}" href="{{ route('app.videos.index') }}">วิดีโอลิ้ง</a>
                            <a class="nav-link {{ Route::is('app.notices*') ? 'active' : '' }}" href="{{ route('app.notices.index') }}">ประชาสัมพันธ์</a>
                            <a class="nav-link {{ Route::is('app.jobs*') ? 'active' : '' }}" href="{{ route('app.jobs.index') }}">รับสมัครงาน</a>
                            <a class="nav-link {{ Route::is('app.purchases*') ? 'active' : '' }}" href="{{ route('app.purchases.index') }}">จัดซื้อ-จัดจ้าง</a>
                            <a class="nav-link {{ Route::is('app.paymentSlips*') ? 'active' : '' }}" href="{{ route('app.paymentSlips.index') }}">แจ้งการโอนเงิน</a>
                            <a class="nav-link {{ Route::is('app.budgets*') ? 'active' : '' }}" href="{{ route('app.budgets.index') }}">งบทดลอง</a>
                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">ITA SETTING</div>
                    <a class="nav-link collapsed {{ Route::is('app.intergrities*') ? 'active' : '' }}" href="#" data-bs-toggle="collapse" data-bs-target="#collapseLayoutsOTA" aria-expanded="false" aria-controls="collapseLayoutsOTA">
                        <div class="sb-nav-link-icon"><i class="fas fa-tasks"></i></div>
                        ตั้งค่าส่วน ITA
                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                    </a>
                    <div class="collapse {{ Route::is('app.intergrities*') ? 'show' : '' }}" id="collapseLayoutsOTA" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                        <nav class="sb-sidenav-menu-nested nav">
                            <a class="nav-link {{  Route::is('app.intergrities*') ? 'active' : '' }}" href="{{ route('app.intergrities.index') }}">ITA</a>

                        </nav>
                    </div>

                    <div class="sb-sidenav-menu-heading">ALL</div>
                     <a class="nav-link {{ Route::is('app.standardPraticeGuides*') ? 'active' : '' }}" href="{{ route('app.standardPraticeGuides.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                        คู่มือการปฏิบัติงาน
                    </a>
                     <a class="nav-link {{ Route::is('app.standardServices*') ? 'active' : '' }}" href="{{ route('app.standardServices.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-star"></i></div>
                        คู่มือการให้บริการ
                    </a>
                    <a class="nav-link {{ Route::is('app.laws*') ? 'active' : '' }}" href="{{ route('app.laws.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-archway"></i></div>
                        กฏหมายที่เกี่ยวข้อง
                    </a>
                     <a class="nav-link {{ Route::is('app.letters*') ? 'active' : '' }}" href="{{ route('app.letters.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-chalkboard"></i></div>
                        จดหมายข่าว
                    </a>

                    <div class="sb-sidenav-menu-heading">Complaint</div>
                    @if (Auth::user()->role->slug == 'แอดมิน' || Auth::user()->role->slug == 'กลุ่มกฎหมายและคดี')
                    <a class="nav-link {{ Route::is('app.complaints*') ? 'active' : '' }}" href="{{ route('app.complaints.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-clipboard-check"></i></div>
                        รับเรื่องร้องเรียน-ร้องทุกข์
                    </a>
                    @endif
                    @if (Auth::user()->role->slug == 'แอดมิน' || Auth::user()->role->slug == 'กลุ่มอำนวยการ')
                    <a class="nav-link {{ Route::is('app.opinions*') ? 'active' : '' }}" href="{{ route('app.opinions.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-gavel"></i></div>
                        รับฟังความคิดเห็น
                    </a>
                    @endif
                    @if (Auth::user()->role->slug == 'แอดมิน' || Auth::user()->role->slug == 'กลุ่มอำนวยการ')
                    <a class="nav-link {{ Route::is('app.questions*') ? 'active' : '' }}" href="{{ route('app.questions.index') }}">
                        <div class="sb-nav-link-icon"><i class="fas fa-question-circle"></i></div>
                        Q&A
                    </a>
                    @endif
                @endif

                @if (Auth::user()->role->slug == 'แอดมิน' || Auth::user()->role->slug == 'โรงเรียน')
                <div class="sb-sidenav-menu-heading">SCHOOL</div>
                <a class="nav-link {{ Route::is('app.blogSchools*') ? 'active' : '' }}" href="{{ route('app.blogSchools.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-school"></i></div>
                    กิจกรรมโรงเรียน
                </a>
                <a class="nav-link {{ Route::is('app.noticeSchools*') ? 'active' : '' }}" href="{{ route('app.noticeSchools.index') }}">
                    <div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                    ประชาสัมพันธ์โรงเรียน
                </a>
                @endif
                <div class="sb-sidenav-menu-heading">SIGN OUT</div>
                <a class="nav-link" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                    document.getElementById('logout-form').submit();">
                    <div class="sb-nav-link-icon"><i class="fas fa-sign-out-alt"></i></div>
                    {{ __('Logout') }}
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logged in as:</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>
