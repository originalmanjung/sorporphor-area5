@extends('layouts.home.app')
@push('css')
<style>


</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>ประชาสัมพันธ์โรงเรียน</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li>ประชาสัมพันธ์โรงเรียนทั้งหมด</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

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
                                    <h6>ผู้โพส : <span class="badge bg-secondary">{{ $noticeSchool->user->name }}</span>
                                    </h6>
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
