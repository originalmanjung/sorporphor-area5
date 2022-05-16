@extends('layouts.frontend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/frontend/frontend-custom.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" integrity="sha512-+EoPw+Fiwh6eSeRK7zwIKG2MA8i3rV/DGa3tdttQGgWyatG/SkncT53KHQaS5Jh9MNOT3dmFL0FjTY08And/Cw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js" integrity="sha512-IsNh5E3eYy3tr/JiX2Yx4vsCujtkhwl7SLqgnwLNgf04Hrt9BT9SXlLlZlWx+OK4ndzAoALhsMNcCmkggjZB1w==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    /*------------------
        Background Set
    --------------------*/
    $('.set-bg').each(function() {
        var bg = $(this).data('setbg');
        $(this).css('background-image', 'url(' + bg + ')');
    });
    /*------------------------
    		Video Slider
        ----------------------- */
    $(".video-slider").owlCarousel({
        items: 4
        , dots: false
        , autoplay: true
        , margin: 0
        , loop: true
        , smartSpeed: 1200
        , nav: true
        , navText: ['<i class="fa fa-angle-left"></i>', '<i class="fa fa-angle-right"></i>']
        , responsive: {
            0: {
                items: 1
            , }
            , 480: {
                items: 2
            , }
            , 768: {
                items: 3
            , }
            , 992: {
                items: 4
            , }
        , }
    });

    /*------------------
        Magnific Popup
    --------------------*/
    $('.video-popup').magnificPopup({
        type: 'iframe'
    });


    var carousel = function() {
		$('.carousel-testimony').owlCarousel({
			center: true,
			loop: true,
            autoplay: true,
			items:1,
			margin: 30,
			stagePadding: 0,
            nav: false,
            dots: true,
			navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">'],
			responsive:{
				0:{
					items: 1
				},
				600:{
					items: 2
				},
				1000:{
					items: 3
				}
			}
		});

	};
	carousel();
</script>
@endpush
@section('content')

<div class="slide-one-item home-slider owl-carousel">
    @if ($bannercarousels->isNotEmpty())
        @foreach ($bannercarousels as $carousel)
        <div class="site-blocks-cover inner-page overlay" style="background-image: url({{ asset('storage/banner_files/'. $carousel->file) }})" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" data-aos="fade">
                        <h1 class="font-secondary font-weight-bold text-uppercase">{{ $carousel->name ?? ''}}</h1>
                        <span class="caption d-block text-white">{{ $carousel->description ?? '' }}</span>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    @else
        <div class="site-blocks-cover inner-page overlay" style="background-image: url({{ config('app.placeholder').'1920x1128.png' }})" data-aos="fade" data-stellar-background-ratio="0.5">
            <div class="container">
                <div class="row align-items-center justify-content-center">
                    <div class="col-md-7 text-center" data-aos="fade">
                        <h1 class="font-secondary font-weight-bold text-uppercase">ยังไม่มีข้อมูลหัวข้อเรื่อง</h1>
                        <span class="caption d-block text-white">ยังไม่มีข้อมูลคอนเทนต์</span>
                    </div>
                </div>
            </div>
        </div>
    @endif

</div>

<!-- กลุ่มผู้บริหาร สพป. -->
<section class="ftco-section">
    <div class="container">
        <div class="row" style="margin-top:130px;">
            <div class="col-md-12 text-center mb-5">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">WELCOME</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">คณะผู้บริหาร สพป.เชียงใหม่ เขต 5</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="carousel-testimony owl-carousel mb-5">
                    @if($personals->isNotEmpty())
                        @foreach ($personals as $personal)
                            <div class="item">
                                <div class="speaker">
                                    <img src="@if(!empty($personal->avatar)) {{ asset('storage/personal_avatars/'. $personal->avatar) }}  @else {{ config('app.placeholder').'800x852.png' }}@endif" class="img-fluid" alt="Colorlib HTML5 Template">
                                    <div class="text text-center py-3">
                                        <h3>{{ $personal->name ?? '' }}</h3>
                                        <span class="position">{{ $personal->position_general ?? '' }}</span>
                                        <ul class="ftco-social mt-3">
                                            <li class="ftco-animate"><a href="{{ $personal->twitter ?? '' }}"><span class="icon-twitter"></span></a></li>
                                            <li class="ftco-animate"><a href="{{ $personal->facebook ?? '' }}"><span class="icon-facebook"></span></a></li>
                                            <li class="ftco-animate"><a href="{{ $personal->instagram ?? '' }}"><span class="icon-instagram"></span></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else

                    @endif
                    {{-- <div class="item">
                        <div class="speaker">
                            <img src="{{ asset('images/teams/speaker-1.jpg') }}" class="img-fluid" alt="Colorlib HTML5 Template">
                            <div class="text text-center py-3">
                                <h3>John Adams</h3>
                                <span class="position">Web Developer</span>
                                <ul class="ftco-social mt-3">
                                    <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div> --}}

                </div>
            </div>
        </div>
    </div>
</section>
<!-- สิ้นสุด กลุ่มผู้บริหาร สพป. -->

<!-- กิจกรรม สพป. -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">ACTIVETY</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">กิจกรรมสพป.เชียงใหม่ เขต 5</h2>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">

                    @if ($news->isNotEmpty())
                        @foreach ($news as $newsItem)
                        <div class="media-image card w-100 h-100  border-0">
                            <a class="wrap-card-img" href="{{ route('newsShow', $newsItem->slug) }}"><img src="@if($newsItem->newsphotos->isNotEmpty()) {{ asset('storage/news_photos/'. $newsItem->newsphotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="Image" class="img-fluid"></a>
                            <div class="media-image-body card-body">
                              <h2 class="card-title">{{ Str::limit($newsItem->title, 65) ?? '' }}</h2>
                              <p class="card-text">{{ Str::limit($newsItem->description, 120) ?? '' }}</p>
                            </div>
                            <div class="p-4 mb-3">
                                <a href="{{ route('newsShow', $newsItem->slug) }}" class="btn btn-primary text-white px-4"><span >อ่านเพิ่มเติม</span></a>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="media-image card w-100 h-100  border-0">
                            <img src="{{ config('app.placeholder').'1024x768.png' }}" alt="Image" class="img-fluid">
                            <div class="media-image-body card-body">
                                <h5 class="card-title">ไม่พบข้อมูล</h5>
                                <p class="card-text">ไม่พบข้อมูล</p>
                                <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">อ่านเพิ่มเติม</span></a></p>
                            </div>
                        </div>
                    @endif

                </div>
                @if ($news->isNotEmpty())
                <p class="mt-5" align="center"><a href="{{ route('newsAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด กิจกรรม สพป. -->

<!-- Video Section Begin -->
<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center mb-5">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">VIDEO &amp; VTR</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">วีดีโอ สพป.เชียงใหม่ เขต 5</h2>
            </div>
        </div>
        <div class="row">
            <div class="video-slider owl-carousel">


                @if ($videos->isNotEmpty())
                    @foreach ($videos as $video)
                    <div class="col-lg-3">
                        <div class="video-item set-bg" data-setbg="{{ asset('storage/video_photos/' .$video->filename) }}">
                            <div class="vi-title">
                                <h5>A World Of Infinite Opportunities</h5>
                            </div>
                            <a href="{{ $video->url }}" class="play-btn video-popup"><img src="{{ asset('images/videos/play.png') }}" alt=""></a>
                            <div class="vi-time">{{ $video->user->name }}</div>
                        </div>
                    </div>
                    @endforeach
                @else
                <div class="col-lg-3">
                        <div class="video-item set-bg" data-setbg="{{ config('app.placeholder').'200x200.png' }}">
                            <div class="vi-title">
                                <h5>Title not fund.</h5>
                            </div>
                            <a href="" class="play-btn video-popup"><img src="{{ asset('images/videos/play.png') }}" alt=""></a>
                            <div class="vi-time">author not fund</div>
                        </div>
                    </div>
                @endif

            </div>


            @if ($videos->isNotEmpty())
            <p class="mt-5 mx-auto" align="center"><a href="{{ route('newsAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
            @endif
        </div>
    </div>
</section>
<!-- Video Section End -->

<!-- กิจกรรม โรงเรียน. -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">ACTIVETY</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">กิจกรรม โรงเรียนในสังกัด</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">
                    @if ($blogschools->isNotEmpty())
                        @foreach ($blogschools as $blogschool)
                        <div class="media-image card w-100 h-100  border-0">
                            <a class="wrap-card-img" href="{{ route('blogschoolShow', $blogschool->slug) }}"><img src="@if($blogschool->blogSchoolPhotos->isNotEmpty()) {{ asset('storage/blogschool_photos/'. $blogschool->blogSchoolPhotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="Image" class="img-fluid"></a>
                            <div class="media-image-body card-body">
                              <h2 class="card-title">{{ Str::limit($blogschool->title, 65) ?? '' }}</h2>
                              <p class="card-text">{{ Str::limit($blogschool->description, 120) ?? '' }}</p>
                            </div>
                            <div class="p-4 mb-3">
                                <a href="{{ route('blogschoolShow', $blogschool->slug) }}" class="btn btn-primary text-white px-4"><span >อ่านเพิ่มเติม</span></a>
                            </div>
                        </div>
                    @endforeach
                    @else
                        <div class="media-image card w-100 h-100  border-0">
                            <img src="{{ config('app.placeholder').'1024x768.png' }}" alt="Image" class="img-fluid">
                            <div class="media-image-body card-body">
                                <h5 class="card-title">ไม่พบข้อมูล</h5>
                                <p class="card-text">ไม่พบข้อมูล</p>
                                <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">อ่านเพิ่มเติม</span></a></p>
                            </div>
                        </div>
                    @endif
                </div>
                @if ($blogschools->isNotEmpty())
                <p class="mt-5" align="center"><a href="{{ route('blogschoolAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด กิจกรรม โรงเรียน. -->

<!-- ITA -->
<div class="faqs">
    <div class="container">
        <div class="section-header text-center mb-5 mt-5">
            <span class="caption d-block mb-2 font-secondary font-weight-bold">PUBLIC DISCLOSURE OF INFORMATION</span>
            <h2 class="site-section-heading text-uppercase text-center font-secondary">การเปิดเผยข้อมูลสาธารณะ</h2>
        </div>
        <div class="row mb-5">
            <div class="col-md-6">
                <div id="accordion-1">
                    <div class="card wow fadeInRight" data-wow-delay="0.1s">
                        @foreach ($intergrities->slice(0, 7) as $key => $intergrity)
                            <div class="card-header">
                                <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{ $key }}">
                                    {{ $intergrity->name }}
                                </a>
                            </div>
                            <div id="collapse{{ $key }}" class="collapse" data-parent="#accordion-2">
                                <div class="card-body">
                                    @if($intergrity->children->count() > 0)
                                        @foreach($intergrity->children as $child)
                                            <ul style="list-style-type: square;">
                                                <li style="margin-bottom: 0px; padding: 0px; background: transparent; border-radius: 4px;"><a class="text-primary" @if(!empty($child->url))href="{{ $child->url}}"@endif target="_blank">{{ $child->name }} @if(!empty($child->file)) <i class="fas fa-file-pdf"></i> @endif @if(!empty($child->url)) <i class="fas fa-angle-double-left"></i> @endif</a></li>
                                            </ul>
                                            @foreach($child->children as $subchild)
                                                <ul style="list-style-type: circle;">
                                                    <li style="margin-bottom: 0px; padding: 0px; background: transparent; border-radius: 4px; margin-left:25px;"><a class="text-dark" @if(!empty($subchild->url))href="{{ $subchild->url}}"@endif @if(!empty($subchild->file))href="{{ route('showPDF',$subchild->id) }}"@endif target="_blank">{{ $subchild->name }} @if(!empty($subchild->file)) <i class="fas fa-file-pdf"></i> @endif @if(!empty($subchild->url)) <i class="fas fa-angle-double-left"></i> @endif</a></li>

                                                </ul>
                                            @endforeach

                                        @endforeach
                                        @else
                                            <strong class="text-center">ไม่พบข้อมูล</strong>
                                        @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div id="accordion-2">
                    <div class="card wow fadeInRight" data-wow-delay="0.1s">
                        @foreach ($intergrities->slice(7, 10) as $key => $intergrity)
                            <div class="card-header">
                                <a class="card-link collapsed" data-toggle="collapse" href="#collapse{{ $key }}">
                                    {{ $intergrity->name }}
                                </a>
                            </div>
                            <div id="collapse{{ $key }}" class="collapse" data-parent="#accordion-2">
                                <div class="card-body">
                                    @if($intergrity->children->count() > 0)
                                        @foreach($intergrity->children as $child)
                                            <ul style="list-style-type: square;">
                                                <li style="margin-bottom: 0px; padding: 0px; background: transparent; border-radius: 4px;"><a class="text-primary" @if(!empty($child->url))href="{{ $child->url}}"@endif target="_blank">{{ $child->name }} @if(!empty($child->file)) <i class="fas fa-file-pdf"></i> @endif @if(!empty($child->url)) <i class="fas fa-angle-double-left"></i> @endif</a></li>
                                            </ul>
                                            @foreach($child->children as $subchild)
                                                <ul style="list-style-type: circle;">
                                                    <li style="margin-bottom: 0px; padding: 0px; background: transparent; border-radius: 4px; margin-left:25px;"><a class="text-dark" @if(!empty($subchild->url))href="{{ $subchild->url}}"@endif @if(!empty($subchild->file))href="{{ route('showPDF',$subchild->id) }}"@endif target="_blank">{{ $subchild->name }} @if(!empty($subchild->file)) <i class="fas fa-file-pdf"></i> @endif @if(!empty($subchild->url)) <i class="fas fa-angle-double-left"></i> @endif</a></li>
                                                </ul>
                                            @endforeach

                                        @endforeach
                                        @else
                                            <strong class="text-center">ไม่พบข้อมูล</strong>
                                        @endif
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด ITA -->

