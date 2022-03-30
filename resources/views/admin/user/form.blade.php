@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
    <style>
        .custom-file-container {
            margin-top: 3px;
        }
        .custom-file-container__custom-file__custom-file-control {
            border: 1px solid #ced4da;
        }
    </style>
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">User</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการผู้ใช้งาน</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างผู้ใช้งาน</div>
            <a href="{{ route('app.users.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <form class="row g-3" id="userFrom" user="form" method="POST" action="{{ isset($user) ? route('app.users.update',$user->id) : route('app.users.store') }}" enctype="multipart/form-data">
                @csrf
                @if (isset($user))
                    @method('PUT')
                @endif

                <div class="col-md-8">
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="name" class="form-label">ชื่อ</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $user->name ?? old('name') }}" autocomplete="name" autofocus>
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="email" class="form-label">อีเมลล์</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $user->email ?? old('email') }}" autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="username" class="form-label">username</label>
                            <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" value="{{ $user->username ?? old('username') }}" autocomplete="username" autofocus>
                            @error('username')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="password" class="form-label">พาสเวิร์ด</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" name="password" value="" aria-describedby="passwordHelp" autocomplete="password" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="password_confirmation" class="form-label">ยืนยันพาสเวิร์ด</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" id="password_confirmation" name="password_confirmation" autofocus>
                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 mb-3">
                            <label for="inputState" class="form-label">สิทธิ์</label>
                            <select id="inputState" class="form-select @error('role') is-invalid @enderror" name="role">
                                <option value="" selected>Choose...</option>
                                @foreach ($roles as $key=>$role )
                                    <option value="{{ $role->id }}" @if(isset($user)) {{ $user->role->id == $role->id ? 'selected' : '' }} @else {{ (collect(old('role'))->contains($role->id)) ? 'selected':'' }}  @endif >{{ $role->name }}</option>
                                @endforeach
                            </select>
                             @error('role')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $user->phone ?? old('phone') }}" autocomplete="phone" autofocus>
                            @error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="inputState" class="form-label">สถานะ</label>
                            <div class="form-check form-switch">
                                <input class="form-check-input" type="checkbox" id="status" name="status" @isset($user) {{ $user->status == true ? 'checked' : '' }} @endisset>
                                <label class="form-check-label" for="status">แอคทิฟผู้ใช้งาน</label>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="mb-3">
                        <div class="form-group avatar-image">
                            <div class="value">
                                <div class="custom-file">
                                    <div class="custom-file-container" data-upload-id="myUniqueUploadId">
                                        <label>อัฟโหลดรูปภาพ<a href="javascript:void(0)" class="custom-file-container__image-clear" title="Clear Image">&times;</a></label>
                                        <label class="custom-file-container__custom-file custom-file">
                                            <input type="file" class="@error('avatar') is-invalid @enderror form-control custom-file-container__custom-file__custom-file-input custom-file-input" id="validatedCustomFile" name="avatar" aria-label="Choose File"/>
                                            <span class="custom-file-container__custom-file__custom-file-control custom-file-label"></span>
                                            @error('avatar')
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
                <div class="col-12">
                    <button class="btn btn-primary" onclick="showLoading(@isset($user) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('userFrom').id);">
                        @isset($user)
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
@endsection
@push('js')
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.js"></script>
    <script src="{{ asset('js/admin-script.js') }}"></script>
    <script>
        var upload = new FileUploadWithPreview("myUniqueUploadId", {
            showDeleteButtonOnImages: true,
            text: {
                chooseFile: "Choose file...",
                browse: "Browse",
                selectedCount: "Custom Files Selected Copy",
            },
            @isset($user->avatar)
            presetFiles: [
                "{{ asset('storage/user_avatars') }}/{{ $user->avatar }}",
                // `/public/storage/avatar/${userImage.avatar}`
            ],
            @endisset
        });
    </script>
@endpush

