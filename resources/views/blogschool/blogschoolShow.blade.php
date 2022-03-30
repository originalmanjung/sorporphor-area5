@extends('layouts.home.app')
@push('css')
<style>
    .card {
        border-radius: 3px;
        border: 0;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }


    .card {
        position: relative;
        width: 100%;
    }

    .card h4 {
        position: absolute;
        top: 8px;
        left: 10px;
        width: 100%;
        font-size: 16px;
    }

    .card-icon {
        text-align: center;
        margin-top: -32px;
    }

    .card-icon i {
        font-size: 32px;
        color: #fff;
        width: 64px;
        height: 64px;
        padding-top: 10px;
        text-align: center;
        background-color: #d9232d;
        border-radius: 50%;
        text-align: center;
        border: 4px solid #fff;
        transition: 0.3s;
        display: inline-block;
    }

    .card-body {
        padding-top: 12px;
        cursor: pointer;
    }

    .card-title {
        font-weight: 700;
        text-align: center;
    }

    .card-body .card-title a {
        color: #743e1d;
    }

    .card-body .card-title a:hover {
        color: #d9232d;
    }

    .card-body .card-text {
        color: #5e5e5e;
    }

    .card:hover .card-icon i {
        background: #fff;
        color: #d9232d;
    }
    .card-author {
        margin-top: -40px;
        padding: 15px;
    }
</style>
@endpush
@section('content')
<main id="main" class="bg-white">
    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>กิจกรรม สพป.เชียงใหม่ เขต 5</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li><a href="{{ route('blogschoolAll') }}">กิจกรรม สพป.เชียงใหม่ เขต 5 ทั้งหมด</a></li>
                    <li>กิจกรรม สพป.เชียงใหม่ เขต 5</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

<section>
    <div class="container">
        <div class="card">
            <div class="card-header">
              Information
            </div>
            <div class="card-body">
              <div class="p-5">
                <h5 class="card-title">{{ $blogschool->title }}</h5>
                <p class="card-text p-3">{{ $blogschool->description }}</p>
                @if ($blogschool->blogSchoolPhotos->isNotEmpty())
                    <div class="col-md-12">
                        <div class="mb-3">
                            <div class="row g-3">
                            @foreach ($blogschool->blogSchoolPhotos as $key=>$photos )
                                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 image-area">
                                        <a class="glightbox" href="{{ asset('storage/blogschool_photos/'.$photos->filename) }}">
                                            <img src="{{ asset('storage/blogschool_photos/'.$photos->filename) }}" alt="" class="img-fluid card-img-top rounded">
                                        </a>
                                        <form id="delete-form-{{ $photos->id }}" action="{{ route('app.news-photos.destroy',$photos->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                @else
                <div class="mb-5" align="center"><h5><span class="badge bg-danger">ไม่มีรูปภาพที่อัฟโหลด</span></h5></div>
                @endif
              </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
@push('js')
<script type="text/javascript">
    const glightbox = GLightbox({
        openEffect: 'zoom',
        closeEffect: 'fade',
        cssEfects: {
            // This are some of the animations included, no need to overwrite
            fade: { in: 'fadeIn', out: 'fadeOut' },
            zoom: { in: 'zoomIn', out: 'zoomOut' }
        }
    });
</script>
@endpush
