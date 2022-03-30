@extends('layouts.home.app')
@push('css')
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>วิสัยทัศน์ พันธกิจ</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li>วิสัยทัศน์ พันธกิจ</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section>
        <div class="container">
            <div class="row content">
                <div class="col-lg-12">
                   @if ($missions->isNotEmpty())
                        @foreach ($missions as $mission)
                        <div class="card-body">
                            <h5 class="card-title">{{ $mission->name }}</h5>
                            <p class="card-text">{!! $mission->description !!}</p>
                        </div>
                        @endforeach
                   @else
                        <div class="card text-center border border-1 mt-4">
                            <div class="card-header">
                                Notification
                            </div>
                            <div class="card-body">
                                <p class="card-text">No information was found at this time.</p>
                            </div>
                        </div>
                   @endif
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
</main>
@endsection