<!-- ประชาสัมพันธ์ รับสมัครงาน จัดซื้อ-จัดจ้าง แจ้งโอนเงิน -->
<section class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">NOTICE</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">ประชาสัมพันธ์ ข้อมูล ข่าวสาร</h2>
            </div>
        </div>
        <div class="row tabulation mt-4 ftco-animate">
            <div class="col-md-4">
                <ul class="nav nav-pills nav-fill d-md-flex d-block flex-column">
                    <li class="nav-item text-left">
                        <a class="nav-link active py-4" data-toggle="tab" href="#services-1">ประชาสัมพันธ์</a>
                    </li>
                    <li class="nav-item text-left">
                        <a class="nav-link py-4" data-toggle="tab" href="#services-2">รับสมัครงาน</a>
                    </li>
                    <li class="nav-item text-left">
                        <a class="nav-link py-4" data-toggle="tab" href="#services-3">จัดซื้อ-จัดจ้าง</a>
                    </li>
                    <li class="nav-item text-left">
                        <a class="nav-link py-4" data-toggle="tab" href="#services-4">แจ้งการโอนเงิน</a>
                    </li>
                    <li class="nav-item text-left">
                        <a class="nav-link py-4" data-toggle="tab" href="#services-5">งบทดลอง</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content">

                    <!-- ประชาสัมพันธ์-->
                    @if ($notices->isNotEmpty())
                        @foreach ($notices as $notice)
                            <div class="tab-pane container active" id="services-1">
                                <div class="card p-4">
                                    <span class="time">{{ $notice->created_at->format('d/m/Y') }}</span>
                                    <h3><a href="{{ route('noticeShow', $notice->slug) }}">{{ Str::limit($notice->name, 80) }}</a></h3>
                                    <p>{{ Str::limit($notice->description, 150) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $notice->user->name }}</span></h6>
                                        </div>
                                        <div><a style="color:#fd7e14;" href="#">Download</a></div>
                                    </div>
                                </div>

                                @if ($notices->isNotEmpty())
                                    <p class="mt-5" align="center"><a href="{{ route('noticeAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="tab-pane container fade" id="services-1">
                            <div class="card p-4">
                                <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                            </div>
                        </div>
                    @endif

                    <!-- รับสมัครงาน-->
                    @if ($jobs->isNotEmpty())
                        @foreach ($jobs as $job)
                            <div class="tab-pane container fade" id="services-2">
                                <div class="card p-4">
                                    <span class="time">{{ $job->created_at->format('d/m/Y') }}</span>
                                    <h3><a href="{{ route('jobShow', $job->slug) }}">{{ Str::limit($job->name, 80) }}</a></h3>
                                    <p>{{ Str::limit($job->description, 150) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $job->user->name }}</span></h6>
                                        </div>
                                        <div><a style="color:#fd7e14;" href="#">Download</a></div>
                                    </div>
                                </div>

                                @if ($jobs->isNotEmpty())
                                    <p class="mt-5" align="center"><a href="{{ route('jobAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="tab-pane container fade" id="services-2">
                            <div class="card p-4">
                                <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                            </div>
                        </div>
                    @endif


                    <!-- จัดซื้อ-จัดจ้าง-->

                    @if ($purchases->isNotEmpty())
                        @foreach ($purchases as $purchase)
                            <div class="tab-pane container" id="services-3">
                                <div class="card p-4">
                                    <span class="time">{{ $purchase->created_at->format('d/m/Y') }}</span>
                                    <h3><a href="{{ route('purchaseShow', $purchase->slug) }}">{{ Str::limit($purchase->name, 80) }}</a></h3>
                                    <p>{{ Str::limit($purchase->description, 150) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $purchase->user->name }}</span></h6>
                                        </div>
                                        <div><a style="color:#fd7e14;" href="#">Download</a></div>
                                    </div>
                                </div>

                                @if ($purchases->isNotEmpty())
                                    <p class="mt-5" align="center"><a href="{{ route('purchaseAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                                @endif
                            </div>
                        @endforeach
                    @else
                    <div class="tab-pane container fade" id="services-3">
                        <div class="card p-4">
                            <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                        </div>
                    </div>
                    @endif

                    <!-- แจ้งการโอนเงิน-->
                    @if ($paymentSlips->isNotEmpty())
                        @foreach ($paymentSlips as $paymentSlip)
                            <div class="tab-pane container active" id="services-4">
                                <div class="card p-4">
                                    <span class="time">{{ $paymentSlip->created_at->format('d/m/Y') }}</span>
                                    <h3><a href="{{ route('paymentSlipShow', $paymentSlip->slug) }}">{{ Str::limit($paymentSlip->name, 80) }}</a></h3>
                                    <p>{{ Str::limit($paymentSlip->description, 150) }}</p>
                                    <div class="d-flex justify-content-between">
                                        <div class="">
                                            <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $paymentSlip->user->name }}</span></h6>
                                        </div>
                                        <div><a style="color:#fd7e14;" href="#">Download</a></div>
                                    </div>
                                </div>

                                @if ($paymentSlips->isNotEmpty())
                                    <p class="mt-5" align="center"><a href="{{ route('paymentSlipAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                                @endif
                            </div>
                        @endforeach
                    @else
                        <div class="tab-pane container fade" id="services-4">
                            <div class="card p-4">
                                <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                            </div>
                        </div>
                    @endif
                     <!-- งบทดลอง-->
                     @if ($budgets->isNotEmpty())
                     @foreach ($budgets as $budget)
                         <div class="tab-pane container active" id="services-5">
                             <div class="card p-4">
                                 <span class="time">{{ $budget->created_at->format('d/m/Y') }}</span>
                                 <h3><a href="{{ route('budgetShow', $budget->slug) }}">{{ Str::limit($budget->name, 80) }}</a></h3>
                                 <p>{{ Str::limit($budget->description, 150) }}</p>
                                 <div class="d-flex justify-content-between">
                                     <div class="">
                                         <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $budget->user->name }}</span></h6>
                                     </div>
                                     <div><a style="color:#fd7e14;" href="#">Download</a></div>
                                 </div>
                             </div>

                             @if ($budgets->isNotEmpty())
                                 <p class="mt-5" align="center"><a href="{{ route('budgetAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                             @endif
                         </div>
                     @endforeach
                 @else
                     <div class="tab-pane container fade" id="services-5">
                         <div class="card p-4">
                             <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                         </div>
                     </div>
                 @endif
                </div>

            </div>
        </div>
    </div>
