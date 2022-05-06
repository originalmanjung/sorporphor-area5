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

    iframe {
        margin-bottom: -70px;
    }
</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>ยุธศาสตร์ แผนปฏิบัติราชการ</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li>ยุธศาสตร์ แผนปฏิบัติราชการ</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->
        <!-- ======= F.A.Q Section ======= -->
       <section id="faq" class="faq section-bg">
            <div class="container">
               @if($intergrityPlanelwork->isEmpty()) 
                <div class="card text-center border border-1">
                    <div class="card-header">
                        Notification
                    </div>
                    <div class="card-body">
                        <p class="card-text">No information was found at this time.</p>
                    </div>
                </div>
                @else
                <div class="row row-cols-1 row-cols-md-2 g-4">
                        @foreach ($intergrityPlanelwork as $key => $intergrity)
                            @if($intergrity->children->isEmpty())
                                <div class="card text-center border border-1">
                                    <div class="card-header">
                                        Notification
                                    </div>
                                    <div class="card-body">
                                        <p class="card-text">No information was found at this time.</p>
                                    </div>
                                </div>
                            @else
                                @foreach ($intergrity->children as $child)
                                    @include('intergrity-plane-menual.intergritySub', ['subChild' => $child])
                                @endforeach
                            @endif
                        @endforeach
                    </div>
                @endif
            </div>
        </section><!-- End F.A.Q Section -->
</main>
@endsection
