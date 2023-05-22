@extends('layouts.frontend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/frontend/frontend-custom.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
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
            center: true
            , loop: true
            , autoplay: true
            , items: 1
            , margin: 30
            , stagePadding: 0
            , nav: false
            , dots: true
            , navText: ['<span class="ion-ios-arrow-back">', '<span class="ion-ios-arrow-forward">']
            , responsive: {
                0: {
                    items: 1
                }
                , 600: {
                    items: 2
                }
                , 1000: {
                    items: 3
                }
            }
        });

    };
    carousel();


    /*
    $("a").on('click', function(event) {
        if (this.hash !== "") {
        event.preventDefault();
        var hash = this.hash;

        $('html, body').animate({
            scrollTop: $(hash).offset().top
        }, 400, function(){
            window.location.hash = hash;
        });
        }
    });**/

    // Pop up
    $('.tm-gallery').magnificPopup({
        delegate: 'a',
        type: 'image',
        gallery: { enabled: true }
    });

    // Gallery
    $('.tm-gallery').slick({
        dots: true,
        autoplay: true,
        autoplaySpeed: 1000,
        infinite: true,
        slidesToShow: 5,
        slidesToScroll: 2,
        responsive: [
        {
        breakpoint: 1199,
        settings: {
            slidesToShow: 4,
            slidesToScroll: 2
        }
        },
        {
        breakpoint: 991,
        settings: {
            slidesToShow: 3,
            slidesToScroll: 2
        }
        },
        {
        breakpoint: 767,
        settings: {
            slidesToShow: 2,
            slidesToScroll: 1
        }
        },
        {
        breakpoint: 480,
        settings: {
            slidesToShow: 1,
            slidesToScroll: 1
        }
        }
    ]
    });
</script>
<script type='text/javascript'>
    $(document).ready(function(){
        $('#myModalPopup').modal('show');
    });
</script>
@endpush
@section('content')
<!-- แบนเนอร์ -->
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    @if ($bannercarousels->isNotEmpty())
        <ol class="carousel-indicators">
            @foreach ($bannercarousels as $key=>$carousel)
                <li data-target="#carouselExampleCaptions" data-slide-to="{{ $key }}" class=" @if($key == 0) active @endif"></li>
            @endforeach
        </ol>
        <div class="carousel-inner">
            @foreach ($bannercarousels as $key=>$carousel)
                <div class="carousel-item @if($key == 0) active @endif">
                    <a @isset($carousel->url) href="{{ $carousel->url }}" @endisset><img src="{{ asset('storage/banner_files/'. $carousel->file) }}" class="d-block w-100" alt="..."></a>
                </div>
            @endforeach
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    @else
       <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ config('app.placeholder').'1170x400.png' }}" class="d-block w-100" alt="...">
            </div>
        </div>
    @endif

</div>
{{-- <div class="slide-one-item home-slider owl-carousel">
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

</div> --}}

<!-- กลุ่มผู้บริหาร สพป. -->
<section class="ftco-section">
    <div class="container">
        <div class="row" style="margin-top:50px;">
            <div class="col-md-12 text-center mb-5">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">MANAGER TEAM</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">คณะผู้บริหาร สพป.เชียงใหม่ เขต 5</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ftco-animate">
                <div class="carousel-testimony owl-carousel">
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
                    <div class="item">
                        <div class="speaker">
                            <img src="{{ config('app.placeholder').'800x852.png' }}" class="img-fluid" alt="Colorlib HTML5 Template">
                            <div class="text text-center py-3">
                                <h3>ไม่พบข้อมูล</h3>
                                <span class="position">ไม่พบข้อมูล</span>
                                <ul class="ftco-social mt-3">
                                    <li class="ftco-animate"><a href=""><span class="icon-twitter"></span></a></li>
                                    <li class="ftco-animate"><a href=""><span class="icon-facebook"></span></a></li>
                                    <li class="ftco-animate"><a href=""><span class="icon-instagram"></span></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
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

                    @if ($newsGeneral->isNotEmpty())
                    @foreach ($newsGeneral as $newsItem)
                    <div class="media-image card w-100 h-100  border-0">
                        <a class="wrap-card-img" href="{{ route('newsShow', $newsItem->slug) }}"><img src="@if($newsItem->newsphotos->isNotEmpty()) {{ asset('storage/news_photos/'. $newsItem->newsphotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="Image" class="img-fluid"></a>
                        <div class="media-image-body card-body">
                            <h2 class="card-title">{{ Str::limit($newsItem->title, 65) ?? '' }}</h2>
                            <p class="card-text">{{ Str::limit($newsItem->description, 120) ?? '' }}</p>
                        </div>
                        <div class="p-4 mb-3">
                            <a href="{{ route('newsShow', $newsItem->slug) }}" class="btn btn-primary text-white px-4"><span>อ่านเพิ่มเติม</span></a>
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
                @if ($newsGeneral->isNotEmpty())
                <p class="mt-2" align="center"><a href="{{ route('newsGeneralAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด กิจกรรม สพป. -->


