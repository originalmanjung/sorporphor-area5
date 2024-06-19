@extends('layouts.frontend.app')
@push('css')
<style>
    /*---------------------
    Services
    -----------------------*/

    .services {
        padding-bottom: 70px;
    }
    .services a {
        color: #30a42a;
    }

    .services .section-title span {
        color: #13a2b7;
    }

    .services .section-title h2 {
        color: #ffffff;
    }

    .services__btn {
        text-align: right;
    }

    .services__btn .primary-btn {
        color: #ffffff;
    }

    .services__item {
        background: #ffffff;
        padding: 5px 15px;
        margin-bottom: 10px;
        border-radius: 5px;
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
    }

    .services__item:hover {
        background: #30a42a;
    }

    .services__item:hover .services__item__icon span {
        color: #ffffff;
    }

    .services__item:hover .services__item__text h5 {
        color: #ffffff;
    }

    .services__item:hover .services__item__text p {
        color: #ffffff;
    }

    .services__item__icon {
        float: left;
        margin-right: 40px;
    }

    .services__item__icon span {
        color: #30a42a;
        font-size: 40px;
        display: inline-block;
        line-height: 76px;
        -webkit-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .services__item__icon span:before {
        font-size: 70px;
    }

    .services__item__text {
        overflow: hidden;
    }

    .services__item__text h5 {
        font-size: 18px;
        color: #111111;
        font-weight: 600;
        margin-bottom: 14px;
        -webkit-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
    }

    .services__item__text p {
        margin-bottom: 0;
        -webkit-transition: all, 0.3s;
        -o-transition: all, 0.3s;
        transition: all, 0.3s;
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
                        <h2 style="font-size:3vw;">การดำเนินงานเพื่อป้องกันการทุจริต</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Services Section Begin -->
    <section class="services spad set-bg mt-5">
        <div class="container">
            <div class="row">
            @if ($corruptions->isNotEmpty())
                @foreach ($corruptions as $corruption)
                <div class="col-lg-4 col-md-4 mb-4">
                    <a href="{{ route('corruptionShow',$corruption) }}">
                        <div class="services__item d-flex align-items-center h-100">
                            <div class="services__item__icon">
                                <span><i class="fas fa-fist-raised"></i></span>
                            </div>
                            <div class="services__item__text">
                            <p style="font-size:14px;">การดำเนินงานเพื่อป้องกันการทุจริต</p>
                            <h5>{{ $corruption->name }}</h5>

                            </div>
                        </div>
                    </a>
                </div>
                @endforeach
            @else
                <div class="col-12">
                    <div class="card text-center border border-1 mt-4 mb-4">
                        <div class="card-header">
                            Notification
                        </div>
                        <div class="card-body">
                            <p class="card-text">No information was found at this time.</p>
                        </div>
                    </div>
                </div>
            @endif

            </div>
        </div>
    </section>
    <!-- Services Section End -->
</main>
@endsection
