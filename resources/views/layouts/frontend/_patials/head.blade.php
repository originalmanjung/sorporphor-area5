<div class="site-mobile-menu">
    <div class="site-mobile-menu-header">
        <div class="site-mobile-menu-close mt-3">
            <span class="icon-close2 js-menu-toggle"></span>
        </div>
    </div>
    <div class="site-mobile-menu-body"></div>
</div> <!-- .site-mobile-menu -->

<div class="site-navbar-wrap js-site-navbar bg-white">

    <div class="container">
        <div class="site-navbar bg-light">
            <div class="row align-items-center">
                <div class="col-2">
                    <h2 class="mb-0 site-logo"> <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ asset('funder-template/images/logo/logo-responsive.png') }}" alt="" class="img-fluid"></a></h2>
                </div>
                <div class="col-10">
                    <nav class="site-navigation text-right" role="navigation">
                        <div class="container">
                            <div class="d-inline-block d-lg-none ml-md-0 mr-auto py-3"><a href="#" class="site-menu-toggle js-menu-toggle text-black"><span class="icon-menu h3"></span></a></div>

                            <ul class="site-menu js-clone-nav d-none d-lg-block">
                                <li class="active"><a href="{{ route('home') }}">หน้าแรก</a></li>
                                <li class="has-children">
                                    <a>เกี่ยวกับเรา</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ route('histories.index') }}">ประวัติความเป็นมา</a></li>
                                        <li><a href="{{ route('mission.index') }}">วิสัยทัศน์/พันธกิจ/ค่านิยม</a></li>
                                        <li><a href="{{ route('manageStructure.index') }}">โครงสร้างองค์กร</a></li>
                                        <li><a href="{{ route('duty.index') }}">อำนาจหน้าที่</a></li>
                                        <li><a href="{{ route('law') }}">กฏหมายที่เกี่ยวข้อง</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="{{ route('eServices') }}">E-Service</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="http://1.179.155.142/amssplus/">ระบบสำนักงานอิเล็กทรอนิกส์ (Smart Area)</a></li>
                                        <li><a href="http://www.chiangmaiarea5.go.th/salary/">ระบบพิมพ์บัญชีจ่ายเงินรายเดือน (E-Salary)</a></li>
                                        <li><a href="https://docs.google.com/forms/d/e/1FAIpQLSeXKV1I3HebFwDawIdOLPbaomLGlbWQkc1mARReTbMZnUMZ2w/viewform">แบบบันทึกการนิเทศ กำกับ ติดตาม โรงเรียน</a></li>
                                        <li><a href="http://1.179.155.141/bigdata/">ระบบฐานข้อมูลสารสนเทศ (BigData)</a></li>
                                        <li><a href="http://1.179.155.140/studentscare/">ระบบการดูแลช่วยเหลือนักเรียน (StudentsCare)</a></li>
                                        <li><a href="http://eic.chiangmaiarea5.go.th/">ศุนย์ข้อมูลสารสนเทศทางการศึกษา (EIC)</a></li>
                                        <li><a href="https://data.bopp-obec.info/emis/index_area.php?Area_CODE=5005">ระบบสารสนเทศเพื่อบริหารการศึกษา (EMIS)</a></li>
                                        <li><a href="https://schoolmis.obec.expert/">ระบบบริหารจัดการสถานศึกษา (SchoolMIS)</a></li>
                                        <li><a href="https://bobec.bopp-obec.info/index.php">ระบบฐานข้อมูลสิ่งก่อสร้าง (B-obec)</a></li>
                                        <li><a href="https://cct.thaieduforall.org/">ระบบปัจจัยพื้นฐานนักเรียนยากจน (CCT)</a></li>
                                        <li><a href="http://eme3.obec.go.th/~eme53/index.php">ระบบบริหารโรงเรียนและเขตพื้นที่การศึกษา (e-SEASS)</a></li>
                                        <li><a href="https://smart.obec.go.th/">ระบบสำนักงานอิเล็กทรอนิกส์ (Smart OBEC)</a></li>
                                        <li><a href="https://www.obecmail.obec.go.th/">ระบบจดหมายอิเล็กทรอนิกส์ (OBEC Mail)</a></li>
                                        <li><a href="http://www.gprocurement.go.th/new_index.html">ระบบการจัดซื้อจัดจ้างภาครัฐ (e-GP)</a></li>
                                        <li><a href="http://www.uprightcode.xyz/index.php">ระบบข้อมูลฯ โรงเรียนสุจริต</a></li>
                                        <li><a href="https://e-budget.jobobec.in.th/">ระบบบัญชีการศึกษาขั้นพื้นฐาน (E-Budget)</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a>ข้อมูลบุคลากร</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ route('personalDepartment', 'ผู้บริหาร')}} ">ผู้บริหารการศึกษา</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มบริหารงานการเงินและสินทรัพย์') }}">กลุ่มบริหารการเงินและสินทรัพย์</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มบริหารงานบุคคล') }}">กลุ่มบริหารงานบุคคล</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มนโยบายและแผน') }}">กลุ่มนโยบายและแผน</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา') }}">กลุ่มนิเทศติดตาม และประเมินผลการจัดการศึกษา</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มส่งเสริมการจัดการศึกษา') }}">กลุ่มส่งเสริมการจัดการศึกษา</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มอำนวยการ') }}">กลุ่มอำนวยการ</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร') }}">กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศฯ</a></li>
                                        <li><a href="{{ route('personalDepartment','กลุ่มพัฒนาครูและบุคลากรทางการศึกษา') }}">กลุ่มพัฒนาครูและบุคลากรทางการศึกษา</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มกฎหมายและคดี') }}">กลุ่มกฎหมายและคดี</a></li>
                                        <li><a href="{{ route('personalDepartment', 'หน่วยตรวจสอบภายใน') }}">หน่วยตรวจสอบภายใน</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="{{ route('contact') }}">ติดต่อเรา</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ route('questions.index') }}">Q&A (ถาม-ตอบ)</a></li>
                                        <li><a href="{{ route('opinions.create') }}">ช่องทางการรับฟังความคิดเห็น</a></li>
                                        <li><a href="{{ route('complaint.general') }}">ช่องทางแจ้งเรื่องร้องเรียนทั่วไป</a></li>
                                        <li><a href="{{ route('complaints.index') }}">ช่องทางแจ้งเรื่องร้องเรียนการทุจริตประพฤติมิชอบ</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="{{ route('contact') }}">Social Network</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="https://www.facebook.com/profile.php?id=100069225249500">Facebook</a></li>
                                        <li><a href="https://www.youtube.com/channel/UCpd6DpwfhNsKEdwfRcIJvLQ">Youtube</a></li>
                                    </ul>
                                </li>
                                <li>
                                    @if (Route::has('login'))
                                    @auth
                                    <a class="icon-login" href="{{ route('app.dashboard') }}"><span class=""><i class="fas fa-user-check fa-lg"></i></span></a>
                                    @else
                                    <a class="icon-login" href="{{ route('login') }}"><span class=""><i class="fas fa-user-circle fa-lg"></i></span></a>
                                    @if (Route::has('register'))
                                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                                    @endif
                                    @endauth
                                    @endif
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
