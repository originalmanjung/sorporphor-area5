@extends('layouts.home.app')
@push('css')
<style>
    ..about {
        padding-bottom: 30px;
    }

    .about .container {
        box-shadow: 0 5px 25px 0 rgba(214, 215, 216, 0.6);
    }

    .about .video-box img {
        padding: 15px 0;
    }

    .about .section-title p {
        text-align: left;
        font-style: italic;
        color: #666;
    }

    .about .about-content {
        padding: 40px;
    }

    .about .icon-box+.icon-box {
        margin-top: 40px;
    }

    .about .icon-box .icon {
        float: left;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 72px;
        height: 72px;
        background: #f1f7fb;
        border-radius: 6px;
        transition: 0.5s;
    }

    .about .icon-box .icon i {
        color: #d9232d;
        font-size: 32px;
    }

    .about .icon-box:hover .icon {
        background: #d9232d;
    }

    .about .icon-box:hover .icon i {
        color: #fff;
    }

    .about .icon-box .title {
        margin-left: 95px;
        font-weight: 700;
        margin-bottom: 10px;
        font-size: 18px;
        text-transform: uppercase;
    }

    .about .icon-box .title a {
        color: #343a40;
        transition: 0.3s;
    }

    .about .icon-box .title a:hover {
        color: #d9232d;
    }

    .about .icon-box .description {
        margin-left: 95px;
        line-height: 24px;
        font-size: 14px;
    }

    .about .video-box {
        position: relative;
    }

    .about .play-btn {
        width: 94px;
        height: 94px;
        background: radial-gradient(#d9232d 50%, rgba(66, 139, 202, 0.4) 52%);
        border-radius: 50%;
        display: block;
        position: absolute;
        left: calc(50% - 47px);
        top: calc(50% - 47px);
        overflow: hidden;
    }

    .about .play-btn::after {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 100;
        transition: all 400ms cubic-bezier(0.55, 0.055, 0.675, 0.19);
    }

    .about .play-btn::before {
        content: '';
        position: absolute;
        width: 120px;
        height: 120px;
        -webkit-animation-delay: 0s;
        animation-delay: 0s;
        -webkit-animation: pulsate-btn 2s;
        animation: pulsate-btn 2s;
        -webkit-animation-direction: forwards;
        animation-direction: forwards;
        -webkit-animation-iteration-count: infinite;
        animation-iteration-count: infinite;
        -webkit-animation-timing-function: steps;
        animation-timing-function: steps;
        opacity: 1;
        border-radius: 50%;
        border: 5px solid rgba(66, 139, 202, 0.7);
        top: -15%;
        left: -15%;
        background: rgba(198, 16, 0, 0);
    }

    .about .play-btn:hover::after {
        border-left: 15px solid #d9232d;
        transform: scale(20);
    }

    .about .play-btn:hover::before {
        content: '';
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translateX(-40%) translateY(-50%);
        width: 0;
        height: 0;
        border: none;
        border-top: 10px solid transparent;
        border-bottom: 10px solid transparent;
        border-left: 15px solid #fff;
        z-index: 200;
        -webkit-animation: none;
        animation: none;
        border-radius: 0;
    }

    @-webkit-keyframes pulsate-btn {
        0% {
            transform: scale(0.6, 0.6);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
            opacity: 0;
        }
    }

    @keyframes pulsate-btn {
        0% {
            transform: scale(0.6, 0.6);
            opacity: 1;
        }

        100% {
            transform: scale(1, 1);
            opacity: 0;
        }
    }
</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>วีดีโอ สพป.เชียงใหม่ เขต 5</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li><a href="{{ route('videoAll') }}">วีดีโอทั้งหมด</a></li>
                    <li>วีดีโอ สพป.เชียงใหม่ เขต 5</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Us Section ======= -->
    <section id="about" class="about">
        <div class="container" data-aos="fade-up">

            <div class="row no-gutters">
                <div class="col-lg-6 video-box">
                    <img src="{{ asset('storage/video_photos/' .$video->filename) }}" class="img-fluid" alt="">
                    <a href="{{ $video->url }}" class="glightbox venobox play-btn mb-4"
                        data-vbtype="video" data-autoplay="true"></a>
                </div>

                <div class="col-lg-6 d-flex flex-column justify-content-center about-content">

                    <div class="section-title">
                        <h2>About Video</h2>
                        <p>{{ $video->name }}</p>
                    </div>


                    <div class="icon-box" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class='bx bxs-notepad'></i></div>
                        <p class="description">{{ $video->description }}</p>
                    </div>

                </div>
            </div>

        </div>
    </section><!-- End About Us Section -->
</main>
@endsection
