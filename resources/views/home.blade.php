@extends('layouts.home.app')

@push('css')
<style>

</style>
@endpush
@section('content')
<!-- ======= Hero Section ======= -->
<section id="hero">
    <div id="heroCarousel" data-bs-interval="5000" class="carousel slide carousel-fade" data-bs-ride="carousel">

        <ol class="carousel-indicators" id="hero-carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">
            @if ($bannercarousels->isNotEmpty())
                @foreach ($bannercarousels as $carousel)
                <div class="carousel-item active"
                    style="background-image: url({{ asset('storage/banner_files/'. $carousel->file) }})">
                    <div class="carousel-container">
                        <div class="container">
                            <h2 class="animate__animated animate__fadeInDown">{{ $carousel->name}}</h2>
                            <p class="animate__animated animate__fadeInUp">{{ $carousel->description }}</p>
                            <a href="#about" class="btn-get-started animate__animated animate__fadeInUp scrollto">อ่านเพิ่มเติม</a>
                        </div>
                    </div>
                </div>
                @endforeach
            @else
            <div class="carousel-item active" style="background-image: url({{ config('app.placeholder').'1920x1128.png' }})">
                <div class="carousel-container">
                    <div class="container">
                        <h2 class="animate__animated animate__fadeInDown">ยังไม่มีข้อมูลหัวข้อเรื่อง</h2>
                        <p class="animate__animated animate__fadeInUp">ยังไม่มีข้อมูลคอนเทนต์</p>
                        <a class="btn-get-started animate__animated animate__fadeInUp scrollto">Record Not found.</a>
                    </div>
                </div>
            </div>
            @endif
        </div>

        <a class="carousel-control-prev" href="#heroCarousel" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon bi bi-chevron-left" aria-hidden="true"></span>
        </a>

        <a class="carousel-control-next" href="#heroCarousel" role="button" data-bs-slide="next">
            <span class="carousel-control-next-icon bi bi-chevron-right" aria-hidden="true"></span>
        </a>

    </div>
</section><!-- End Hero -->

