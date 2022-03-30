@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
    <style>
        .custom-file-container {
            margin-top: 3px;
        }
        .custom-file-container__custom-file__custom-file-control {
            border: 1px solid #ced4da;
        }
        .gallery{
            display: inline-block;
            margin-top: 20px;
        }
        .close-icon{
            border-radius: 50%;
            position: absolute;
            right: 5px;
            top: -10px;
            padding: 5px 8px;
        }
        .form-image-upload{
            background: #e8e8e8 none repeat scroll 0 0;
            padding: 15px;
        }

        .image-area {
        position: relative;


        }
        .image-area img{
            border-radius: 13.25% !important;
        }
        .remove-image {
        display: none;
        position: absolute;
        top: -10px;
        right: -10px;
        border-radius: 10em;
        padding: 2px 6px 3px;
        text-decoration: none;
        font: 700 21px/20px sans-serif;
        background: #555;
        border: 3px solid #fff;
        color: #FFF;
        box-shadow: 0 2px 6px rgba(0,0,0,0.5), inset 0 2px 4px rgba(0,0,0,0.3);
        text-shadow: 0 1px 2px rgba(0,0,0,0.5);
        -webkit-transition: background 0.5s;
        transition: background 0.5s;
        }
        .remove-image:hover {
        background: #E54E4E;
        padding: 3px 7px 5px;
        top: -11px;
        right: -11px;
        cursor: pointer;
        }
        .remove-image:active {
        background: #E54E4E;
        top: -10px;
        right: -11px;
        }
    </style>
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">News</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการข่าว</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างข่าว</div>
            <a href="{{ route('app.news.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <form class="row g-3" id="newsFrom" user="form" method="POST" action="{{ isset($news) ? route('app.news.update',$news->id) : route('app.news.store') }}" enctype="multipart/form-data">
                @csrf
                @if (isset($news))
                    @method('PUT')
                @endif
                <div class="col-md-6">
                    <div class="col mb-3 form-group">
                        <label for="title" class="form-label">ชื่อเรื่อง</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ $news->title ?? old('title') }}" autocomplete="title" autofocus>
                        @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="col mb-3 form-group">
                        <label for="exampleFormControlTextarea1">เนื้อหา</label>
                        <textarea class="form-control" id="exampleFormControlTextarea1" name="description" rows="5">{{ $news->description ?? old('description') }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                    <div class="row g-2">
                        <div class="col-md mb-3">
                            <label for="inputState" class="form-label">สถานะ</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" @if(isset($news)) {{ $news->status == true ? 'checked' : '' }} @endif>
                                <label class="form-check-label" for="status">แอคทิฟข่าว</label>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="mb-3">
                        <div class="form-group avatar-image">
                            <div class="value">
                                <div class="custom-file">
                                    <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                        <label>อัฟโหลดรูปภาพ<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                                        <label class="custom-file-container__custom-file custom-file">
                                            <input type="file" class="form-control custom-file-container__custom-file__custom-file-input custom-file-input @error('file.*') is-invalid @enderror" id="validatedCustomFile" name="file[]" multiple aria-label="Choose File"/>
                                            <span class="custom-file-container__custom-file__custom-file-control custom-file-label"></span>
                                            @error('file.*')
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
            @isset($news)
                @if ($news->newsphotos->isNotEmpty())
                    <div class="col-md-12">
                        <div class="mb-3">
                            <div class="row g-3">
                            @foreach ($news->newsphotos as $key=>$photos )
                                    <div class="col-xl-3 col-lg-4 col-md-6 mb-4 image-area">
                                        <a class="thumbnail fancybox" rel="ligthbox" href="{{ asset('storage/news_photos/'.$photos->filename) }}">
                                            <img src="{{ asset('storage/news_photos/'.$photos->filename) }}" alt="" class="img-fluid card-img-top rounded">
                                            <a class="remove-image" onclick="deleteData({{ $photos->id }})" style="display: inline;">&#215;</a>
                                        </a>

                                        <form id="delete-form-{{ $photos->id }}" action="{{ route('app.news-photos.destroy',$photos->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                            @endforeach
                            </div>
                        </div>
                    </div>
                @else
                <div class="mb-5" align="center"><h5><span class="badge bg-danger">ไม่มีรูปภาพที่อัฟโหลด</span></h5></div>
                @endif
            @endisset
            <div class="col-12">
                <button class="btn btn-primary" onclick="showLoading(@isset($news) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('newsFrom').id);">
                    @isset($news)
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
            @isset($news->avatar)
            presetFiles: [
                "{{ asset('storage/user_avatars') }}/{{ $news->avatar }}",
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

