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
                <h2>งบทดลอง</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li>งบทดลอง ทั้งหมด</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

   <section>
    <div class="container">
        <div class="row">
        @if ($budgets->isNotEmpty())
             @foreach ($budgets as $budget)
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $budget->name }}</h5>
                        <p class="card-text">{{ Str::limit($budget->description, 150) }}</p>
                        <div class="d-flex align-items-center">
                            <a href="{{ route('budgetShow', $budget->slug) }}"
                                class="btn btn-danger btn-sm text-white me-auto">ดูเพิ่มเติม</a>
                            <h6>ผู้โพส: <span class="badge bg-secondary">{{ $budget->user->name }}</span></h6>
                        </div>
                        <div class="d-flex justify-content-end">
                            <p>{{ $budget->created_at->format('d/m/Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

            {{ $budgets->links('vendor.pagination.custom') }}
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