<!-- กิจกรรม กิจกรรมเขตพื้นที่สุจริต/การมีส่วนร่วมของผู้บริหาร -->
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">ACTIVETY</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">กิจกรรมเขตพื้นที่สุจริต/การมีส่วนร่วมของผู้บริหาร</h2>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">

                    @if ($newsHonest->isNotEmpty())
                    @foreach ($newsHonest as $newsItem)
                    <div class="media-image card w-100 h-100  border-0">
                        <a class="wrap-card-img" href="{{ route('newsShow', $newsItem->slug) }}"><img src="@if($newsItem->newsphotos->isNotEmpty()) {{ asset('storage/news_photos/'. $newsItem->newsphotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="Image" class="img-fluid"></a>
                        <div class="media-image-body card-body">
                            <h2 class="card-title">{{ Str::limit($newsItem->title, 65) ?? '' }}</h2>
                            <p class="card-text">{{ Str::limit($newsItem->description, 120) ?? '' }}</p>
                        </div>
                        <div class="p-4 mb-3">
                            <a href="{{ route('newsShow', $newsItem->slug) }}" class="btn btn-primary text-white px-4"><span>อ่านเพิ่มเติม</span></a>
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
                @if ($newsHonest->isNotEmpty())
                <p class="mt-2" align="center"><a href="{{ route('newsHonestAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด กิจกรรม กิจกรรมเขตพื้นที่สุจริต/การมีส่วนร่วมของผู้บริหาร -->


<!-- กิจกรรม กิจกรรมการเสริมสร้างวัฒนธรรมองค์กร -->
<div class="site-section bg-light">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">ACTIVETY</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">กิจกรรมการเสริมสร้างวัฒนธรรมองค์กร</h2>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">

                    @if ($newsCulture->isNotEmpty())
                    @foreach ($newsCulture as $newsItem)
                    <div class="media-image card w-100 h-100  border-0">
                        <a class="wrap-card-img" href="{{ route('newsShow', $newsItem->slug) }}"><img src="@if($newsItem->newsphotos->isNotEmpty()) {{ asset('storage/news_photos/'. $newsItem->newsphotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="Image" class="img-fluid"></a>
                        <div class="media-image-body card-body">
                            <h2 class="card-title">{{ Str::limit($newsItem->title, 65) ?? '' }}</h2>
                            <p class="card-text">{{ Str::limit($newsItem->description, 120) ?? '' }}</p>
                        </div>
                        <div class="p-4 mb-3">
                            <a href="{{ route('newsShow', $newsItem->slug) }}" class="btn btn-primary text-white px-4"><span>อ่านเพิ่มเติม</span></a>
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
                @if ($newsCulture->isNotEmpty())
                <p class="mt-2" align="center"><a href="{{ route('newsCultureAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด กิจกรรม กิจกรรมการเสริมสร้างวัฒนธรรมองค์กร -->