</section>
<!-- สิ้นสุด ประชาสัมพันธ์ รับสมัครงาน จัดซื้อ-จัดจ้าง แจ้งโอนเงิน -->

<!-- ประชาสัมพันธ์โรงเรียน-->
<div class="site-section" style="background-image: url('{{ asset('funder-template/images/topography.png') }}'); background-attachment: fixed">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">NOTICE SCHOOLS</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">ประชาสัมพันธ์โรงเรียน</h2>
            </div>
        </div>
        <div class="row">

            @if ($noticeSchools->isNotEmpty())
                @foreach ($noticeSchools as $noticeSchool)
                    <a href="{{ route('noticeSchoolShow',$noticeSchool->slug ) }}" class="col-lg-6 mb-4">
                        <div class="testimonial bg-white h-100">
                            <h5 class="card-title">{{ Str::limit($noticeSchool->name, 70) }}</h5>
                            <blockquote class="mb-3">
                                <p>&ldquo;{{ Str::limit($noticeSchool->description, 150) }}&rdquo;</p>
                            </blockquote>
                            <div class="d-flex align-items-center vcard">
                                <figure class="mb-0 mr-3">
                                    <img src="@if(!empty($noticeSchool->user->avatar)) {{ asset('storage/user_avatars/'. $noticeSchool->user->avatar) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="Image" class="img-fluid ounded-circle">

                                </figure>
                                <div class="vcard-text">
                                    <span class="d-block">{{ $noticeSchool->user->name }}</span>
                                    <span class="position">{{ $noticeSchool->user->role->name }}</span>
                                </div>
                            </div>
                        </div>
                    </a>
                @endforeach
            @else
                <div class="mx-auto">
                    <div class="card-body">
                        <h3 class="card-title text-muted">ไม่พบข้อมูล</h3>
                    </div>
                </div>
            @endif

            @if ($noticeSchools->isNotEmpty() && $noticeSchools->count() > 4)
                <div class="col-12 mx-auto">
                    <p class="mt-5" align="center"><a href="{{ route('noticeSchoolAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                </div>
            @endif

        </div>
    </div>
