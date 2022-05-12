@extends('layouts.frontend.app')
@push('css')
<link rel="stylesheet" href="{{ asset('css/frontend/frontend-custom.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css" integrity="sha512-yHknP1/AwR+yx26cB1y0cjvQUMvEa2PFzt1c9LlS4pRQ5NOTZFWbhBig+X9G9eYW/8m0/4OXNx8pxJ6z57x0dw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>

</script>
@endpush
@section('content')
<div class="slide-one-item home-slider owl-carousel">

    <div class="site-blocks-cover inner-page overlay" style="background-image: url({{ asset('funder-template/images/hero_bg_1.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-md-6" data-aos="fade">
                    <h1 class="font-secondary font-weight-bold text-uppercase">Small Business Insurance Agency</h1>
                    <span class="caption d-block text-white">An Insurance Company</span>
                </div>
            </div>
        </div>
    </div>

    <div class="site-blocks-cover inner-page overlay" style="background-image: url({{ asset('funder-template/images/hero_bg_2.jpg') }});" data-aos="fade" data-stellar-background-ratio="0.5">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 text-center" data-aos="fade">
                    <h1 class="font-secondary font-weight-bold text-uppercase">Insurance Coverage To Meet Your Needs</h1>
                    <span class="caption d-block text-white">You Will Love Our Services</span>
                </div>
            </div>
        </div>
    </div>
</div>



<!-- กลุ่มผู้บริหาร สพป. -->
<div class="site-section block-14 nav-direction-white">

    <div class="container">

        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center text-uppercase">Testimonies</h2>
            </div>
        </div>

        <div class="nonloop-block-14 owl-carousel">

            <div class="">
                <div class="d-block block-testimony w-75 mx-auto text-center">
                    <div class="person w-25 mx-auto mb-4">
                        <img src="{{ asset('funder-template/images/person_1.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                    </div>
                    <div>
                        <h2 class="h5 mb-2">Katie Johnson</h2>
                        <h2 class="h6 text-secondary">System Analesis</h2>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="d-block block-testimony w-75 mx-auto text-center">
                    <div class="person w-25 mx-auto mb-4">
                        <img src="{{ asset('funder-template/images/person_2.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                    </div>
                    <div>
                        <h2 class="h5 mb-4">Jun Mars</h2>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="d-block block-testimony w-75 mx-auto text-center">
                    <div class="person w-25 mx-auto mb-4">
                        <img src="{{ asset('funder-template/images/person_3.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                    </div>
                    <div>
                        <h2 class="h5 mb-4">Shane Holmes</h2>
                    </div>
                </div>
            </div>
            <div class="p-5">
                <div class="d-block block-testimony w-75 mx-auto text-center">
                    <div class="person w-25 mx-auto mb-4">
                        <img src="{{ asset('funder-template/images/person_4.jpg') }}" alt="Image" class="img-fluid rounded-circle">
                    </div>
                    <div>
                        <h2 class="h5 mb-4">Mark Johnson</h2>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>
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
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Home Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_2.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Auto Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_3.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Travel Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Home Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_2.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Auto Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_3.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Travel Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                </div>
                <p class="mt-5" align="center"><a href="#" class="btn btn-outline-primary py-2 px-4">Insured Yours Now</a></p>
            </div>
        </div>
    </div>
</div>
<!-- สิ้นสุด กิจกรรม สพป. -->

