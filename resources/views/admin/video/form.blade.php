@extends('layouts.admin.app')
@push('css')
<link href="{{ asset('home/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Create Video Link</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mange Video Link</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างลิ้งวีดีโอ</div>
            <a href="{{ route('app.videos.index') }}" type="button" class="btn btn-danger"><i
                    class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form class="row g-3" id="videoFrom" video="form" method="POST"
                        action="{{ isset($video) ? route('app.videos.update',$video->id) : route('app.videos.store') }}"
                        enctype="multipart/form-data">
                        @csrf
                        @if (isset($video))
                        @method('PUT')
                        @endif
                        <div class="col">
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="name" class="form-label">ชื่อเรื่อง</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('name') is-invalid @enderror"
                                        id="name" name="name" value="{{ $video->name ?? old('name') }}">
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
                                    <textarea class="form-control @error('description') is-invalid @enderror"
                                        id="description" name="description"
                                        rows="5">{{ $video->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="formFileSm" class="form-label">อัฟโหลดภาพหน้าปกวีดีโอ <span class="badge bg-danger">ขนาดไฟล์ที่แนะนำ: 800x600 px</span>
                                    </label>
                                    <input class="form-control form-control-sm @error('file') is-invalid @enderror" id="formFileSm" type="file" name="file">
                                    @error('file')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="url" class="form-label">Link URL Video</label>
                                    <input type="text"
                                        class="form-control form-control-sm @error('url') is-invalid @enderror" id="url"
                                        name="url" value="{{ $video->url ?? old('url') }}">
                                    @error('url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                </div>
                </form>
                @if (!empty($video->url))
                <div class="col-md-5">
                    <div class="g-3">
                        <label for="url" class="form-label"><span class="badge bg-danger">ตัวอย่างไฟล์ที่อัฟโหลด</span></label>
                        <div class="col mb-3 form-group">
                            <a class="glightbox" href="{{ $video->url }}">
                                <img src="{{ asset('storage/video_photos/'.$video->filename) }}" alt="" class="img-fluid card-img-top rounded">
                            </a>
                        </div>
                    </div>
                </div>
                @endif
                <div class="col-12">
                    <button class="btn btn-primary"
                        onclick="showLoading(@isset($video) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('videoFrom').id);">
                        @isset($video)
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
</div>
@include('sweetalert::alert')
@endsection
@push('js')
<script src="{{ asset('home/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script src="{{ asset('js/admin-script.js') }}"></script>
<script type="text/javascript">
    const lightbox = GLightbox({
        touchNavigation: true,
        loop: true,
        autoplayVideos: true
    });
</script>
@endpush
