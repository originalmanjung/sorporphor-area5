@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Legislation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการหัวข้อ ITA3</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างหัวข้อ ITA</div>
            <a href="@if (isset($intergrity)){{ redirect()->getUrlGenerator()->previous() }}@else {{ route('app.intergrities.index') }} @endif" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <form class="row g-3" id="ITAFrom" ita="form" method="POST" action="{{ isset($intergrity) ? route('app.intergrities.update',$intergrity->id) : route('app.intergrities.store') }}" enctype="multipart/form-data">
                @csrf
                @if (isset($intergrity))
                    @method('PUT')
                @endif
                @isset($intergrity->parent)
                <div class="row g-2">
                    <div class="col-md-6 mb-2">
                        <label for="name" class="form-label">ลำดับหัวข้อ ทั้งหมด</label>
                        @include('admin.intergrity.parentNameList', ['mainParent' => $intergrity->parent])
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
                            <label for="name" class="form-label">ชื่อหัวข้อ ITA</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $intergrity->name ?? old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
                @isset($intergrity)
                    @if($intergrity->parent_id != null)
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="col mb-3 form-group">
                                    <label for="url" class="form-label">ลิ้ง URL</label>
                                    <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ $intergrity->url ?? old('url') }}" autofocus>
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="row g-2">
                            <div class="col-md-6">
                                <div class="col mb-3 form-group">
                                    <label for="formFileSm" class="form-label">@if(isset($intergrity->file))แนบไฟล์ใหม่ @else แนบไฟล์ @endif</label>
                                    <input class="form-control form-control-sm @error('file') is-invalid @enderror" id="formFileSm" type="file" name="file">
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        @endif
                @endisset
            </form>
            @if (isset($intergrity->file))
            <div class="row g-3">
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="col mb-3 form-group">
                            <a class="btn btn-secondary btn-sm rounded-2" style="margin-left:3px;" type="button" href="{{ route('app.intergrities.show',$intergrity->id) }}" target="_blank">{{ $intergrity->file }}</a>
                            <span>
                                <a class="btn btn-danger btn-sm" type="button" onclick="deleteData({{ $intergrity->id }})"><i class="fa fa-trash"></i></a>
                                <form id="delete-form-{{ $intergrity->id }}" action="{{ route('app.intergrities.deleteFile',$intergrity) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </span>

                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-12">
                <button class="btn btn-primary" onclick="showLoading(@isset($intergrity) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('ITAFrom').id);">
                    @isset($intergrity)
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
<script>
    @if($errors->isNotEmpty())
            Swal.fire({
                icon: 'error',
                title: 'Errors',
                @foreach ($errors->all() as $error)
                text: '{{ $error }}',
                @endforeach
                footer: '<a href="">Why do I have this issue?</a>'
            })
    @endisset
</script>
@endpush