</div>
<!-- สิ้นสุดประชาสัมพันธ์โรงเรียน-->


<!-- service_area_start -->
<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">E-SERVICES</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">ระบบภายในสำนักงาน</h2>
            </div>
        </div>
        <div class="row no-gutters">
            <div class="col-lg-4 d-flex">

                <a href="#" class="services-2 noborder-left text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"><i class="fas fa-keyboard"></i></span></div>
                    <div class="text media-body">
                        <h3>ช่องทางแจ้งเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ</h3>
                    </div>
                </a>
            </div>
            <a href="#" class="col-lg-4 d-flex">
                <div class="services-2 text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"><i class="fas fa-book"></i></span></div>
                    <div class="text media-body">
                        <h3>คู่มือ/มาตรฐานการปฏิบัติงานของกลุ่ม/หน่วย/บุคลากร</h3>
                    </div>
                </div>
            </a>
            <a href="#" class="col-lg-4 d-flex">
                <div class="services-2 text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-insurance"><i class="fas fa-atlas"></i></span></div>
                    <div class="text media-body">
                        <h3>คู่มือ/มาตรฐานการให้บริการสถิติการให้บริการ</h3>
                    </div>
                </div>
            </a>
            <a href="#" class="col-lg-4 d-flex">
                <div class="services-2 noborder-left noborder-bottom text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-money"><i class="fas fa-chart-line"></i></span></div>
                    <div class="text media-body">
                        <h3>การบริหารงานตามแผนงานและการรายงานผล</h3>
                    </div>
                </div>
            </a>
            <a href="#" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-bottom ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-rating"><i class="fas fa-coins"></i></span></div>
                    <div class="text media-body">
                        <h3>การบริหารเงินงบประมาณ &amp; การรายงานผล</h3>
                    </div>
                </div>
            </a>
            <a href="#" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-bottom ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-search-engine"><i class="fas fa-cubes"></i></span></div>
                    <div class="text media-body">
                        <h3>การจัดซื้อจัดจ้าง&amp;จัดหาพัสดุและรายงานผล</h3>
                    </div>
                </div>
            </a>
            <a href="#" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-bottom ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-search-engine"><i class="fas fa-users"></i></span></div>
                    <div class="text media-body">
                        <h3>การบริหารและพัฒนาทรัพยากรบุคคลและการรายงานผล</h3>
                    </div>
                </div>
            </a>
            <a href="#" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-bottom ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-search-engine"><i class="fas fa-handshake"></i></span></div>
                    <div class="text media-body">
                        <h3>เปิดโอกาศการมีส่วนร่วมในการขับเคลื่อนองค์กร</h3>
                    </div>
                </div>
            </a>
            <a href="#" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-bottom ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-search-engine"><i class="fas fa-fist-raised"></i></span></div>
                    <div class="text media-body">
                        <h3>ประกาศเจตจำนงสุจริตในการบริหาร</h3>
                    </div>
                </div>
            </a>
        </div>
    </div>
</section>
<!-- service_area_end -->


<div class="py-5 bg-primary">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <h2 class="text-uppercase text-white mb-0">Small Business Insurance Company</h2>
            </div>
            <div class="col-md-3 ml-auto text-center text-md-left">
                <a href="#" class="btn btn-bg-primary d-inline-block d-md-block font-secondary text-uppercase">Contact Us</a>
            </div>
        </div>
    </div>
</div>

@endsection
