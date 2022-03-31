  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top d-flex align-items-center">
      <div class="container d-flex align-items-center">

          <!--<h1 class="logo me-auto"><a href="index.html">Sailor</a></h1>-->
          <!-- Uncomment below if you prefer to use an image logo -->
          <a href="{{ route('home') }}" class="logo me-auto"><img src="{{ asset('home/assets/img/logo/logo-responsive.png') }}"
                  alt="" class="img-fluid"></a>

          <nav id="navbar" class="navbar">
              <ul>
                  <li><a href="{{ route('home') }}" class="active">หน้าหลัก</a></li>

                  <li class="dropdown"><a href="#"><span>เกี่ยวกับหน่วยงาน</span> <i class="bi bi-chevron-down"></i></a>
                      <ul>
                          <li><a href="{{ route('histories.index') }}">ประวัติความเป็นมา</a></li>
                          <li class="dropdown"><a href="#"><span>ข้อมูลบุคลกร</span> <i
                                      class="bi bi-chevron-right"></i></a>
                              <ul>
                                  <li><a href="{{ route('personalDepartment')}} ">ผู้บริหารการศึกษา</a></li>
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
                          <li><a href="{{ route('mission.index') }}">วิสัยทัศน์ พันธกิจ</a></li>
                          <li><a href="{{ route('duty.index') }}">ภาระกิจหน้าที่</a></li>
                          <li><a href="{{ route('legislationList.PlanWork') }}">ยุธศาสตร์ แผนปฏิบัติราชการ</a></li>
                          <li><a href="{{ route('manageStructure.index') }}">โครงการสร้างบริหารงาน</a></li>
                          <li><a href="{{ route('legislationList.ManualWork') }}">คู่มือหรือมาตรฐานการปฏิบัติงาน</a></li>
                          <li><a href="{{ route('menualPersonalWorkAll') }}">คู่มือหรือมาตรฐานการปฏิบัติงานรายบุคคล</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a href="#"><span>สถานีข่าว</span> <i
                              class="bi bi-chevron-down"></i></a>
                      <ul>
                          <li><a href="{{ route('noticeAll') }}">ประชาสัมพันธ์</a></li>
                          <li><a href="{{ route('newsAll') }}">กิจกรรมเชียงใหม่ เขต 5</a></li>
                          <li><a href="{{ route('blogschoolAll') }}">กิจกรรมโรงเรียนในสังกัด</a></li>
                          <li><a href="{{ route('purchaseAll') }}">ประกาศคำสั่งจัดซื้อจัดจ้าง</a></li>
                          <li><a href="{{ route('jobAll') }}">รับสมัครงาน</a></li>
                          <li><a href="{{ route('paymentSlipAll') }}">แจ้งโอนเงิน</a></li>
                      </ul>
                  </li>
                  <li class="dropdown"><a href="#"><span>E-Service</span> <i
                              class="bi bi-chevron-down"></i></a>
                      <ul>
                          <li><a href="http://1.179.155.140/amsspp/" target="_blank">รับ-ส่ง หนังสือราชการ</a></li>
                          <li><a href="http://www.chiangmaiarea5.go.th/salary/" target="_blank">สลิปเงินเดือนออนไลน์</a></li>
                          <li><a href="https://bobec.bopp-obec.info/" target="_blank">ข้อมูลสิ่งก่อสร้าง</a></li>
                          <li><a href="https://e-budget.jobobec.in.th/" target="_blank">ผลการบริหารงบประมาณรายจ่ายประจำปี</a></li>
                          <li><a href="https://data.bopp-obec.info/emis/" target="_blank">EMIS Online</a></li>
                          <li><a href="https://smart.obec.go.th/" target="_blank">Smart OBEC</a></li></li>
                          <li><a href="http://www.gprocurement.go.th/new_index.html" target="_blank">ระบบจัดซื้อ-จัดจ้างภาครัฐ</a></li>
                          <li><a href="https://cct.thaieduforall.org/" target="_blank">ปัจจัยพื้นฐานนักเรียนยากจน</a></li>

                      </ul>
                  </li>
                  <li><a href="bigdata/">Big Data</a></li>
                  <li><a href="contact/">ติดต่อเรา</a></li>
                  <li>
                      @if (Route::has('login'))
                      @auth
                      <a href="{{ route('app.dashboard') }}" class="getstarted d-flex justify-content-start">Admin
                          Page</a>
                      @else
                      <a href="{{ route('login') }}" class="getstarted d-flex justify-content-start"><i
                              class="bi bi-person-circle"
                              style="font-size: 1.2rem; margin-right:5px;"></i>ลงชื่อเข้าใช้</a></a>

                      @if (Route::has('register'))
                      <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                      @endif
                      @endauth
                      @endif
                  </li>
              </ul>
              <i class="bi bi-list mobile-nav-toggle"></i>
          </nav><!-- .navbar -->

      </div>
  </header><!-- End Header -->
  {{-- <li>
        @if (Route::has('login'))
            @auth
                <a href="{{ route('app.dashboard') }}" class="getstarted d-flex justify-content-start">Admin Page</a>
  @else
  <a href="{{ route('login') }}" class="getstarted d-flex justify-content-start"><i class="bi bi-person-circle"
          style="font-size: 1.2rem; margin-right:5px;"></i>ลงชื่อเข้าใช้</a></a>

  @if (Route::has('register'))
  <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
  @endif
  @endauth
  @endif
  </li> --}}
