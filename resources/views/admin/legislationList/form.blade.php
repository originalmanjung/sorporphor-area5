@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css"
    media="screen">
<link rel="stylesheet" type="text/css"
    href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Legislation Lists</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการหัวข้อ OTA</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างหัวข้อ OTA</div>
            <a href="{{ route('app.legislationLists.index') }}" type="button" class="btn btn-danger"><i
                    class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <form class="row g-3" id="legislationListFrom" user="form" method="POST"
                action="{{ isset($legislationList) ? route('app.legislationLists.update',$legislationList->id) : route('app.legislationLists.store') }}">
                @csrf
                @if (isset($legislationList))
                    @method('PUT')
                @endif
                <div class="row g-2">
                    <div class="col-md-6">
                        <div class="col mb-3 form-group">
                            <label for="name" class="form-label">ชื่อหัวข้อ OTA</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                                name="name" value="{{ $legislationList->name ?? old('name') }}" autocomplete="name"
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
                    <div class="col-md-6 mb-3">
                        <label for="inputState" class="form-label">สิทธิ์</label>
                        <select id="inputState" class="form-select @error('role_id') is-invalid @enderror" name="role_id">
                            <option value="" selected>Choose...</option>
                            @foreach ($roles as $key=>$role )
                            <option value="{{ $role->id }}" @if(isset($legislationList))
                                {{ $legislationList->role->id == $role->id ? 'selected' : '' }} @else
                                {{ (collect(old('role_id'))->contains($role->id)) ? 'selected':'' }} @endif>
                                {{ $role->name }}</option>
                            @endforeach
                        </select>
                        @error('role_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>
                <div class="row g-2">
                    <div class="col-md-6 mb-3">
                        <label for="inputState" class="form-label">สถานะ</label>
                        <div class="form-check form-switch">
                            <input class="form-check-input" type="checkbox" id="status" name="status" @isset($legislationList) {{ $legislationList->status == true ? 'checked' : '' }} @endisset>
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
            <div class="col-12">
                <button class="btn btn-primary"
                    onclick="showLoading(@isset($legislationList) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('legislationListFrom').id);">
                    @isset($legislationList)
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