<!-- กิจกรรมการมีส่วนร่วมจากทุกภาคส่วน -->
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">ACTIVETY</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">กิจกรรมการมีส่วนร่วมจากทุกภาคส่วน</h2>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12 block-13 nav-direction-white">
                <div class="nonloop-block-13 owl-carousel">

                    @if ($newsnewsParticipation->isNotEmpty())
                    @foreach ($newsnewsParticipation as $newsItem)
                    <div class="media-image card w-100 h-100  border-0">
                        <a class="wrap-card-img" href="{{ route('newsShow', $newsItem->slug) }}"><img src="@if($newsItem->newsphotos->isNotEmpty()) {{ asset('storage/news_photos/'. $newsItem->newsphotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="Image" class="img-fluid"></a>
                        <div class="media-image-body card-body">
                            <h2 class="card-title">{{ Str::limit($newsItem->title, 65) ?? '' }}</h2>
                            <p class="card-text">{{ Str::limit($newsItem->description, 120) ?? '' }}</p>
                        </div>
                        <div class="p-4 mb-3">
                            <a href="{{ route('newsShow', $newsItem->slug) }}" class="btn btn-primary text-white px-4"><span>อ่านเพิ่มเติม</span></a>
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
                @if ($newsGeneral->isNotEmpty())
                <p class="mt-2" align="center"><a href="{{ route('newsParticipationAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif

            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด กิจกรรมการมีส่วนร่วมจากทุกภาคส่วน -->


<!-- ITA -->

