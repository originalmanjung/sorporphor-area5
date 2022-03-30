@extends('layouts.home.app')
@push('css')
<style>
    .gallery-item {
    overflow: hidden;
    border-right: 3px solid #fff;
    border-bottom: 3px solid #fff;
  }

  .gallery-item img {
    transition: all ease-in-out 0.4s;
  }

  .gallery-item:hover img {
    transform: scale(1.1);
  }
    .img-span {
        position: relative;
        width: 100%;
  }
   .img-span  h4 {
    position: absolute;
    top: 10px;
    left: 10px;
    width: 100%;
    font-size: 14px;

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
                    <li>วีดีโอทั้งหมด</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

   <section>
    <div class="container">
        <div class="row">
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

            {{ $videos->links('vendor.pagination.custom') }}
    </div>
   </section>
</main>
@endsection
