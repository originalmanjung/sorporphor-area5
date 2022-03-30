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
                    <li>กิจกรรม สพป.เชียงใหม่ เขต 5 ทั้งหมด</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

   <section>
    <div class="container">
        <div class="row">
        @if ($news->isNotEmpty())
            @foreach ($news as $newsItem)
                <div class="col-md-4">
                    <a href="{{ route('newsShow',$newsItem->slug ) }}">
                        <div class="card h-100">
                            <img src="@if($newsItem->newsphotos->isNotEmpty()) {{ asset('storage/news_photos/'. $newsItem->newsphotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" class="card-img-top" alt="...">
                            <h4><span class="badge bg-danger">กิจกรรมเชียงใหม่ เขต 5</span></h4>
                            <div class="card-icon">
                                <i class="bx bx-book-reader"></i>
                            </div>
                            <div class="card-body">
                                <h5 class="card-title"><a>{{ Str::limit($newsItem->title, 150) }}</a></h5>
                                <p class="card-text">{{ Str::limit($newsItem->description, 200) }}</p>

                            </div>
                            <div class="d-flex card-author">
                                <small class="text-muted me-auto">{{ $newsItem->created_at->format('d/m/Y') }}</small>
                                <h6>ผู้โพส : <span class="badge bg-secondary">{{ $newsItem->user->name }}</span></h6>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
            {{ $news->links('vendor.pagination.custom') }}
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
   </section>
</main>
@endsection