<div class="faqs bg-light">
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
                                <ul class="@if($child->url || $child->file) underline-on-hover @endif" style="list-style-type: square;">
                                    <li style="margin-bottom: 0px; padding: 0px; background: transparent; border-radius: 4px;"><a class="text-success" @if(!empty($child->url)) href="{{ $child->url}}" @elseif(!empty($child->file))  href="{{ route('showPDF',$child->id)}}"@endif target="_blank">{{ $child->name }} </a></li>
                                </ul>
                                @foreach($child->children as $subchild)
                                <ul class="@if($child->url || $child->file) underline-on-hover @endif" style="list-style-type: circle;">
                                    <li style="margin-bottom: 0px; padding: 0px; background: transparent; border-radius: 4px; margin-left:25px;"><a class="text-black-50" @if(!empty($subchild->url)) href="{{ $subchild->url}}" @elseif(!empty($subchild->file))  href="{{ route('showPDF',$subchild->id)}}"@endif target="_blank">{{ $subchild->name }}</a></li>
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
                        <div id="collapse{{ $key }}" class="collapse" data-parent="#accordion-1">
                            <div class="card-body">
                                @if($intergrity->children->count() > 0)
                                @foreach($intergrity->children as $child)
                                 <ul class="@if($child->url || $child->file) underline-on-hover @endif" style="list-style-type: square;">
                                    <li style="margin-bottom: 0px; padding: 0px; background: transparent; border-radius: 4px;"><a class="text-success" @if(!empty($child->url)) href="{{ $child->url}}" @elseif(!empty($child->file))  href="{{ route('showPDF',$child->id)}}"@endif target="_blank">{{ $child->name }} </a></li>
                                </ul>
                                @foreach($child->children as $subchild)
                                <ul class="@if($child->url || $child->file) underline-on-hover @endif" style="list-style-type: circle;">
                                    <li style="margin-bottom: 0px; padding: 0px; background: transparent; border-radius: 4px; margin-left:25px;"><a class="text-black-50" @if(!empty($subchild->url)) href="{{ $subchild->url}}" @elseif(!empty($subchild->file))  href="{{ route('showPDF',$subchild->id)}}"@endif target="_blank">{{ $subchild->name }}</a></li>
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
<section class="site-section">
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
                    {{-- <li class="nav-item text-left">
                        <a class="nav-link py-4" data-toggle="tab" href="#services-4">แจ้งการโอนเงิน</a>
                    </li> --}}
                    <li class="nav-item text-left">
                        <a class="nav-link py-4" data-toggle="tab" href="#services-5">งบทดลอง</a>
                    </li>
                </ul>
            </div>
            <div class="col-md-8">
                <div class="tab-content">

                    <!-- ประชาสัมพันธ์-->
                    @if ($notices->isNotEmpty())

                    <div class="tab-pane container active" id="services-1">
                      @foreach ($notices as $notice)
                        <div class="card p-4 mb-4">
                            {{-- <span class="time">{{ $notice->created_at->format('d/m/Y') }}</span> --}}
                            <h5><a class="text-dark" href="{{ route('noticeShow', $notice->slug) }}">{{ Str::limit($notice->name, 80) }}</a></h5>
                            <p>{{ Str::limit($notice->description, 150) }}</p>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $notice->user->name }}</span></h6>
                                </div>
                                <div><a style="color:#fd7e14;" target="_blank" href="{{ route('noticeShow', $notice->slug) }}">ดูเพิ่มเติม</a></div>
                            </div>
                        </div>
                       @endforeach
                        @if ($notices->isNotEmpty())
                            <p class="mt-5" align="center"><a href="{{ route('noticeAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                        @endif
                    </div>


                    @else
                    <div class="tab-pane container active" id="services-1">
                        <div class="card p-4">
                            <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                        </div>
                    </div>
                    @endif

                    <!-- รับสมัครงาน-->
                    @if ($jobs->isNotEmpty())

                    <div class="tab-pane container fade" id="services-2">
                    @foreach ($jobs as $job)
                        <div class="card p-4 mb-4">
                            {{-- <span class="time">{{ $job->created_at->format('d/m/Y') }}</span> --}}
                            <h5><a class="text-dark" href="{{ route('jobShow', $job->slug) }}">{{ Str::limit($job->name, 80) }}</a></h5>
                            <p>{{ Str::limit($job->description, 150) }}</p>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $job->user->name }}</span></h6>
                                </div>
                                <div><a style="color:#fd7e14;" href="{{ route('jobShow', $job->slug) }}">ดูเพิ่มเติม</a></div>
                            </div>
                        </div>
                    @endforeach
                        @if ($jobs->isNotEmpty())
                            <p class="mt-5" align="center"><a href="{{ route('jobAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                        @endif
                    </div>

                    @else
                    <div class="tab-pane container fade" id="services-2">
                        <div class="card p-4">
                            <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                        </div>
                    </div>
                    @endif


                    <!-- จัดซื้อ-จัดจ้าง-->

                    @if ($purchases->isNotEmpty())

                    <div class="tab-pane container fade" id="services-3">
                         @foreach ($purchases as $purchase)
                        <div class="card p-4 mb-4">
                            {{-- <span class="time">{{ $purchase->created_at->format('d/m/Y') }}</span> --}}
                            <h5><a class="text-dark" href="{{ route('purchaseShow', $purchase->slug) }}">{{ Str::limit($purchase->name, 80) }}</a></h5>
                            <p>{{ Str::limit($purchase->description, 150) }}</p>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $purchase->user->name }}</span></h6>
                                </div>
                                <div><a style="color:#fd7e14;" href="{{ route('purchaseShow', $purchase->slug) }}">ดูเพิ่มเติม</a></div>
                            </div>
                        </div>
                        @endforeach
                        @if ($purchases->isNotEmpty())
                        <p class="mt-5" align="center"><a href="{{ route('purchaseAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                        @endif
                    </div>

                    @else
                    <div class="tab-pane container fade" id="services-3">
                        <div class="card p-4">
                            <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                        </div>
                    </div>
                    @endif

                    <!-- แจ้งการโอนเงิน-->
                    {{-- @if ($paymentSlips->isNotEmpty())
                        <div class="tab-pane container fade" id="services-4">
                        @foreach ($paymentSlips as $paymentSlip)
                            <div class="card p-4 mb-4">
                                <h5><a class="text-dark" href="{{ route('paymentSlipShow', $paymentSlip->slug) }}">{{ Str::limit($paymentSlip->name, 80) }}</a></h5>
                                <p>{{ Str::limit($paymentSlip->description, 150) }}</p>
                                <div class="d-flex justify-content-between">
                                    <div class="">
                                        <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $paymentSlip->user->name }}</span></h6>
                                    </div>
                                    <div><a style="color:#fd7e14;" href="{{ route('paymentSlipShow', $paymentSlip->slug) }}">ดูเพิ่มเติม</a></div>
                                </div>
                            </div>
                        @endforeach
                            @if ($paymentSlips->isNotEmpty())
                            <p class="mt-5" align="center"><a href="{{ route('paymentSlipAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                            @endif
                        </div>

                    @else
                        <div class="tab-pane container fade" id="services-4">
                            <div class="card p-4">
                                <h3 class="text-center"><a href="#">ไม่พบข้อมูล</a></h3>
                            </div>
                        </div>
                    @endif --}}
                    <!-- งบทดลอง-->
                    @if ($budgets->isNotEmpty())

                    <div class="tab-pane container fade" id="services-5">
                    @foreach ($budgets as $budget)
                        <div class="card p-4 mb-4">
                            {{-- <span class="time">{{ $budget->created_at->format('d/m/Y') }}</span> --}}
                            <h5><a class="text-dark" href="{{ route('budgetShow', $budget->slug) }}">{{ Str::limit($budget->name, 80) }}</a></h5>
                            <p>{{ Str::limit($budget->description, 150) }}</p>
                            <div class="d-flex justify-content-between">
                                <div class="">
                                    <h6 class="speaker-name">&mdash; <span style="color:#fd7e14;" href="#">Author:</span> <span class="position">{{ $budget->user->name }}</span></h6>
                                </div>
                                <div><a style="color:#fd7e14;" href="{{ route('budgetShow', $budget->slug) }}">ดูเพิ่มเติม</a></div>
                            </div>
                        </div>
                    @endforeach
                        @if ($budgets->isNotEmpty())
                        <p class="mt-5" align="center"><a href="{{ route('budgetAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                        @endif
                    </div>

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

