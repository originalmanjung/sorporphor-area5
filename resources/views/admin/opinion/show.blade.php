@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
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
        <div class="col-md-8 mt-4">
            <a href="{{ route('app.opinions.index') }}" type="button" class="btn btn-danger mb-3"><i
                    class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
            <div class="card-box">
                <div class="member-card">
                    <div class="card">
                        <div class="card-header">
                            รับฟังความคิดเห็น
                        </div>
                        <div class="card-body">
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">ชื่อเรื่อง : {{ $opinion->title }}</li>
                                <li class="list-group-item">รายละเอียด : {{ $opinion->description }}</li>
                                <li class="list-group-item">ชื่อแสดงความคิดเห็น : {{ $opinion->name }}</li>
                                <li class="list-group-item">เบอร์โทรศัพท์ : {{ $opinion->phone }}</li>
                                <li class="list-group-item">อีเมลล์ผู้แสดงความคิดเห็น : {{ $opinion->email }}</li>
                                <li class="list-group-item">วันที่แสดงความคิดเห็น: {{ $opinion->created_at->format('d/m/Y') }}</li>
                                <li class="list-group-item">วันที่รับเรื่อง : {{ isset($opinion->approved_at) ? $opinion->approved_at->format('d/m/Y') : 'ยังไม่มีวันที่รับเรื่อง' }}</li>
                                <li class="list-group-item">@if($opinion->approved == '1') <span class="badge bg-success">รับเรื่องโดย : {{ $opinion->user->name }}</span> @else <span class="badge bg-danger">ยังไม่มีการรับเรื่อง</span> @endif</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div> <!-- end card-box -->
        </div> <!-- end col -->


    </div>
    <!-- end row -->
</div>
@endsection
