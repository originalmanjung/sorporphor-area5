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
                                    <a href="insurance.html">เกี่ยวกับเรา</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ route('histories.index') }}">ประวัติความเป็นมา</a></li>
                                        <li><a href="{{ route('mission.index') }}">วิสัยทัศน์/พันธกิจ/ค่านิยม</a></li>
                                        <li><a href="{{ route('manageStructure.index') }}">โครงสร้างองค์กร</a></li>
                                        <li><a href="{{ route('duty.index') }}">อำนาจหน้าที่</a></li>
                                        <li><a href="{{ route('law') }}">กฏหมายที่เกี่ยวข้อง</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="insurance.html">อี-เซอร์วิส</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="http://www.chiangmai1.ksom.net/money/index.php">ระบบเงินเดือนอิเล็กทรอนิกส์(E-Money)</a></li>
                                        <li><a href="http://61.19.21.20/neof/">ระบบสำนักงานอิเล็กทรอนิกส์(E-Paperless)</a></li>
                                        <li><a href="https://www.chiangmaiarea1.go.th/kp7/">ระบบแจ้งความประสงค์ขอสำเนาทะเบียนประวัติข้าราชการ</a></li>
                                        <li><a href="https://sites.google.com/a/chiangmaiarea1.go.th/cm1e-learning/home">ระบบ E-Learning บทเรียนออนไลน์</a></li>
                                        <li><a href="http://schoolmis.obec.expert">ระบบบริหารจัดการศึกษา (Schoolmis)</a></li>
                                        <li><a href="https://www.bopp-obec.info/home/">ระบบจัดเก็บข้อมูลนักเรียนรายบุคคล (DMC)</a></li>
                                        <li><a href="https://data.bopp-obec.info/emis/">ระบบข้อมูลสารสนเทศเพื่อการบริหาร (EMIS)</a></li>
                                        <li><a href="http://eme3.obec.go.th/~eme53/">ระบบบริหารโรงเรียนและเขตพื้นที่ (E-SEASS)</a></li>
                                        <li><a href="https://bobec.bopp-obec.info/index.php">ระบบฐานข้อมูลสิ่งก่อสร้าง (B-obec)</a></li>
                                        <li><a href="https://cct.thaieduforall.org/">ระบบปัจจัยพื้นฐานเด็กยากจน (CCT)</a></li>
                                        <li><a href="https://admission.bopp-obec.info/login.php">ระบบรายงานการรับนักเรียน</a></li>
                                        <li><a href="http://www.uprightcode.xyz/index.php">ระบบข้อมูลฯ โรงเรียนสุจริต</a></li>
                                        <li><a href="https://sites.google.com/view/scoutchiangmai">สำนักงานลูกเสือจังหวัดเชียงใหม่</a></li>
                                        <li><a href="https://sites.google.com/chiangmaiarea1.go.th/covid19-area1/%E0%B8%AB%E0%B8%99%E0%B8%B2%E0%B9%81%E0%B8%A3%E0%B8%81">ศูนย์ Covid – 19 สพป.เชียงใหม่ เขต 5</a></li>
                                    </ul>
                                </li>
                                <li class="has-children">
                                    <a href="insurance.html">หน่วยงานในสังกัด</a>
                                    <ul class="dropdown arrow-top">
                                        <li><a href="{{ route('personalDepartment', 'ผู้บริหาร')}} ">ผู้บริหารการศึกษา</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มบริหารงานการเงินและสินทรัพย์') }}">กลุ่มบริหารงานการเงินและสินทรัพย์</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มบริหารงานบุคคล') }}">กลุ่มบริหารงานบุคคล</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มนโยบายและแผน') }}">กลุ่มนโยบายและแผน</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา') }}">กลุ่มนิเทศติดตาม และประเมินผลการจัดการศึกษา</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มส่งเสริมการจัดการศึกษา') }}">กลุ่มส่งเสริมการจัดการศึกษา</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มอำนวยการ') }}">กลุ่มอำนวยการ</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร') }}">กลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร</a></li>
                                        <li><a href="{{ route('personalDepartment','กลุ่มพัฒนาครูและบุคลกรทางการศึกษา') }}">กลุ่มพัฒนาครูและบุคลกรทางการศึกษา</a></li>
                                        <li><a href="{{ route('personalDepartment', 'กลุ่มกฎหมายและคดี') }}">กลุ่มกฎหมายและคดี</a></li>
                                        <li><a href="{{ route('personalDepartment', 'หน่วยตรวจสอบภายใน') }}">หน่วยตรวจสอบภายใน</a></li>
                                    </ul>
                                </li>
                                <li><a href="{{ route('contact') }}">ติดต่อเรา</a></li>
                                <li>
                                    @if (Route::has('login'))
                                    @auth
                                    <a href="{{ route('app.dashboard') }}"><span class="d-inline-block p-2 bg-primary text-white btn btn-primary btn-sm">Dashboard</span></a>
                                    @else
                                    <a href="{{ route('login') }}"><span class="d-inline-block p-2 bg-primary text-white btn btn-primary btn-sm">Login</span></a>
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