<div class="py-5 bg-primary">
    <div class="container">
        <div class="row align-items-center">
        @if($bannercontents->isNotEmpty())
        @foreach($bannercontents as $bannercontent)
            <div class="col-md-6 text-center text-md-left mb-3 mb-md-0">
                <a @isset($bannercontent->url) href="{{ $bannercontent->url }}" @endisset>
                    <img src="{{ asset('storage/banner_files/'. $bannercontent->file) }}" class="img-fluid" alt="Responsive image">
                </a>
            </div>
        @endforeach
        @else
            <h5 class="card-title text-white mx-auto">ไม่พบข้อมูล</h5>
        @endif
        </div>
    </div>
</div>

<!-- ประชาสัมพันธ์โรงเรียน-->
{{-- <div class="site-section" style="background-image: url('{{ asset('funder-template/images/topography.png') }}'); background-attachment: fixed">
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

            <div class="col-md-6 mt-3">
                <a href="{{ route('noticeSchoolShow',$noticeSchool->slug ) }}">
                    <div class="card h-100 " style="border-radius: 3px;border: 0;box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);">
                        <div class="card-body">
                            <h5 class="card-title">{{ Str::limit($noticeSchool->name, 90) }}</h5>
                            <blockquote class="mb-3 text-black-50"><p>&ldquo;{{ Str::limit($noticeSchool->description, 150) }}&rdquo;</p>
                        </blockquote>
                        </div>
                        <div class="card-footer d-flex justify-content-between align-items-center border-0">
                            <div class="">
                                <img src="@if(!empty($noticeSchool->user->avatar)) {{ asset('storage/user_avatars/'. $noticeSchool->user->avatar) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="Image" class="img-fluid ounded-circle" style="width:50px;border-radius: 50%;">
                                <span class="position text-muted">{{ $noticeSchool->user->role->name }}</span>
                            </div>
                            <div><small class="text-muted">{{ $noticeSchool->updated_at->diffForHumans() ?? $noticeSchool->created_at->diffForHumans() }}</small></div>
                        </div>
                    </div>
                </a>
            </div>

            @endforeach
            @else
            <div class="mx-auto">
                <div class="card-body">
                    <h3 class="card-title text-muted">ไม่พบข้อมูล</h3>
                </div>
            </div>
            @endif

            @if ($noticeSchools->isNotEmpty() && $noticeSchools->count() >= 4)
            <div class="col-12 mx-auto">
                <p class="mt-5" align="center"><a href="{{ route('noticeSchoolAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
            </div>
            @endif

        </div>
    </div>
</div> --}}
<!-- สิ้นสุดประชาสัมพันธ์โรงเรียน-->


