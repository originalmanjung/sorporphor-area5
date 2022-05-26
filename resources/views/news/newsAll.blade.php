@extends('layouts.frontend.app')
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

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>กิจกรรมสพป.เชียงใหม่ เขต 5</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </section><!-- End Breadcrumbs -->

    <section>
        <div class="container">
            <div class="row">
                @if ($news->isNotEmpty())
                @foreach ($news as $newsItem)
                <div class="col-md-4 mt-5 mb-5">
                    <a href="{{ route('newsShow', $newsItem->slug) }}">
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
                    </a>
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
            <div class="d-flex justify-content-center">
                {{ $news->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>
</main>
@endsection
