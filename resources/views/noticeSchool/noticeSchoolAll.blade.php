@extends('layouts.frontend.app')
@push('css')
<style>


</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>ประชาสัมพันธ์โรงเรียน</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container" data-aos="fade-up">

            <div class="row mb-5" data-aos="fade-up" data-aos-delay="200">
                @if ($noticeSchools->isNotEmpty())
                @foreach ($noticeSchools as $noticeSchool)
               <div class="col-md-6 mt-5">
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
                {{ $noticeSchools->links('vendor.pagination.custom') }}
                @endif


            </div>

        </div>

    </section><!-- End Services Section -->
</main>
@endsection
