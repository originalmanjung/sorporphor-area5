@extends('layouts.admin.app')
@push('css')
<style>
    body {
        margin-top: 20px;
        color: #1a202c;
        text-align: left;
    }

    .main-body {
        padding: 15px;
    }

    .card {
        box-shadow: 0 1px 3px 0 rgba(0, 0, 0, .1), 0 1px 2px 0 rgba(0, 0, 0, .06);
    }

    .card {
        position: relative;
        display: flex;
        flex-direction: column;
        min-width: 0;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border: 0 solid rgba(0, 0, 0, .125);
        border-radius: .25rem;
    }

    .card-body {
        flex: 1 1 auto;
        min-height: 1px;
        padding: 1rem;
    }

    .gutters-sm {
        margin-right: -8px;
        margin-left: -8px;
    }

    .gutters-sm>.col,
    .gutters-sm>[class*=col-] {
        padding-right: 8px;
        padding-left: 8px;
    }

    .mb-3,
    .my-3 {
        margin-bottom: 1rem !important;
    }

    .bg-gray-300 {
        background-color: #e2e8f0;
    }

    .h-100 {
        height: 100% !important;
    }

    .shadow-none {
        box-shadow: none !important;
    }
    a {
        text-decoration: none;
    }
</style>
@endpush
@section('content')
<div class="main-body">
    <div class="row gutters-sm">
        <div class="col-md-4 mb-3">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex flex-column align-items-center text-center">
                        <img src="@if(isset($personal->avatar)) {{ asset('storage/personal_avatars/'. $personal->avatar) }}  @else {{ config('app.placeholder').'600x600.png' }}@endif" alt="Admin" class="rounded-circle" width="150" height="150">
                        <div class="mt-3">
                            <h4>{{ $personal->name }}</h4>
                            <p class="text-secondary mb-1">{{ $personal->position }}</p>
                            <p class="text-muted font-size-sm">{{ $personal->role->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card mt-3">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-twitter mr-2 icon-inline text-info">
                                <path
                                    d="M23 3a10.9 10.9 0 0 1-3.14 1.53 4.48 4.48 0 0 0-7.86 3v1A10.66 10.66 0 0 1 3 4s-4 9 5 13a11.64 11.64 0 0 1-7 2c9 5 20 0 20-11.5a4.5 4.5 0 0 0-.08-.83A7.72 7.72 0 0 0 23 3z">
                                </path>
                            </svg>Twitter</h6>
                        <span class="text-secondary"><a class="text-muted" href="{{ $personal->twitter }}">{{ $personal->twitter ?? 'ยังไม่ได้กำหนด' }}</a></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-instagram mr-2 icon-inline text-danger">
                                <rect x="2" y="2" width="20" height="20" rx="5" ry="5"></rect>
                                <path d="M16 11.37A4 4 0 1 1 12.63 8 4 4 0 0 1 16 11.37z"></path>
                                <line x1="17.5" y1="6.5" x2="17.51" y2="6.5"></line>
                            </svg>Instagram</h6>
                        <span class="text-secondary"><a class="text-muted" href="{{ $personal->instagram }}">{{ $personal->instagram ?? 'ยังไม่ได้กำหนด' }}</a></span>
                    </li>
                    <li class="list-group-item d-flex justify-content-between align-items-center flex-wrap">
                        <h6 class="mb-0"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-facebook mr-2 icon-inline text-primary">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"></path>
                            </svg>Facebook</h6>
                        <span class="text-secondary"><a class="text-muted" href="{{ $personal->facebook }}">{{ $personal->facebook ?? 'ยังไม่ได้กำหนด' }}</a></span>
                    </li>
                </ul>
            </div>
            <a href="{{ route('app.personals.index') }}" type="button" class="btn btn-danger d-block mt-3"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="col-md-8">
            <div class="card mb-3">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ชื่อ - นามสกุล</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $personal->name ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">อีเมลล์</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $personal->email ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">เบอร์โทรศัพท์</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $personal->phone ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">วันเกิด</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $personal->birthday ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ตำแหน่ง</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $personal->position ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">Position General</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                            {{ $personal->position_general ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ระดับ</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">

                                {{ $personal->level ?? 'ยังไม่ได้กำหนด' }}

                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ขั้น</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                                {{ $personal->layer ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">กลุ่มงาน</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                                {{ $personal->legislationCategory->name ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                     <div class="row">
                        <div class="col-sm-3">
                            <h6 class="mb-0">ประเภท</h6>
                        </div>
                        <div class="col-sm-9 text-secondary">
                                {{ $personal->personal_type ?? 'ยังไม่ได้กำหนด' }}
                        </div>
                    </div>
                    <hr>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