<main id="main" class="bg-white">


    <!-- ======= Testimonials Section Sorporphor ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Activety</h2>
                <p>กิจกรรมสพป.เชียงใหม่ เขต 5</p>
            </div>

            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @if ($news->isNotEmpty())
                        @foreach ($news as $newsItem)
                            <a href="{{ route('newsShow', $newsItem->slug) }}">
                                <div class="swiper-slide">
                                    <div class="d-flex align-items-stretch">
                                        <div class="card">
                                            <img src="@if($newsItem->newsphotos->isNotEmpty()) {{ asset('storage/news_photos/'. $newsItem->newsphotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" class="card-img-top" alt="...">
                                            <h4><span class="badge bg-danger">กิจกรรมเชียงใหม่ เขต 5</span></h4>
                                            <div class="card-icon">
                                                <i class="bx bx-book-reader"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><a >{{ Str::limit($newsItem->title, 150) }}</a></h5>
                                                <p class="card-text">{{ Str::limit($newsItem->description, 200) }}</p>
                                                <div class="d-flex">
                                                    <small class="text-muted me-auto">{{ $newsItem->created_at->format('d/m/Y') }}</small>
                                                    <h6>ผู้โพส : <span class="badge bg-secondary">{{ $newsItem->user->name }}</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            </a>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            <div class="d-flex align-items-stretch">
                                <div class="card">
                                    <img src="{{ config('app.placeholder').'1024x768.png' }}" class="card-img-top" alt="...">
                                    <h4><span class="badge bg-danger">ยังไม่มีข้อมูล</span></h4>
                                    <div class="card-icon">
                                        <i class="bx bx-book-reader"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a >ยังไม่มีข้อมูล</a></h5>
                                        <p class="card-text">ยังไม่มีข้อมูล</p>
                                        <div class="d-flex">
                                            <small class="text-muted me-auto">ยังไม่มีข้อมูล</small>
                                            <h6>ผู้โพส : <span class="badge bg-secondary">ยังไม่มีข้อมูล</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    @endif
                </div>
                <div class="swiper-pagination"></div>
                @if ($news->isNotEmpty())
                    <div class="mt-3" align="center"><a href="{{ route('newsAll') }}" type="button" class="btn btn-danger text-white">ดูทั้งหมด</a></div>
                @endif
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Frequently Asked Questions Section ======= -->
    <section id="faq" class="faq section-bg">
            <div class="faq-list">
                <div class="section-title">
                    <h2>Notification of the Department</h2>
                    <p>ประกาศเจตจำนงสุจริตในการบริหาร สำนักงานเขตพื้นที่การศึกษาประถมศึกษาเชียงใหม่ เขต 5</p>
                </div>
                <div class="row mb-3">
                    @if ($bannercontents->isNotEmpty())
                        @foreach ($bannercontents as $content)
                            <div class="col-lg-6">
                                <img src="{{ asset('storage/banner_files/'. $content->file) }}" class="img-thumbnail img-fluid"
                                    alt="...">
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-6">
                            <img src="{{ config('app.placeholder').'750x180.png' }}" class="img-thumbnail img-fluid"
                                alt="...">
                        </div>
                        <div class="col-lg-6">
                            <img src="{{ config('app.placeholder').'750x180.png' }}" class="img-thumbnail img-fluid"
                                alt="...">
                        </div>
                    @endif
                </div>
                <ul>
                    @if ($intergrities->isNotEmpty())
                    <div class="row">
                        @foreach ($intergrities as $key => $intergrity)
                            <div class="col-lg-6">
                                <li data-aos="fade-up" data-aos-delay="100">
                                    <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                        data-bs-target="#faq-list-{{ $key }}" class="collapsed"><h5>{{ $intergrity->name }}</h5>
                                        <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                                    <div id="faq-list-{{ $key }}" class="collapse" data-bs-parent=".faq-list">
                                        <ul class="faq-wrap-item-list mb-3">
                                            {{-- @foreach ($legislationList->legislations as $legislation)
                                                @foreach ($legislation->legislationFiles as $legislationFile)
                                                    <li><a href="{{ route('app.legislationFiles.show', $legislationFile->id) }}" class="text-dark" target="_blank"><i class="ri-check-double-line"></i>{{ $legislationFile->name }}</a></li>
                                                @endforeach
                                            @endforeach --}}
                                        </ul>
                                    </div>
                                </li>
                            </div>
                        @endforeach
                    </div>
                    @else
                    <div class="card text-center border border-1">
                        <div class="card-header">
                            Notification
                        </div>
                        <div class="card-body">
                          <p class="card-text">No information was found at this time.</p>
                        </div>
                    </div>
                    @endif
                </ul>
            </div>
    </section><!-- End Frequently Asked Questions Section -->

    <!-- ======= Features Section ======= -->
    <section id="features" class="features">
        <div class="container" data-aos="fade-up">
            <ul class="nav nav-tabs row d-flex">
                <li class="nav-item col-3">
                    <a class="nav-link active show" data-bs-toggle="tab" href="#tab-1">
                        <i class="ri-gps-line"></i>
                        <h4 class="d-none d-lg-block">ประชาสัมพันธ์</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-2">
                        <i class="ri-body-scan-line"></i>
                        <h4 class="d-none d-lg-block">รับสมัครงาน</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-3">
                        <i class="ri-sun-line"></i>
                        <h4 class="d-none d-lg-block">จัดซื้อ-จัดจ้าง</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4">
                        <i class="ri-store-line"></i>
                        <h4 class="d-none d-lg-block">แจ้งการโอนเงิน</h4>
                    </a>
                </li>
                <li class="nav-item col-3">
                    <a class="nav-link" data-bs-toggle="tab" href="#tab-5">
                        <i class="ri-store-line"></i>
                        <h4 class="d-none d-lg-block">งบทดลอง</h4>
                    </a>
                </li>
            </ul>
            <div class="tab-content">
                <div class="tab-pane active show" id="tab-1">
                    <div class="row">
                        <div class="col-lg-7 order-2 order-lg-1 mt-3 mt-lg-0">
                            @if ($notices->isNotEmpty())
                                @foreach ($notices as $notice)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $notice->name }}</h5>
                                            <p class="card-text">{{ Str::limit($notice->description, 150) }}</p>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('noticeShow', $notice->slug) }}" class="btn btn-danger btn-sm text-white me-auto">ดูเพิ่มเติม</a>
                                            <h6>ผู้โพส: <span class="badge bg-secondary">{{ $notice->user->name }}</span></h6>
                                        </div>
                                            <div class="d-flex justify-content-end">
                                                <p >{{ $notice->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-3 d-flex justify-content-end"><a href="{{ route('noticeAll') }}" type="button" class="btn btn-danger btn-sm text-white">ดูทั้งหมด</a></div>
                            @else
                            <div class="card text-center border border-1">
                                <div class="card-header">
                                    Notification
                                </div>
                                <div class="card-body">
                                  <p class="card-text">No information was found at this time.</p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-5 order-1 order-lg-2 text-center">
                            <img src="{{ asset('home/assets/img/features/features-5.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-2">
                    <div class="row">
                        <div class="col-lg-7 order-2 order-lg-1 mt-3 mt-lg-0">
                            @if ($jobs->isNotEmpty())
                                @foreach ($jobs as $job)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $job->name }}</h5>
                                            <p class="card-text">{{ Str::limit($job->description, 150) }}</p>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('jobShow', $job->slug) }}" class="btn btn-danger btn-sm text-white me-auto">คลิกดูไฟล์</a>
                                            <h6>ผู้โพส: <span class="badge bg-secondary">{{ $job->user->name }}</span></h6>
                                        </div>
                                            <div class="d-flex justify-content-end">
                                                <p >{{ $job->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-3 d-flex justify-content-end"><a href="{{ route('jobAll') }}" type="button" class="btn btn-danger btn-sm text-white">ดูทั้งหมด</a></div>
                            @else
                            <div class="card text-center border border-1">
                                <div class="card-header">
                                    Notification
                                </div>
                                <div class="card-body">
                                  <p class="card-text">No information was found at this time.</p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-5 order-1 order-lg-2 text-center">
                            <img src="{{ asset('home/assets/img/features/features-4.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-3">
                    <div class="row">
                        <div class="col-lg-7 order-2 order-lg-1 mt-3 mt-lg-0">
                            @if ($purchases->isNotEmpty())
                                @foreach ($purchases as $purchase)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $purchase->name }}</h5>
                                            <p class="card-text">{{ Str::limit($purchase->description, 150) }}</p>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('purchaseShow', $purchase->slug) }}" class="btn btn-danger btn-sm text-white me-auto">คลิกดูไฟล์</a>
                                            <h6>ผู้โพส: <span class="badge bg-secondary">{{ $purchase->user->name }}</span></h6>
                                        </div>
                                            <div class="d-flex justify-content-end">
                                                <p >{{ $purchase->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-3 d-flex justify-content-end"><a href="{{ route('purchaseAll') }}" type="button" class="btn btn-danger btn-sm text-white">ดูทั้งหมด</a></div>
                            @else
                            <div class="card text-center border border-1">
                                <div class="card-header">
                                    Notification
                                </div>
                                <div class="card-body">
                                  <p class="card-text">No information was found at this time.</p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-5 order-1 order-lg-2 text-center">
                            <img src="{{ asset('home/assets/img/features/features-3.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-4">
                    <div class="row">
                        <div class="col-lg-7 order-2 order-lg-1 mt-3 mt-lg-0">
                            @if ($paymentSlips->isNotEmpty())
                                @foreach ($paymentSlips as $paymentSlip)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $paymentSlip->name }}</h5>
                                            <p class="card-text">{{ Str::limit($paymentSlip->description, 150) }}</p>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('paymentSlipShow', $paymentSlip->slug) }}" class="btn btn-danger btn-sm text-white me-auto">คลิกดูไฟล์</a>
                                            <h6>ผู้โพส: <span class="badge bg-secondary">{{ $paymentSlip->user->name }}</span></h6>
                                        </div>
                                            <div class="d-flex justify-content-end">
                                                <p >{{ $paymentSlip->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-3 d-flex justify-content-end"><a href="{{ route('paymentSlipAll') }}" type="button" class="btn btn-danger btn-sm text-white">ดูทั้งหมด</a></div>
                            @else
                            <div class="card text-center border border-1">
                                <div class="card-header">
                                    Notification
                                </div>
                                <div class="card-body">
                                  <p class="card-text">No information was found at this time.</p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-5 order-1 order-lg-2 text-center">
                            <img src="{{ asset('home/assets/img/features/features-1.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="tab-5">
                    <div class="row">
                        <div class="col-lg-7 order-2 order-lg-1 mt-3 mt-lg-0">
                            @if ($budgets->isNotEmpty())
                                @foreach ($budgets as $budget)
                                    <div class="card mb-2">
                                        <div class="card-body">
                                            <h5 class="card-title">{{ $budget->name }}</h5>
                                            <p class="card-text">{{ Str::limit($budget->description, 150) }}</p>
                                        <div class="d-flex align-items-center">
                                            <a href="{{ route('budgetShow', $budget->slug) }}" class="btn btn-danger btn-sm text-white me-auto">คลิกดูไฟล์</a>
                                            <h6>ผู้โพส: <span class="badge bg-secondary">{{ $budget->user->name }}</span></h6>
                                        </div>
                                            <div class="d-flex justify-content-end">
                                                <p >{{ $budget->created_at->format('d/m/Y') }}</p>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                                <div class="mt-3 d-flex justify-content-end"><a href="{{ route('budgetAll') }}" type="button" class="btn btn-danger btn-sm text-white">ดูทั้งหมด</a></div>
                            @else
                            <div class="card text-center border border-1">
                                <div class="card-header">
                                    Notification
                                </div>
                                <div class="card-body">
                                  <p class="card-text">No information was found at this time.</p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="col-lg-5 order-1 order-lg-2 text-center">
                            <img src="{{ asset('home/assets/img/features/features-6.png') }}" alt="" class="img-fluid">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section><!-- End Features Section -->

    <!-- ======= Gallery Section ======= -->
    <section id="gallery" class="gallery section-bg">
        <div class="container">

        <div class="section-title">
            <h2>Video & VTR</h2>
            <p>วีดีโอ สพป.เชียงใหม่ เขต 5</p>
        </div>
          <div class="row no-gutters" data-aos="fade-left">
            @if ($videos->isNotEmpty())
                @foreach ($videos as $video)
                <div class="col-lg-3 col-md-4 mb-4">
                    <div class="gallery-item" data-aos="zoom-in" data-aos-delay="100">
                    <a href="{{ route('videoShow',$video->slug) }}">
                        <div class="img-span">
                            <img src="{{ asset('storage/video_photos/' .$video->filename) }}" alt="" class="img-fluid">
                            <h4><span class="badge bg-danger">VIDEO SPECIAL</span></h4>
                        </div>
                    </a>
                    </div>
                </div>
                @endforeach
                <div class="mt-3" align="center"><a href="{{ route('videoAll') }}" type="button" class="btn btn-danger text-white">ดูทั้งหมด</a></div>
            @else
                <div class="card text-center border border-1" style="--bs-gutter-x: 0rem;">
                    <div class="card-header">
                        Notification
                    </div>
                    <div class="card-body">
                    <p class="card-text">No information was found at this time.</p>
                    </div>
                </div>
            @endif

          </div>

        </div>
      </section><!-- End Gallery Section -->

    <!-- ======= Features Section ======= -->

    <!-- ======= Testimonials Section School ======= -->
    <section id="testimonials" class="testimonials">
        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <h2>Activety</h2>
                <p>กิจกรรม โรงเรียนในสังกัด</p>
            </div>

            <div class="testimonials-slider swiper-container" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper">
                    @if ($blogschools->isNotEmpty())
                        @foreach ($blogschools as $blogschool)
                            <a href="{{ route('blogschoolShow', $blogschool->slug) }}">
                                <div class="swiper-slide">
                                    <div class="d-flex align-items-stretch">
                                        <div class="card">
                                            <img src="@if($blogschool->blogSchoolPhotos->isNotEmpty()) {{ asset('storage/blogschool_photos/'. $blogschool->blogSchoolPhotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" class="card-img-top" alt="...">
                                            <h4><span class="badge bg-danger">กิจกรรมเชียงใหม่ เขต 5</span></h4>
                                            <div class="card-icon">
                                                <i class="bx bx-book-reader"></i>
                                            </div>
                                            <div class="card-body">
                                                <h5 class="card-title"><a >{{ Str::limit($blogschool->title, 150) }}</a></h5>
                                                <p class="card-text">{{ Str::limit($blogschool->description, 200) }}</p>
                                                <div class="d-flex">
                                                    <small class="text-muted me-auto">{{ $blogschool->created_at->format('d/m/Y') }}</small>
                                                    <h6>ผู้โพส : <span class="badge bg-secondary">{{ $blogschool->user->name }}</span></h6>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- End testimonial item -->
                            </a>
                        @endforeach
                    @else
                        <div class="swiper-slide">
                            <div class="d-flex align-items-stretch">
                                <div class="card">
                                    <img src="{{ config('app.placeholder').'1024x768.png' }}" class="card-img-top" alt="...">
                                    <h4><span class="badge bg-danger">ยังไม่มีข้อมูล</span></h4>
                                    <div class="card-icon">
                                        <i class="bx bx-book-reader"></i>
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a >ยังไม่มีข้อมูล</a></h5>
                                        <p class="card-text">ยังไม่มีข้อมูล</p>
                                        <div class="d-flex">
                                            <small class="text-muted me-auto">ยังไม่มีข้อมูล</small>
                                            <h6>ผู้โพส : <span class="badge bg-secondary">ยังไม่มีข้อมูล</span></h6>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End testimonial item -->
                    @endif
                </div>
                <div class="swiper-pagination"></div>
                @if ($blogschools->isNotEmpty())
                    <div class="mt-3" align="center"><a href="{{ route('blogschoolAll') }}" type="button" class="btn btn-danger text-white">ดูทั้งหมด</a></div>
                @endif
            </div>

        </div>
    </section><!-- End Testimonials Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

          <div class="section-title">
            <h2>Notice Schools</h2>
            <p>ประชาสัมพันธ์โรงเรียน</p>
          </div>

          <div class="row" data-aos="fade-up" data-aos-delay="200">
              @if ($noticeSchools->isNotEmpty())
                    @foreach ($noticeSchools as $noticeSchool)
                    <div class="col-md-6">
                        <a href="{{ route('noticeSchoolShow',$noticeSchool->slug ) }}">
                            <div class="icon-box h-100">
                                <i class="bi bi-megaphone"></i>
                                <h4>{{ $noticeSchool->name }}</h4>
                                <p>{{ Str::limit($noticeSchool->description, 150) }}</p>
                                <div class="d-flex wrap-author">
                                    <h6 class="text-muted me-auto">{{ $noticeSchool->created_at->format('d/m/Y') }}</h6>
                                    <h6>ผู้โพส : <span class="badge bg-secondary">{{ $noticeSchool->user->name }}</span></h6>
                                </div>
                              </div>
                        </a>
                    </div>
                    @endforeach
                    <div class="mt-5 d-flex justify-content-center"><a href="{{ route('noticeSchoolAll') }}" type="button" class="btn btn-danger btn-sm text-white">ดูทั้งหมด</a></div>
              @else
                <div class="card text-center border border-1" style="--bs-gutter-x: 0rem;">
                    <div class="card-header">
                        Notification
                    </div>
                    <div class="card-body">
                    <p class="card-text">No information was found at this time.</p>
                    </div>
                </div>
              @endif


          </div>

        </div>
    </section><!-- End Services Section -->

    <section id="service-system-link" class="service-system-link">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>E - Services</h2>
                <p>ระบบภายในสำนักงาน</p>
            </div>
            <div class="row" data-aos="zoom-in" data-aos-delay="100">
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-store-line" style="color: #ffbb2c;"></i>
                        <h3><a href="http://1.179.155.140/amsspp/" target="_blank">รับ-ส่งหนังสือราชการ</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                        <h3><a href="http://www.chiangmaiarea5.go.th/salary/" target="_blank">สลิปเงินเดือนออนไลน์</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                        <h3><a href="https://bobec.bopp-obec.info/" target="_blank">ข้อมูลสิ่งก่อสร้าง</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-paint-brush-line" style="color: #e361ff;"></i>
                        <h3><a href="https://e-budget.jobobec.in.th/" target="_blank">ผลการบริหารงบประมาณรายจ่ายประจำปี</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-database-2-line" style="color: #47aeff;"></i>
                        <h3><a href="https://data.bopp-obec.info/emis/" target="_blank">EMIS Online</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-gradienter-line" style="color: #ffa76e;"></i>
                        <h3><a href="https://smart.obec.go.th/" target="_blank">Smart OBEC</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-disc-line" style="color: #b20969;"></i>
                        <h3><a href="{{ route('complaints.index') }}">ร้องเรียน-ร้องทุกข์</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-file-list-3-line" style="color: #11dbcf;"></i>
                        <h3><a href="{{ route('opinions.create') }}">รับฟังความคิดเห็น</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-price-tag-2-line" style="color: #4233ff;"></i>
                        <h3><a href="{{ route('questions.index') }}">Q&A</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-anchor-line" style="color: #b2904f;"></i>
                        <h3><a href="http://www.gprocurement.go.th/new_index.html" target="_blank">ระบบการจัดซื้อจัดจ้างภาครัฐ</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-base-station-line" style="color: #ff5828;"></i>
                        <h3><a href="https://cct.thaieduforall.org/" target="_blank">ปัจจัยพื้นฐานนักเรียนยากจน</a></h3>
                    </div>
                </div>
                {{-- <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-disc-line" style="color: #b20969;"></i>
                        <h3><a href="">Moton Ideal</a></h3>
                    </div>
                </div>
                <div class="col-lg-4 mt-4">
                    <div class="icon-box">
                        <i class="ri-fingerprint-line" style="color: #29cc61;"></i>
                        <h3><a href="">Flavor Nivelanda</a></h3>
                    </div>
                </div> --}}
            </div>

        </div>
    </section><!-- End Features Section -->

</main>
@endsection
@push('script')
@endpush
