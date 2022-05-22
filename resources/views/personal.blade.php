@extends('layouts.frontend.app')
@push('css')
<style>
    .team .member {
        position: relative;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        padding: 30px;
        border-radius: 4px;
        background: white;


    }

    .team .member .pic {
        overflow: hidden;
        width: 140px;
        border-radius: 4px;
    }

    .team .member .pic img {
        transition: ease-in-out 0.3s;
    }

    .team .member:hover img {
        transform: scale(1.1);
    }

    .team .member .member-info {
        padding-left: 30px;
    }

    .team .member h4 {
        font-weight: 700;
        margin-bottom: 5px;
        font-size: 20px;
        color: #556270;
    }

    .team .member span {
        display: block;
        font-size: 15px;
        padding-bottom: 10px;
        position: relative;
        font-weight: 500;
    }

    .team .member span::after {
        content: '';
        position: absolute;
        display: block;
        width: 50px;
        height: 1px;
        background: #dee2e6;
        bottom: 0;
        left: 0;
    }

    .team .member p {
        margin: 10px 0 0 0;
        font-size: 14px;
    }

    .team .member .social {
        margin-top: 12px;
        display: flex;
        align-items: center;
        justify-content: flex-start;
    }

    .team .member .social a {
        transition: ease-in-out 0.3s;
        display: flex;
        align-items: center;
        justify-content: center;
        border-radius: 4px;
        width: 32px;
        height: 32px;
        background: #8795a4;
    }

    .team .member .social a i {
        color: #fff;
        font-size: 16px;
        margin: 0 2px;
    }

    .team .member .social a:hover {
        background: #fd7e14;
    }

    .team .member .social a+a {
        margin-left: 8px;
    }

</style>
@endpush
@section('content')
<div class="back_re mb-4">
    <div class="container">
       <div class="row">
          <div class="col-md-12">
             <div class="title">
                 <h2>{{ $slug ?? 'คณะผู้บริหาร สพป.เชียงใหม่ เขต 5' }}</h2>
             </div>
          </div>
       </div>
    </div>
</div>
<!-- ======= Team Section ======= -->
<section id="team" class="team bg-white">
    <div class="container">

        <div class="row">

            @if ($personals->isNotEmpty())
            @foreach ($personals as $personal)
            <div class="col-md-6 mt-3 mb-3">
                <div class="member d-flex align-items-start h-100">
                    <div class="pic"><img src="@if(isset($personal->avatar)) {{ asset('storage/personal_avatars/'. $personal->avatar) }} @else {{ config('app.placeholder').'600x600.png' }}@endif" class="img-fluid" alt=""></div>
                    <div class="member-info">
                        <h4>{{ $personal->name }}</h4>
                        <span>{{ $personal->position ?? 'ยังไม่มีข้อมูล' }}</span>
                        <p>{{ $personal->email ?? 'ยังไม่มีข้อมูล' }}</p>
                        <p>{{ $personal->phone ?? 'ยังไม่มีข้อมูล' }}</p>
                        <div class="social">
                            <a href="{{ $personal->twitter ?? 'https://twitter.com/?lang=th' }}"><i class="icon-twitter"></i></a>
                            <a href="{{ $personal->facebook ?? 'https://www.facebook.com/' }}"><i class="icon-facebook"></i></a>
                            <a href="{{ $personal->instagram ?? 'https://www.instagram.com/' }}"><i class="icon-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
            @else
            <div class="card text-center border border-1 mb-4 mx-auto" style="--bs-gutter-x: 0rem;">
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
</section><!-- End Team Section -->
{{-- <section id="trainers" class="trainers bg-white">
    <div class="container" data-aos="fade-up">
        <div class="row" data-aos="zoom-in" data-aos-delay="100">
            @foreach ($personals as $personal)
            <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                <div class="member">
                    <div class="wrap-card-img">
                        <img src="@if(isset($personal->avatar)) {{ asset('storage/personal_avatars/'. $personal->avatar) }}
@else {{ config('app.placeholder').'600x600.png' }}@endif" class="img-fluid" alt="">
</div>
<div class="member-content">
    <h4>{{ $personal->FullName }}</h4>
    <span class="mt-3">{{ $personal->position_general }}</span>
    <p class="mt-3">{{ $personal->phone ?? 'ไม่มีเบอร์โทรศัพท์' }}</p>
    <p>{{ $personal->email ?? 'ไม่มีอีเมลล์' }}</p>
    <div class="social">
        <a href=""><i class="bi bi-twitter"></i></a>
        <a href=""><i class="bi bi-facebook"></i></a>
        <a href=""><i class="bi bi-instagram"></i></a>
        <a href=""><i class="bi bi-linkedin"></i></a>
    </div>
</div>
</div>
</div>
@endforeach

</div>

</div>
</section> --}}
@endsection
