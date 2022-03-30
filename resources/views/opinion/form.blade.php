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
                <h2>รับฟังความคิดเห็น</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li>รับฟังความคิดเห็น</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <div><i class="fas fa-table me-1"></i>ฟอร์มกรอกข้อมูล</div>
            </div>
            <div class="card-body">
                <div class="row">

                    <form class="row g-3" id="complaintFrom" complaint="form" method="POST"
                        action="{{ route('opinions.store') }}">
                        @csrf
                        <div class="col-md-8">
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="name" class="form-label">ชื่อ - นาสกุล</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="number" class="form-control form-control-sm @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ old('phone') }}">
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="email" class="form-label">อีเมลล์</label>
                                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror"
                                        id="email" name="email" value="{{ $personal->email ?? old('email') }}"
                                        autocomplete="email">
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="title" class="form-label">หัวแสดงความคิดเห็น</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('title') is-invalid @enderror"
                                        id="title" name="title" value="{{ old('title') }}">
                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="description" class="form-label">รายละเอียด</label>
                                    <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" id="description"
                                        name="description" rows="5">{{ old('description') }}</textarea>
                                    @error('description')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div style="margin-top:0px;" class="form-group{{ $errors->has('g-recaptcha-response') ? ' has-error' : '' }}">
                                <label class="form-label">Captcha</label>
                                <div class="mb-3">
                                    {!! app('captcha')->display() !!}
                                    @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block" role="alert">
                                        <strong class="text-danger">{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-12">
                    <button class="btn btn-danger text-white"
                        onclick="showLoading('กำลังเพิ่มข้อมูล...',document.getElementById('complaintFrom').id);">
                        <i class="fas fa-plus-circle"></i>
                        <span>ส่งข้อมูล</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
</main>
@endsection
@push('js')
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script src="{{ asset('js/admin-script.js') }}"></script>
@endpush
