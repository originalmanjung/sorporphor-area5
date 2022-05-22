@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Standard Services</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">คู่มือ/มาตรฐานการให้บริการสถิติการให้บริการและรายงานพึงพอใจ</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>
                @if(isset($standardServiceParent))
                    {{ $standardServiceParent->name  }}
                @elseif(isset($standardService->parent))
                    {{ $standardService->parent->name  }}
                @else
                    สร้างหัวข้อหลัก
                @endif
            </div>
            <a href="
            @if(isset($standardServiceParent)){{ route('app.standardServices.show', $standardServiceParent->id ?? $standardServiceParent->parent_id)}}@elseif(isset($standardService->parent_id)){{ route('app.standardServices.show', $standardService->parent_id)}}@else{{ route('app.standardServices.index') }}@endisset" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <form class="row g-3" id="standardServiceForm" ita="form" method="POST" action="{{ isset($standardService) ? route('app.standardServices.update',$standardService->id) : route('app.standardServices.store') }}" enctype="multipart/form-data">
                @csrf
                @if (isset($standardService))
                    @method('PUT')
                @endif
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="col mb-3 form-group">
                            <label for="name" class="form-label">ชื่อหัวข้อ</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $standardService->name ?? old('name') }}" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @if(!empty($standardServiceParent->parent_id) || !empty($standardService->parent->parent_id))
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="col mb-3 form-group">
                                <label for="formFileSm" class="form-label">แนบไฟล์</label>
                                <input class="form-control form-control-sm @error('file') is-invalid @enderror" type="file" name="file">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input class="form-check-input d-none" type="checkbox" name="checkFile" checked>
                @endif
                @if(!empty($standardServiceParent) || !empty($standardService))
                    <input name="parent_id" type="hidden" value="{{ $standardServiceParent->id ?? $standardService->parent_id }}">
                @endif
            </form>
            <div class="col-12">
                <button class="btn btn-primary" onclick="showLoading(@isset($standardService) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('standardServiceForm').id);">
                    @isset($standardService)
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
</div>
@include('sweetalert::alert')
@endsection
@push('js')
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script src="{{ asset('js/admin-script.js') }}"></script>
@endpush
