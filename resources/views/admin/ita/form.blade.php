@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
<link rel="stylesheet" type="text/css"
    href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Legislation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการหัวข้อ ITA</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างหัวข้อ ITA</div>
            <a href="{{ route('app.ita.index') }}" type="button" class="btn btn-danger"><i
                    class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <form class="row g-3" id="ITAFrom" ita="form" method="POST" action="{{ isset($ita) ? route('app.ita.update',$ita->id) : route('app.ita.store') }}" enctype="multipart/form-data">
                @csrf
                @if (isset($ita))
                    @method('PUT')
                @endif
                <div class="row g-2">
                    <div class="col-md-6 mb-2">
                        <div class="form-check @error('isParent') is-invalid @enderror">
                            <input class="form-check-input" type="checkbox" id="isParent" name="isParent" @isset($ita) {{ $ita->parent_id == true ? 'checked' : '' }} @else {{ old('isParent') ? 'checked' : '' }} @endisset>
                            <label class="form-check-label" for="flexCheckDefault">
                                เป็นหัวข้อย่อย
                            </label>
                        </div>
                    </div>
                </div>
                 <div class="row g-2 d-none" id="parent_box">
                    <div class="col-md-6 mb-3">
                        <label for="inputState" class="form-label">หัวข้อหลัก</label>
                        <select id="parent_id" class="form-select @error('parent_id') is-invalid @enderror" name="parent_id">
                            <option value="" selected>Choose...</option>
                            @foreach ($ita_categories as $key=>$ita_category )
                            <option value="{{ $ita_category->id }}" @if(isset($ita))
                                {{ $ita->parent_id == $ita_category->id ? 'selected' : '' }} @else
                                {{ (collect(old('parent_id'))->contains($ita_category->id)) ? 'selected':'' }} @endif>
                                {{ $ita_category->name }}</option>
                            @endforeach
                        </select>
                        @error('parent_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="col mb-3 form-group">
                            <label for="name" class="form-label">ชื่อหัวข้อ ITA</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $ita->name ?? old('name') }}" autocomplete="name"
                                autofocus>
                            @error('name')
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
                            <label for="url" class="form-label">ลิ้ง URL</label>
                            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ $ita->url ?? old('url') }}" autofocus>
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
                            <label for="formFileSm" class="form-label">@if(isset($ita->file))แนบไฟล์ใหม่ @else แนบไฟล์ @endif</label>
                            <input class="form-control form-control-sm @error('file') is-invalid @enderror" id="formFileSm" type="file" name="file">
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
               
                <div class="row g-2">
                    <div class="col-md-6 mb-3">
                        <label for="inputState" class="form-label">สถานะ</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="status" name="status" @isset($ita) {{ $ita->status == true ? 'checked' : '' }} @endisset>
                            <label class="form-check-label" for="status">เปิดใช้งาน</label>
                            @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>
                </div>
            </form>
            @if (isset($ita->file))
            <div class="row g-3">
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="col mb-3 form-group">
                            <a class="btn btn-secondary btn-sm rounded-2" style="margin-left:3px;" type="button" href="{{ route('app.ita.show',$ita->id) }}" target="_blank">{{ $ita->file }}</a>
                            <span> 
                                <a class="btn btn-danger btn-sm" type="button" onclick="deleteData({{ $ita->id }})"><i class="fa fa-trash"></i></a>
                                <form id="delete-form-{{ $ita->id }}" action="{{ route('app.ita.deleteFile',$ita->id) }}" method="POST" style="display: none;">
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
                <button class="btn btn-primary"
                    onclick="showLoading(@isset($ita) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('ITAFrom').id);">
                    @isset($ita)
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
    <script type="text/javascript">
    $(document).ready(function() {
        $('#isParent').change(function(){
            if ($(this).is(':checked')){
                $('#parent_box').removeClass('d-none');
            }else{
                $('#parent_box').addClass('d-none');
                $('#parent_id').val(null);
            }     
        });
        if($('#isParent').is(':checked')) {
            $('#isParent').change();
        }
    });
    </script>
    @endpush
