@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<style>
    /* ===========
   Gallery
 =============*/
    .thumb {
        background-color: #ffffff;
        border-radius: 3px;
        box-shadow: 0 1px 1px 0 rgba(0, 0, 0, 0.1);
        margin-top: 30px;
        padding-bottom: 10px;
        padding-left: 10px;
        padding-right: 10px;
        padding-top: 10px;
        width: 100%;
    }

    .thumb-img {
        border-radius: 2px;
        overflow: hidden;
        width: 100%;
    }

    .gal-detail h4 {
        margin: 16px auto 10px auto;
        width: 80%;
        white-space: nowrap;
        display: block;
        overflow: hidden;
        text-overflow: ellipsis;
    }

    .gal-detail .ga-border {
        height: 3px;
        width: 40px;
        background-color: #228bdf;
        margin: 10px auto;
    }




    .tabs-vertical-env .tab-content {
        background: #ffffff;
        display: table-cell;
        margin-bottom: 30px;
        padding: 30px;
        vertical-align: top;
    }

    .tabs-vertical-env .nav.tabs-vertical {
        display: table-cell;
        min-width: 120px;
        vertical-align: top;
        width: 150px;
    }

    .tabs-vertical-env .nav.tabs-vertical li.active>a {
        background-color: #ffffff;
        border: 0;
    }

    .tabs-vertical-env .nav.tabs-vertical li>a {
        color: #333333;
        text-align: center;
        font-family: 'Roboto', sans-serif;
        font-weight: 500;
        white-space: nowrap;
    }

    .nav.nav-tabs>li.active>a {
        background-color: #ffffff;
        border: 0;
    }

    .nav.nav-tabs>li>a {
        background-color: transparent;
        border-radius: 0;
        border: none;
        color: #333333 !important;
        cursor: pointer;
        line-height: 50px;
        font-weight: 500;
        padding-left: 20px;
        padding-right: 20px;
        font-family: 'Roboto', sans-serif;
    }

    .nav.nav-tabs>li>a:hover {
        color: #228bdf !important;
    }

    .nav.tabs-vertical>li>a {
        background-color: transparent;
        border-radius: 0;
        border: none;
        color: #333333 !important;
        cursor: pointer;
        line-height: 50px;
        padding-left: 20px;
        padding-right: 20px;
    }

    .nav.tabs-vertical>li>a:hover {
        color: #228bdf !important;
    }

    .tab-content {
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        color: #777777;
    }

    .nav.nav-tabs>li:last-of-type a {
        margin-right: 0px;
    }

    .nav.nav-tabs {
        border-bottom: 0;
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
    }

    .navtab-custom li {
        margin-bottom: -2px;
    }

    .navtab-custom li a {
        border-top: 2px solid transparent !important;
    }

    .navtab-custom li.active a {
        border-top: 2px solid #228bdf !important;
    }

    .nav-tab-left.navtab-custom li a {
        border: none !important;
        border-left: 2px solid transparent !important;
    }

    .nav-tab-left.navtab-custom li.active a {
        border-left: 2px solid #228bdf !important;
    }

    .nav-tab-right.navtab-custom li a {
        border: none !important;
        border-right: 2px solid transparent !important;
    }

    .nav-tab-right.navtab-custom li.active a {
        border-right: 2px solid #228bdf !important;
    }

    .nav-tabs.nav-justified>.active>a,
    .nav-tabs.nav-justified>.active>a:hover,
    .nav-tabs.nav-justified>.active>a:focus,
    .tabs-vertical-env .nav.tabs-vertical li.active>a {
        border: none;
    }

    .nav-tabs>li.active>a,
    .nav-tabs>li.active>a:focus,
    .nav-tabs>li.active>a:hover,
    .tabs-vertical>li.active>a,
    .tabs-vertical>li.active>a:focus,
    .tabs-vertical>li.active>a:hover {
        color: #228bdf !important;
    }

    .nav.nav-tabs+.tab-content {
        background: #ffffff;
        margin-bottom: 20px;
        padding: 20px;
    }

    .progress.progress-sm .progress-bar {
        font-size: 8px;
        line-height: 5px;
    }
</style>
@endpush
@section('content')
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<div class="container">
    <div class="row">
        <div class="col-md-12 mt-4">
        <a href="{{ route('app.news.index') }}" type="button" class="btn btn-danger mb-3"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
            <div class="text-center card-box">
                <div class="member-card">
                        <div class="card">
                        <div class="card-header">
                            ข่าว & กิจกรรม
                        </div>
                        <div class="card-body">
                            <h5 class="card-title">{{ $news->title }}</h5>
                            <p class="card-text">{{ $news->description }}</p>
                            <span class="badge bg-primary">{{ $news->conditions }}</span>
                        </div>
                        </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->

        <div class="col-md-12 col-lg-12">
            <div class="">
                <div class="">
                    <div class="tab-content">
                        <div class="tab-pane active" id="profile">
                            <div class="row">
                             @foreach ($news->newsphotos as $key=>$photos )
                                <div class="col-sm-3">
                                    <div class="gal-detail thumb">
                                        <a href="{{ asset('storage/news_photos/'.$photos->filename) }}" class="image-popup fancybox" rel="ligthbox" title="Screenshot-2">
                                            <img src="{{ asset('storage/news_photos/'.$photos->filename) }}" class="thumb-img" alt="work-thumbnail">
                                        </a>
                                        <h4 class="text-center">Gallary Image</h4>
                                        <div class="ga-border"></div>
                                        <p class="text-muted text-center"><small>Photography</small></p>
                                    </div>
                                </div>


                                    {{-- <div class="col-xl-3 col-lg-4 col-md-6 mb-4">
                                        <a class="thumbnail fancybox" rel="ligthbox" href="{{ asset('storage/news_photos/'.$photos->filename) }}">
                                            <img src="{{ asset('storage/news_photos/'.$photos->filename) }}" alt="" class="img-fluid card-img-top rounded">
                                            <a class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $photos->id }})"><i class="fa fa-trash"></i></a>
                                        </a>
                                        <form id="delete-form-{{ $photos->id }}" action="{{ route('app.news-photos.destroy',$photos->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div> --}}
                            @endforeach
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
</div>
@endsection
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
    </script>
@endpush