<!-- Video -->
<div class="site-section" id="about-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">VIDEO &amp; VTR</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">วีดีโอ สพป.เชียงใหม่ เขต 5</h2>
            </div>
        </div>
        <div class="row block-img-video-1-wrap">
            <div class="col-md-6 mb-5">
                <figure class="block-img-video-1">
                    <a href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-fancybox data-ratio="2">
                        <span class="icon"><span class="icon-play"></span></span>
                        <img src="{{ asset('funder-template/images/cargo_delivery_big.jpg') }}" alt="Image" class="img-fluid">
                    </a>
                </figure>
            </div>
            <div class="col-md-6 mb-5">
                <figure class="block-img-video-1">
                    <a href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-fancybox data-ratio="2">
                        <span class="icon"><span class="icon-play"></span></span>
                        <img src="{{ asset('funder-template/images/cargo_delivery_big.jpg') }}" alt="Image" class="img-fluid">
                    </a>
                </figure>
            </div>
            <div class="col-md-6 mb-5">
                <figure class="block-img-video-1">
                    <a href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-fancybox data-ratio="2">
                        <span class="icon"><span class="icon-play"></span></span>
                        <img src="{{ asset('funder-template/images/cargo_delivery_big.jpg') }}" alt="Image" class="img-fluid">
                    </a>
                </figure>
            </div>
            <div class="col-md-6 mb-5">
                <figure class="block-img-video-1">
                    <a href="https://www.youtube.com/watch?v=fLCjQJCekTs" data-fancybox data-ratio="2">
                        <span class="icon"><span class="icon-play"></span></span>
                        <img src="{{ asset('funder-template/images/cargo_delivery_big.jpg') }}" alt="Image" class="img-fluid">
                    </a>
                </figure>
            </div>
        </div>
        <p class="mt-3" align="center"><a href="#" class="btn btn-outline-primary py-2 px-4">Insured Yours Now</a></p>
    </div>
</div>
<!-- end of video -->

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
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Home Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_2.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Auto Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_3.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Travel Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_1.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Home Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_2.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Auto Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                    <div class="media-image">
                        <img src="{{ asset('funder-template/images/img_3.jpg') }}" alt="Image" class="img-fluid">
                        <div class="media-image-body">
                            <h2 class="font-secondary text-uppercase">Travel Insurance</h2>
                            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, voluptate.</p>
                            <p><a href="#" class="btn btn-primary text-white px-4"><span class="caption">Learn More</span></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <p class="mt-5" align="center"><a href="#" class="btn btn-outline-primary py-2 px-4">Insured Yours Now</a></p>
    </div>
</div>
<!-- สิ้นสุด กิจกรรม โรงเรียน. -->

