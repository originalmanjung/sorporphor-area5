@extends('layouts.admin.app')
@push('css')

@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Create Mission</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mange Mission</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้าง วิสัยทัศน์ พันธกิจ</div>
            <a href="{{ route('app.missions.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form class="row g-3" id="missionFrom" mission="form" method="POST" action="{{ isset($mission) ? route('app.missions.update',$mission->id) : route('app.missions.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (isset($mission))
                            @method('PUT')
                        @endif
                        <div class="col">
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="name" class="form-label">ชื่อเรื่อง</label>
                                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ $mission->name ?? old('name') }}">
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
                                    <textarea id="editor" class="form-control ckeditor @error('description') is-invalid @enderror" name="description" rows="5">{{ $mission->description ?? old('description') }}</textarea>
                                    @error('description')
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
                <button class="btn btn-primary" onclick="showLoading(@isset($mission) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('missionFrom').id);">
                    @isset($mission)
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
    <script src="https://cdn.ckeditor.com/ckeditor5/29.0.0/classic/ckeditor.js"></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/admin-script.js') }}"></script>
    <script type="text/javascript">
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                toolbar: {
                            items: [
                                'heading', '|',
                                'alignment', '|',
                                'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                                'bulletedList', 'numberedList', 'todoList',
                                '-', // break point
                                'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                                'code', 'codeBlock', '|',
                                'insertTable', '|',
                                'outdent', 'indent', '|',
                                'undo', 'redo'
                            ],

                        }
            } )
            .catch( error => {
                console.log( error );
            } );
    </script>
@endpush

