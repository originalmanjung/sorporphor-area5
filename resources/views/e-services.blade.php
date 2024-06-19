@extends('layouts.frontend.app')
@push('css')
<style>
    .mb-80 {
    margin-bottom: 80px !important;
    }
    .feature {
        position: relative;
    }

    .feature-item h4 {
        line-height: 1;
    }

    .feature-item p {
        line-height: 25px;
    }

    .feature-item:hover .feature-icon {
        box-shadow: 0px 18px 43px 0px rgba(0, 141, 236, 0.21);
    }

    .feature-bg-1 {
        position: absolute;
        left: 0;
        top: 50%;
        z-index: -1;
    }

    @media (max-width: 767px) {
        .feature-bg-1 {
            display: none;
        }
    }

    .feature-bg-2 {
        position: absolute;
        right: 0;
        bottom: 10%;
        z-index: -1;
    }

    @media (max-width: 767px) {
        .feature-bg-2 {
            display: none;
        }
    }

    .feature-icon {
        display: inline-block;
        height: 90px;
        width: 90px;
        border-radius: 5px;
        color: #fff;
        font-size: 45px;
        line-height: 90px;
        background: #30a42a;
        box-shadow: 0px 18px 25px 0px rgba(0, 141, 236, 0.1);
        text-align: center;
        transition: .2s ease;
    }

</style>
@endpush
@section('content')
<main id="main">
    <div class="back_re mb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>E-Services</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Contact Section ======= -->
    <section id="contact" class="contact">
        <div class="container">

            <!-- feature -->
            <section class="section feature mb-0" id="feature">
                <div class="container">
                    <div class="row mt-5">
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="http://1.179.155.142/amssplus/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-atlas feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบสำนักงานอิเล็กทรอนิกส์</h4>
                                    <p>(Smart Area)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="http://www2.chiangmaiarea5.go.th/salary/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-money-check-alt feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบพิมพ์บัญชีจ่ายเงินรายเดือน</h4>
                                    <p>(E-Salary)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSeXKV1I3HebFwDawIdOLPbaomLGlbWQkc1mARReTbMZnUMZ2w/viewform" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-cloud feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>แบบบันทึกการนิเทศ กำกับ ติดตาม โรงเรียน</h4>
                                    <p>(Record form)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="http://www2.chiangmaiarea5.go.th/bigdata2024/index.php" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-coins feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบบริการข้อมูลภาครัฐ</h4>
                                    <p>(BigData)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="https://docs.google.com/forms/d/e/1FAIpQLSe75AYtmitRj-2QV_yH_nnAPAHVrimt9oJvJjd7smj7iPCwIQ/viewform" class="d-flex feature-item">
                                <div>
                                   <i class="fas fa-graduation-cap feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบจองห้องประชุม สำหรับหน่วยงานภายนอก</h4>
                                    <p>(Meeting Room)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="http://eic.chiangmaiarea5.go.th/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-server feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ศูนย์ข้อมูลสารสนเทศทางการศึกษา</h4>
                                    <p>(EIC)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="https://data.bopp-obec.info/emis/index_area.php?Area_CODE=5005" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-digital-tachograph feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบสารสนเทศเพื่อบริหารการศึกษา</h4>
                                    <p>(EMIS)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="https://schoolmis.obec.expert/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-school feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบบริหารจัดการสถานศึกษา</h4>
                                    <p>(SchoolMIS)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="http://1.179.155.140/studentscare/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-database feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบการดูแลช่วยเหลือนักเรียน</h4>
                                    <p>(B-obec)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="https://cct.thaieduforall.org/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-child feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบปัจจัยพื้นฐานนักเรียนยากจน</h4>
                                    <p>(CCT)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="http://eme3.obec.go.th/~eme53/index.php" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-hands feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบบริหารโรงเรียนและเขตพื้นที่การศึกษา</h4>
                                    <p>(e-SEASS)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="https://smart.obec.go.th/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-house-damage feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบสำนักงานอิเล็กทรอนิกส์</h4>
                                    <p>(Smart OBEC)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="https://www.obecmail.obec.go.th/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-mail-bulk feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบจดหมายอิเล็กทรอนิกส์</h4>
                                    <p>(OBEC Mail)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="#" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-balance-scale-left feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบการจัดซื้อจัดจ้างภาครัฐ</h4>
                                    <p>(e-GP)</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="http://www.uprightcode.xyz/index.php" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-fist-raised feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบข้อมูลฯ โรงเรียนสุจริต</h4>
                                    <p>Trustworthy School</p>
                                </div>
                            </a>
                        </div>
                        <!-- feature item -->
                        <div class="col-md-6 mb-80">
                            <a href="https://e-budget.jobobec.in.th/" class="d-flex feature-item">
                                <div>
                                    <i class="fas fa-calculator feature-icon mr-4"></i>
                                </div>
                                <div>
                                    <h4>ระบบบัญชีการศึกษาขั้นพื้นฐาน</h4>
                                    <p>(E-Budget)</p>
                                </div>
                            </a>
                        </div>

                    </div>
                </div>
                <img class="feature-bg-1 up-down-animation" src="images/background-shape/feature-bg-1.png" alt="bg-shape">
                <img class="feature-bg-2 left-right-animation" src="images/background-shape/feature-bg-2.png" alt="bg-shape">
            </section>
            <!-- /feature -->

        </div>
    </section><!-- End Contact Section -->

</main><!-- End #main -->
@endsection