<!-- ITA -->
<section class="site-section ftco-section ftco-faqs">
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">PUBLIC DISCLOSURE OF INFORMATION</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">การเปิดเผยข้อมูลสาธารณะ</h2>
            </div>
        </div>
        <div class="row mt-4">

            <div class="col-lg-6">
                <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">

                    <div class="card">
                        <div class="card-header p-0" id="headingTwo" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                    <p class="mb-0">How to manage your pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <ol>
                                    <li>Far far away, behind the word mountains</li>
                                    <li>Consonantia, there live the blind texts</li>
                                    <li>When she reached the first hills of the Italic Mountains</li>
                                    <li>Bookmarksgrove, the headline of Alphabet Village</li>
                                    <li>Separated they live in Bookmarksgrove right</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0" id="headingThree" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                    <p class="mb-0">What is the best grooming for your pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <ol>
                                    <li>Far far away, behind the word mountains</li>
                                    <li>Consonantia, there live the blind texts</li>
                                    <li>When she reached the first hills of the Italic Mountains</li>
                                    <li>Bookmarksgrove, the headline of Alphabet Village</li>
                                    <li>Separated they live in Bookmarksgrove right</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0" id="headingFour" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseFour" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                                    <p class="mb-0">What are those requirements for sitting pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove
                                    right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div id="accordion" class="myaccordion w-100" aria-multiselectable="true">

                    <div class="card">
                        <div class="card-header p-0" id="headingTwo" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseTwo" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseTwo">
                                    <p class="mb-0">How to manage your pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseTwo" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <ol>
                                    <li>Far far away, behind the word mountains</li>
                                    <li>Consonantia, there live the blind texts</li>
                                    <li>When she reached the first hills of the Italic Mountains</li>
                                    <li>Bookmarksgrove, the headline of Alphabet Village</li>
                                    <li>Separated they live in Bookmarksgrove right</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0" id="headingThree" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseThree" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseThree">
                                    <p class="mb-0">What is the best grooming for your pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseThree" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <ol>
                                    <li>Far far away, behind the word mountains</li>
                                    <li>Consonantia, there live the blind texts</li>
                                    <li>When she reached the first hills of the Italic Mountains</li>
                                    <li>Bookmarksgrove, the headline of Alphabet Village</li>
                                    <li>Separated they live in Bookmarksgrove right</li>
                                </ol>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header p-0" id="headingFour" role="tab">
                            <h2 class="mb-0">
                                <button href="#collapseFour" class="d-flex py-3 px-4 align-items-center justify-content-between btn btn-link" data-parent="#accordion" data-toggle="collapse" aria-expanded="false" aria-controls="collapseFour">
                                    <p class="mb-0">What are those requirements for sitting pets?</p>
                                    <i class="fa" aria-hidden="true"></i>
                                </button>
                            </h2>
                        </div>
                        <div class="collapse" id="collapseFour" role="tabpanel" aria-labelledby="headingTwo">
                            <div class="card-body py-3 px-0">
                                <p>Far far away, behind the word mountains, far from the countries Vokalia and
                                    Consonantia, there live the blind texts. Separated they live in Bookmarksgrove
                                    right at the coast of the Semantics, a large language ocean.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>
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
                    <div class="tab-pane container p-0 active" id="services-1">
                        <h3><a href="#">Relation Problem</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                            the Semantics, a large language ocean.</p>
                    </div>
                    <div class="tab-pane container p-0 fade" id="services-2">
                        <h3><a href="#">Couples Counseling</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                            the Semantics, a large language ocean.</p>
                    </div>
                    <div class="tab-pane container p-0 fade" id="services-3">
                        <h3><a href="#">Depression Treatment</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                            the Semantics, a large language ocean.</p>
                    </div>
                    <div class="tab-pane container p-0 fade" id="services-4">
                        <h3><a href="#">Family Problem</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                            the Semantics, a large language ocean.</p>
                    </div>
                    <div class="tab-pane container p-0 fade" id="services-5">
                        <h3><a href="#">Personal Problem</a></h3>
                        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia,
                            there live the blind texts. Separated they live in Bookmarksgrove right at the coast of
                            the Semantics, a large language ocean.</p>
                    </div>
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
            <div class="col-lg-6 mb-4">
                <div class="testimonial bg-white h-100">
                    <blockquote class="mb-3">
                        <p>&ldquo;Far far away, behind the word mountains, <strong>far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</strong> right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                    </blockquote>
                    <div class="d-flex align-items-center vcard">
                        <figure class="mb-0 mr-3">
                            <img src="{{ asset('funder-template/images/person_3.jpg') }}" alt="Image" class="img-fluid ounded-circle">
                        </figure>
                        <div class="vcard-text">
                            <span class="d-block">Jacob Spencer</span>
                            <span class="position">Web Designer</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 mb-4">
                <div class="testimonial bg-white h-100">
                    <blockquote class="mb-3">
                        <p>&ldquo;A small river named Duden <strong>flows by their place and supplies it with the necessary regelialia</strong>. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
                    </blockquote>
                    <div class="d-flex align-items-center vcard">
                        <figure class="mb-0 mr-3">
                            <img src="{{ asset('funder-template/images/person_4.jpg') }}" alt="Image" class="img-fluid ounded-circle">
                        </figure>
                        <div class="vcard-text">
                            <span class="d-block">Jean Smith</span>
                            <span class="position">Web Designer</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 mb-4">
                <div class="testimonial bg-white h-100">
                    <blockquote class="mb-3">
                        <p>&ldquo;A small river named Duden <strong>flows by their place and supplies it with the necessary regelialia</strong>. It is a paradisematic country, in which roasted parts of sentences fly into your mouth.&rdquo;</p>
                    </blockquote>
                    <div class="d-flex align-items-center vcard">
                        <figure class="mb-0 mr-3">
                            <img src="{{ asset('funder-template/images/person_4.jpg') }}" alt="Image" class="img-fluid ounded-circle">
                        </figure>
                        <div class="vcard-text">
                            <span class="d-block">Jean Smith</span>
                            <span class="position">Web Designer</span>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-6 mb-4">
                <div class="testimonial bg-white h-100">
                    <blockquote class="mb-3">
                        <p>&ldquo;Far far away, behind the word mountains, <strong>far from the countries Vokalia and Consonantia, there live the blind texts. Separated they live in Bookmarksgrove</strong> right at the coast of the Semantics, a large language ocean.&rdquo;</p>
                    </blockquote>
                    <div class="d-flex align-items-center vcard">
                        <figure class="mb-0 mr-3">
                            <img src="{{ asset('funder-template/images/person_3.jpg') }}" alt="Image" class="img-fluid ounded-circle">
                        </figure>
                        <div class="vcard-text">
                            <span class="d-block">Jacob Spencer</span>
                            <span class="position">Web Designer</span>
                        </div>
                    </div>
                </div>
            </div>
            <p class="mt-5 mx-auto" align="center"><a href="#" class="btn btn-outline-primary py-2 px-4">ดูทั้งหมด</a></p>
        </div>
    </div>
