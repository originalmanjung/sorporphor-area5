@extends('layouts.home.app')
@push('css')

@endpush
@section('content')
<!-- ======= Breadcrumbs ======= -->
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>คณะผู้บริหาร สพป.เชียงใหม่ เขต 5</h2>
            <ol>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li>Team</li>
            </ol>
        </div>

    </div>
</section><!-- End Breadcrumbs -->
<!-- ======= Team Section ======= -->
<section id="team" class="team bg-white">
    <div class="container">

        <div class="row">
            @if ($personals->isNotEmpty())
                @foreach ($personals as $personal)
                <div class="col-lg-6 mt-4 ml-4 mt-lg-0 mb-4">
                    <div class="member d-flex align-items-start">
                        <div class="pic"><img src="@if(isset($personal->avatar)) {{ asset('storage/personal_avatars/'. $personal->avatar) }} @else {{ config('app.placeholder').'600x600.png' }}@endif" class="img-fluid" alt=""></div>
                        <div class="member-info">
                            <h4>{{ $personal->name }}</h4>
                            <span>{{ $personal->position ?? 'ยังไม่มีข้อมูล' }}</span>
                            <p>{{ $personal->email ?? 'ยังไม่มีข้อมูล' }}</p>
                            <p>{{ $personal->phone ?? 'ยังไม่มีข้อมูล' }}</p>
                            <div class="social">
                                <a href="{{ $personal->twitter ?? 'https://twitter.com/?lang=th' }}"><i class="ri-twitter-fill"></i></a>
                                <a href="{{ $personal->facebook ?? 'https://www.facebook.com/' }}"><i class="ri-facebook-fill"></i></a>
                                <a href="{{ $personal->instagram ?? 'https://www.instagram.com/' }}"><i class="ri-instagram-fill"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
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
