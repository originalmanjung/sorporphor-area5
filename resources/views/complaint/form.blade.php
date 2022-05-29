@extends('layouts.frontend.app')
@push('css')
<style>


</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>ช่องทางแจ้งเรื่องร้องเรียนการทุจริตและประพฤติมิชอบ</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container mb-5">
        <div class="card mt-5">
            <div class="card-header">
                <div><i class="fas fa-table me-1"></i> ฟอร์มกรอกข้อมูล</div>
            </div>
            <div class="card-body">
                <form id="complaintFrom" complaint="form" method="POST" action="{{ route('complaints.store') }}" enctype="multipart/form-data">
                    @csrf

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="name" class="form-label">ชื่อ - นาสกุล</label>
                            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="idCardnumber" class="form-label">เลขบัตรประชาชน</label>
                            <input type="number" class="form-control form-control-sm @error('idCardnumber') is-invalid @enderror" id="idCardnumber" name="idCardnumber" value="{{ old('idCardnumber') }}">
                            @error('idCardnumber')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="email" class="form-label">อีเมลล์</label>
                            <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ $personal->email ?? old('email') }}" autocomplete="email">
                            @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="title" class="form-label">หัวข้อร้องเรียน</label>
                            <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <div class="mb-3">
                                <label for="description" class="form-label">ข้อมูลและรายละเอียดของเรื่องที่ร้องเรียน</label>
                                <textarea class="form-control form-control-sm @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ old('description') }}</textarea>
                                @error('description')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group col-md-6">
                            <label for="address" class="form-label">ที่อยู่</label>
                            <textarea class="form-control form-control-sm @error('address') is-invalid @enderror" id="address" name="address" rows="5">{{ $complaint->address ?? old('address') }}</textarea>
                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-6">
                            <label for="formFile" class="form-label">แนบไฟล์</label>
                            <input class="form-control form-control-sm @error('file') is-invalid @enderror" type="file" id="formFile" name="file">
                            @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
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
            </div>

            </form>

            <div class="col-12 mb-5">
                <button class="btn btn-primary text-white" onclick="showLoading('กำลังเพิ่มข้อมูล...',document.getElementById('complaintFrom').id);">
                    <i class="fas fa-plus-circle"></i>
                    <span>ส่งข้อมูล</span>
                </button>
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