</div>
<!-- สิ้นสุดประชาสัมพันธ์โรงเรียน-->






<div class="site-half">
    <div class="img-bg-1 right" style="background-image: url('{{ asset('funder-template/images/hero_bg_1.jpg') }}');"></div>
    <div class="container">
        <div class="row no-gutters align-items-stretch">
            <div class="col-md-5 mr-md-auto py-5">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span>
                <h2 class="site-section-heading text-uppercase font-secondary mb-5">Why Choose Us</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Necessitatibus aliquid eius facilis voluptatem eligendi magnam accusamus vel commodi asperiores sint rem reprehenderit nobis nesciunt veniam qui fugit doloremque numquam quod.</p>

                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Consectetur tempora distinctio ipsam nesciunt recusandae repellendus asperiores amet.</p>
            </div>
        </div>
    </div>
</div>


<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <span class="caption d-block mb-2 font-secondary font-weight-bold">Outstanding Services</span>
                <h2 class="site-section-heading text-uppercase text-center font-secondary">Why Choose Us</h2>
            </div>
        </div>
        <div class="row border-responsive">
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right">
                <div class="text-center">
                    <span class="flaticon-customer-service display-4 d-block mb-3 text-primary"></span>
                    <h3 class="text-uppercase h4 mb-3">24/7 Support</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right">
                <div class="text-center">
                    <span class="flaticon-group display-4 d-block mb-3 text-primary"></span>
                    <h3 class="text-uppercase h4 mb-3">Trusted People</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0 border-right">
                <div class="text-center">
                    <span class="flaticon-medal display-4 d-block mb-3 text-primary"></span>
                    <h3 class="text-uppercase h4 mb-3">12 Years Experience</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">
                <div class="text-center">
                    <span class="flaticon-agreement display-4 d-block mb-3 text-primary"></span>
                    <h3 class="text-uppercase h4 mb-3">Join With Us</h3>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque, nobis?</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <p class="mb-5"><img src="{{ asset('funder-template/images/img_1.jpg') }}" alt="Image" class="img-fluid"></p>
            </div>
            <div class="col-lg-5 ml-auto">
                <h2 class="site-section-heading mb-3 font-secondary text-uppercase">Thousands of Houses Damage Each Year</h2>
                <p class="mb-5">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Enim ad, tempora incidunt accusantium. Similique magni quaerat beatae illo aliquid. Libero non ipsa nisi, corporis architecto incidunt rem repellendus asperiores numquam!</p>
                <p><a href="#" class="btn btn-outline-primary py-2 px-4">Insured Yours Now</a></p>
            </div>
        </div>
    </div>
</div>

<div class="site-section" style="background-image: url('{{ asset('funder-template/images/topography.png') }}'); background-attachment: fixed">
    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12">
                <h2 class="site-section-heading text-center text-uppercase">Our Founders</h2>
            </div>
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 text-center">
                <img src="{{ asset('funder-template/images/person_2.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4">
                <h2 class="h5 ">Alex Peters</h2>
                <span class="d-block mb-4">CEO, Co-Founder</span>
                <p class="font-weig mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita et aliquam fuga dicta amet ad laborum error recusandae, voluptatibus quam minima sed, saepe odio voluptatem. Sed unde hic, vitae fugiat.</p>
            </div>
            <div class="col-md-6 text-center">
                <img src="{{ asset('funder-template/images/person_3.jpg') }}" alt="Image" class="img-fluid rounded-circle w-25 mb-4">
                <h2 class="h5">Shane Cripton</h2>
                <span class="d-block mb-4">President, Co-Founder</span>
                <p class="font-weig mb-5 lead">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Expedita et aliquam fuga dicta amet ad laborum error recusandae, voluptatibus quam minima sed, saepe odio voluptatem. Sed unde hic, vitae fugiat.</p>
            </div>
        </div>
    </div>
</div>


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