<!-- จดหมายข่าว สพป -->
<section id="work" class="tm-section-pad-top">
    <div class="container tm-container-gallery">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">Letters</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">จดหมายข่าว สพป.</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="mx-auto tm-gallery-container">
                    <div class="grid tm-gallery">
                        @if ($letterRegions->isNotEmpty())
                            @foreach ($letterRegions as $letter)
                                <a href="{{ asset('storage/letter_files/'. $letter->file) }}">
                                    <figure class="effect-honey tm-gallery-item">
                                        <img src="{{ asset('storage/letter_files/'. $letter->file) }}" alt="Image" class="img-fluid">
                                        <figcaption>
                                            <h2><i>จดหมาย <span>ข่าว</span> สพป</i></h2>
                                        </figcaption>
                                    </figure>
                                </a>
                            @endforeach
                        @else
                            <a href="{{  config('app.placeholder').'300x450.png'  }}">
                                <figure class="effect-honey tm-gallery-item">
                                    <img src="{{  config('app.placeholder').'300x450.png'  }}" alt="Image" class="img-fluid">
                                    <figcaption>
                                        <h2><i>จดหมาย <span>ข่าว</span> สพป</i></h2>
                                    </figcaption>
                                </figure>
                            </a>
                            <a href="{{  config('app.placeholder').'300x450.png'  }}">
                                <figure class="effect-honey tm-gallery-item">
                                    <img src="{{  config('app.placeholder').'300x450.png'  }}" alt="Image" class="img-fluid">
                                    <figcaption>
                                        <h2><i>จดหมาย <span>ข่าว</span> สพป</i></h2>
                                    </figcaption>
                                </figure>
                            </a>
                            <a href="{{  config('app.placeholder').'300x450.png'  }}">
                                <figure class="effect-honey tm-gallery-item">
                                    <img src="{{  config('app.placeholder').'300x450.png'  }}" alt="Image" class="img-fluid">
                                    <figcaption>
                                        <h2><i>จดหมาย <span>ข่าว</span> สพป</i></h2>
                                    </figcaption>
                                </figure>
                            </a>
                        @endif


                    </div>
                </div>
                @if ($letterRegions->isNotEmpty())
                    <p style="margin-top: -25px;" class="mx-auto mb-5" align="center"><a href="{{ route('letterAll',$letter) }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- สิ้นสุดจดหมายข่าว สพป -->

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
                            <a href="{{ route('blogschoolShow', $blogschool->slug) }}" class="btn btn-primary text-white px-4"><span>อ่านเพิ่มเติม</span></a>
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
                <p class="mt-2" align="center"><a href="{{ route('blogschoolAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด กิจกรรม โรงเรียน. -->


<!-- จดหมายข่าว โรงเรียน -->
<section id="work" class="tm-section-pad-top">
    <div class="container tm-container-gallery">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">Letters</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">จดหมายข่าว โรงเรียน</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
               <div class="mx-auto tm-gallery-container">
                    <div class="grid tm-gallery">
                        @if ($letterDistricts->isNotEmpty())
                            @foreach ($letterDistricts as $letter)
                                <a href="{{ asset('storage/letter_files/'. $letter->file) }}">
                                    <figure class="effect-honey tm-gallery-item">
                                        <img src="{{ asset('storage/letter_files/'. $letter->file) }}" alt="Image" class="img-fluid">
                                        <figcaption>
                                            <h2><i>จดหมาย <span>ข่าว</span> โรงเรียน</i></h2>
                                        </figcaption>
                                    </figure>
                                </a>
                            @endforeach
                        @else
                            <a href="{{  config('app.placeholder').'300x450.png'  }}">
                                <figure class="effect-honey tm-gallery-item">
                                    <img src="{{  config('app.placeholder').'300x450.png'  }}" alt="Image" class="img-fluid">
                                    <figcaption>
                                        <h2><i>จดหมาย <span>ข่าว</span> โรงเรียน</i></h2>
                                    </figcaption>
                                </figure>
                            </a>
                            <a href="{{  config('app.placeholder').'300x450.png'  }}">
                                <figure class="effect-honey tm-gallery-item">
                                    <img src="{{  config('app.placeholder').'300x450.png'  }}" alt="Image" class="img-fluid">
                                    <figcaption>
                                        <h2><i>จดหมาย <span>ข่าว</span> โรงเรียน</i></h2>
                                    </figcaption>
                                </figure>
                            </a>
                            <a href="{{  config('app.placeholder').'300x450.png'  }}">
                                <figure class="effect-honey tm-gallery-item">
                                    <img src="{{  config('app.placeholder').'300x450.png'  }}" alt="Image" class="img-fluid">
                                    <figcaption>
                                        <h2><i>จดหมาย <span>ข่าว</span> โรงเรียน</i></h2>
                                    </figcaption>
                                </figure>
                            </a>
                        @endif


                    </div>
                </div>
                @if ($letterDistricts->isNotEmpty())
                    <p style="margin-top: -25px;" class="mx-auto mb-5" align="center"><a href="{{ route('letterAll',$letter) }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
                @endif
            </div>
        </div>
    </div>
