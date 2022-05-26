@extends('layouts.admin.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Create Letter</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mange Letter</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างจดหมายข่าว</div>
            <a href="{{ route('app.letters.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form class="row g-3" id="letterFrom" letter="form" method="POST" action="{{ isset($letter) ? route('app.letters.update',$letter->id) : route('app.letters.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (isset($letter))
                        @method('PUT')
                        @endif
                        <div class="col">
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="name" class="form-label">ชื่อเรื่อง</label>
                                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ $letter->name ?? old('name') }}">
                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="inputType" class="form-label">ประเภท</label>
                                    <select id="inputState" class="form-select @error('type') is-invalid @enderror" name="type">
                                        <option value="" selected>Choose...</option>
                                        <option value="region" @if(isset($letter)) {{ $letter->type == 'region' ? 'selected' : '' }} @else {{ old('type') == 'region' ? 'selected':'' }} @endif>จดหมายข่าว สพป.</option>
                                        <option value="district" @if(isset($letter)) {{ $letter->type == 'district' ? 'selected' : '' }} @else {{ old('type') == 'district' ? 'selected':'' }} @endif>จดหมายข่าวโรงเรียน</option>
                                    </select>
                                    @error('type')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="">
                                    <div class="form-group blog-images">
                                        <div class="alert alert-danger d-flex align-items-center" role="alert">
                                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                                <use xlink:href="#exclamation-triangle-fill" /></svg>
                                            <div>
                                                แนะนำ : Carousel ขนาด 1920x1128 Pixel | Conent ขนาด 750x180 Pixel
                                            </div>
                                        </div>
                                        <div class="custom-file">
                                            <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                                <label>อัฟโหลดไฟล์<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                                                <label class="custom-file-container__custom-file custom-file">
                                                    <input type="file" class="form-control custom-file-container__custom-file__custom-file-input custom-file-input @error('file') is-invalid @enderror" id="validatedCustomFile" name="file" aria-label="Choose File" />
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
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" onclick="showLoading(@isset($letter) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('letterFrom').id);">
                    @isset($letter)
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
            showDeleteButtonOnImages: true
            , text: {
                chooseFile: "Choose file..."
                , browse: "Browse"
                , selectedCount: "Custom Files Selected Copy"
            , }
            , @isset($letter->file)
            presetFiles: [
                "{{ asset('storage/letter_files') }}/{{ $letter->file }}",
                // `/public/storage/avatar/${userImage.avatar}`
            ]
            , @endisset
        });

    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".fancybox").fancybox({
                openEffect: "none"
                , closeEffect: "none"
            });
        });

    </script>
    @endpush
