@extends('layouts.home.app')
@push('css')
<style>


</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Q&A</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li><a href="{{ route('questions.index') }}">Q&A ทั้งหมด</a></li>
                    <li>Q&A</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <section>
        <div class="container">
            <div class="col-md-9 mx-auto">
                <div class="card">
                    <div class="card-header">
                        ถาม - ตอบ Q&A
                    </div>
                    <div class="card-body p-5">
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="badge bg-success form-label fs-5">หัวข้อเรื่อง:</label>
                        <p class="card-text fs-5">{{ $question->title }}</p>
                    </div>
                    <div class="mb-3">
                        <label for="exampleFormControlInput1" class="badge bg-secondary form-label fs-5">เนื้อหา:</label>
                        <p class="card-text fs-5">{{ $question->description }}</p>
                    </div>
                    <hr>
                    
                        @comments([
                        'model' => $question,
                        'perPage' => 5
                        ])
                    </div>
                </div>
            </div>
        </div>
    </section>
    @include('sweetalert::alert')
</main>
@endsection
@push('js')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script src="{{ asset('js/admin-script.js') }}"></script>
@endpush