</section>
<!-- สิ้นสุดจดหมายข่าว โรงเรียน -->


<!-- Video Section Begin -->
<section class="site-section bg-light">
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
                            <h5>{{ Str::limit($video->name, 65) ?? '' }}</h5>
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
            <p class="mt-5 mx-auto" align="center"><a href="{{ route('videoAll') }}" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
            @endif
        </div>
    </div>
</section>
<!-- Video Section End -->

<!-- service_area_start -->
<section class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-4 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">Q-SERVICES</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">การบริการ</h2>
            </div>
        </div>
        <div class="row no-gutters">
            <a href="{{ route('complaint.general') }}" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-left ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-rating"><i class="fas fa-desktop"></i></span></div>
                    <div class="text media-body">
                        <h3>ช่องทางแจ้งเรื่องร้องเรียนทั่วไป</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('complaints.index') }}" class="col-lg-4 d-flex">
                <div class="services-2 text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"><i class="fas fa-keyboard"></i></span></div>
                    <div class="text media-body">
                        <h3>ช่องทางแจ้งเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('opinions.create') }}" class="col-lg-4 d-flex">
                <div class="services-2 text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"><i class="fas fa-american-sign-language-interpreting"></i></span></div>
                    <div class="text media-body">
                        <h3>ช่องทางการรับฟังความคิดเห็น</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('questions.index') }}" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-left ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"><i class="fas fa-hand-holding-heart"></i></span></div>
                    <div class="text media-body">
                        <h3>Q&A ถาม-ตอบ ข้อสงสัย</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('standardPraticeGuide') }}" class="col-lg-4 d-flex">
                <div class="services-2 text-center ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-business"><i class="fas fa-book"></i></span></div>
                    <div class="text media-body">
                        <h3>คู่มือ/มาตรฐานการปฏิบัติงานของกลุ่ม/หน่วย/บุคลากร</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('standardService') }}" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-bottom ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-insurance"><i class="fas fa-atlas"></i></span></div>
                    <div class="text media-body">
                        <h3>คู่มือ/มาตรฐานการให้บริการและสถิติการให้บริการ</h3>
                    </div>
                </div>
            </a>
            <a href="{{ route('corruptionAll') }}" class="col-lg-4 d-flex">
                <div class="services-2 text-center noborder-bottom noborder-left ftco-animate">
                    <div class="icon mt-2 d-flex justify-content-center align-items-center"><span class="flaticon-search-engine"><i class="fas fa-fist-raised"></i></span></div>
                    <div class="text media-body">
                        <h3>ประกาศเจตนารมณ์นโยบาย No Gift Policy</h3>
                    </div>
                </div>
            </a>
            {{-- <a href="#" class="col-lg-4 d-flex">
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
            </a> --}}

        </div>
    </div>
</section>
<!-- service_area_end -->


<!-- Modal Popup -->
@if ($popupimages->isNotEmpty())
    @foreach ($popupimages as $popupimage)
        <div id="myModalPopup" class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" style=" right:0px; position:absolute;">
                    <span aria-hidden="true">&times;</span>
                    </button>
                    <img class="img-fluid" src="{{ asset('storage/popupimage_photos/'. $popupimage->file) }}" alt="">
                </div>
            </div>
        </div>
    @endforeach
@endif


@endsection
