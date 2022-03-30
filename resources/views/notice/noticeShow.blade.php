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
    }

    .card-title {
        font-weight: 700;
        text-align: center;
    }

    .card-title a {
        color: #743e1d;
    }

    .card-title a:hover {
        color: #d9232d;
    }

    .card-text {
        color: #5e5e5e;
    }

    .card:hover .card-icon i {
        background: #fff;
        color: #d9232d;
    }

</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">

            <div class="d-flex justify-content-between align-items-center">
                <h2>ประชาสัมพันธ์</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                     <li><a href="{{ route('noticeAll') }}">ประชาสัมพันธ์ทั้งหมด</a></li>
                    <li>ประชาสัมพันธ์</li>
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
                <h5 class="card-title">{{ $notice->name }}</h5>
                <p class="card-text p-3">{{ $notice->description }}</p>
                @if (empty($notice->file))
                    <div class="mb-2" align="center">
                        <h5><span class="badge bg-danger">ไม่มีเอกสารแนบ</span></h5>
                    </div>
                @else
                <iframe class="vh-100" style="height: 100%" height="100%" width=100% src="{{ asset('storage/notice_files/'.$notice->file) }}"></iframe>
                @endif

              </div>
            </div>
        </div>
    </div>
</section>
</main>
@endsection
