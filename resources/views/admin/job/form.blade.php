@extends('layouts.admin.app')
@push('css')

@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Create Job</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mange Job</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างประกาศรับสมัครงาน</div>
            <a href="{{ route('app.jobs.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form class="row g-3" id="jobFrom" job="form" method="POST" action="{{ isset($job) ? route('app.jobs.update',$job->id) : route('app.jobs.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (isset($job))
                            @method('PUT')
                        @endif
                        <div class="col">
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="name" class="form-label">ชื่อเรื่อง</label>
                                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ $job->name ?? old('name') }}">
                                     @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="description" class="form-label">เนื้อหา</label>
                                    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description" rows="5">{{ $job->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="formFile" class="form-label">แนบไฟล์</label>
                                    <input class="form-control form-control-sm @error('file') is-invalid @enderror" type="file" id="formFile" name="file">
                                    @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" onclick="showLoading(@isset($job) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('jobFrom').id);">
                    @isset($job)
                    <i class="fas fa-arrow-circle-up"></i>
                    <span>อัฟเดท</span>
                    @else
                    <i class="fas fa-plus-circle"></i>
                    <span>สร้าง</span>
                    @endisset
                </button>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
@push('js')
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/admin-script.js') }}"></script>
@endpush

