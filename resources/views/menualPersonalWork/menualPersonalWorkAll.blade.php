@extends('layouts.home.app')
@push('css')
<style>
    .faq-box {
        border-radius: 3px;
        border: 0;
        box-shadow: 0px 2px 15px rgba(0, 0, 0, 0.1);
        margin-bottom: 30px;
    }
</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>คู่มือหรือมาตรฐานการปฏิบัติงานรายบุคคล</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li> คู่มือหรือมาตรฐานการปฏิบัติงานรายบุคคล</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= F.A.Q Section ======= -->
    <section id="faq" class="faq">
        <div class="container">
            <div class="faq-list">
                <ul>
                    @foreach ($menualPersonalWorks as $key => $menualPersonalWork)
                    <div class="faq-box">
                        <li data-aos="fade-up" data-aos-delay="100">
                            <i class="bx bx-help-circle icon-help"></i> <a data-bs-toggle="collapse"
                                data-bs-target="#faq-list-{{ $key }}" class="collapsed"><h5>{{ $menualPersonalWork->name }}</h5>
                                <i class="bx bx-chevron-down icon-show"></i><i class="bx bx-chevron-up icon-close"></i></a>
                            <div id="faq-list-{{ $key }}" class="collapse" data-bs-parent=".faq-list">
                                <ul class="faq-wrap-item-list mb-3">
                                    @if ($menualPersonalWork->menuPersonalWorks->isNotEmpty())
                                        @foreach ($menualPersonalWork->menuPersonalWorks as $menuPersonalWork)
                                        <li><a href="{{ route('menualPersonalWorkShow', $menuPersonalWork->slug) }}" class="text-dark"><i class="ri-check-double-line"></i>{{ $menuPersonalWork->name }}</a></li>
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
                                </ul>
                            </div>
                        </li>
                    </div>
                    @endforeach
                </ul>
            </div>

        </div>
    </section><!-- End F.A.Q Section -->

</main>
@endsection
