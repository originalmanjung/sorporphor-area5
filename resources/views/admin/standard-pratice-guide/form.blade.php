@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Standard Pratice Guide</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">คู่มือมาตรฐานการปฏิบัติงาน</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างคู่มือมาตรฐานการปฏิบัติงาน</div>
            <a href="@if (isset($standardPraticeGuide->parent_id)){{ route('app.standardPraticeGuides.show',$standardPraticeGuide->parent_id) }} @elseif(isset($standardPraticeGuideParent)) {{ route('app.standardPraticeGuides.show',$standardPraticeGuideParent->id) }} @else {{ route('app.standardPraticeGuides.index') }} @endif" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <form class="row g-3" id="standardPraticeGuideForm" ita="form" method="POST" action="{{ isset($standardPraticeGuide) ? route('app.standardPraticeGuides.update',$standardPraticeGuide->id) : route('app.standardPraticeGuides.store') }}" enctype="multipart/form-data">
                @csrf
                @if (isset($standardPraticeGuide))
                    @method('PUT')
                @endif
                @isset($standardPraticeGuide->parent)
                <div class="row g-2">
                    <div class="col-md-6 mb-2">
                        <label for="name" class="form-label">ลำดับหัวข้อ ทั้งหมด</label>
                    </div>
                </div>
                @endisset
                @if ($errors->any())
                    <div id="displayErrors" class="alert alert-danger d-none">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="col mb-3 form-group">
                            <label for="name" class="form-label">ชื่อกลุ่ม</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $standardPraticeGuide->name ?? old('name') }}" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @if(!empty($standardPraticeGuideParent) || !empty($standardPraticeGuide->parent_id))
                    <div class="row g-2">
                        <div class="col-md-6">
                            <div class="col mb-3 form-group">
                                <label for="formFileSm" class="form-label">@if(isset($standardPraticeGuide->file))แนบไฟล์ใหม่ @else แนบไฟล์ @endif</label>
                                <input class="form-control form-control-sm @error('file') is-invalid @enderror" id="formFileSm" type="file" name="file">
                                @error('file')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <input name="parent_id" type="hidden" value="{{ $standardPraticeGuideParent->id ?? $standardPraticeGuide->parent_id }}">
                @endif
            </form>
            <div class="col-12">
                <button class="btn btn-primary" onclick="showLoading(@isset($standardPraticeGuide) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('standardPraticeGuideForm').id);">
                    @isset($standardPraticeGuide)
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
