@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Create Banner</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mange Banner</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างรูปแบนเนอร์</div>
            <a href="{{ route('app.banners.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form class="row g-3" id="bannerFrom" banner="form" method="POST" action="{{ isset($banner) ? route('app.banners.update',$banner->id) : route('app.banners.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (isset($banner))
                            @method('PUT')
                        @endif
                        <div class="col">
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="name" class="form-label">ชื่อเรื่อง</label>
                                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ $banner->name ?? old('name') }}">
                                     @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label class="form-label" for="exampleFormControlTextarea1">เนื้อหา</label>
                                    <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5">{{ $banner->description ?? old('description') }}</textarea>
                                    @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col mb-3">
                                    <label for="inputType" class="form-label">ประเภท</label>
                                    <select id="inputState" class="form-select @error('banners') is-invalid @enderror" name="banners">
                                        <option value="" selected>Choose...</option>
                                        <option value="carousel" @if(isset($banner)) {{ $banner->banners == 'carousel' ? 'selected' : '' }} @else {{ old('banners') == 'carousel' ? 'selected':'' }}  @endif>แบนเนอร์สไลด์</option>
                                        <option value="content" @if(isset($banner)) {{ $banner->banners == 'content' ? 'selected' : '' }} @else {{ old('banners') == 'content' ? 'selected':'' }}  @endif>คอนเทนต์ส่วนล่าง</option>
                                        <option value="content2" @if(isset($banner)) {{ $banner->banners == 'content2' ? 'selected' : '' }} @else {{ old('banners') == 'content2' ? 'selected':'' }}  @endif>คอนเทนต์ส่วนบน</option>
                                    </select>
                                    @error('banners')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col">
                                    <div class="col mb-3 form-group">
                                        <label for="url" class="form-label">ลิ้ง URL</label>
                                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ $banner->url ?? old('url') }}" autofocus>
                                        @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="">
                                    <div class="form-group blog-images">
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:"><use xlink:href="#exclamation-triangle-fill"/></svg>
                                            <div>
                                              แนะนำ : Carousel ขนาด 1170x400 Pixel | Conent ขนาด 750x180 Pixel
                                            </div>
                                          </div>
                                        <div class="custom-file">
                                            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                <label>อัฟโหลดไฟล์<a href="javascript:void(0)" class="custom-file-container__image-clear"
                                                title="Clear Image">&times;</a></label>
                                                <label class="custom-file-container__custom-file custom-file">
                                                    <input type="file"
                                                        class="form-control custom-file-container__custom-file__custom-file-input custom-file-input @error('file') is-invalid @enderror"
                                                        id="validatedCustomFile" name="file" aria-label="Choose File" />
                                                    <span class="custom-file-container__custom-file__custom-file-control custom-file-label"></span>
                                                    @error('file')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </label>
                                                <div class="custom-file-container__image-preview"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md mb-3">
                            <label for="inputState" class="form-label">สถานะ</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" @isset($banner) {{ $banner->status == true ? 'checked' : '' }} @endisset>
                                <label class="form-check-label" for="status">เปิดการใช้งาน</label>
                                @error('status')
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
                <button class="btn btn-primary" onclick="showLoading(@isset($banner) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('bannerFrom').id);">
                    @isset($banner)
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
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script>
        var upload = new FileUploadWithPreview("myUniqueUploadId", {
            showDeleteButtonOnImages: true,
            text: {
                chooseFile: "Choose file...",
                browse: "Browse",
                selectedCount: "Custom Files Selected Copy",
            },
            @isset($banner->file)
                presetFiles: [
                    "{{ asset('storage/banner_files') }}/{{ $banner->file }}",
                    // `/public/storage/avatar/${userImage.avatar}`
                ],
            @endisset
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
    </script>
@endpush

