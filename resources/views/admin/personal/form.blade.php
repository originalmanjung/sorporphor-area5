@extends('layouts.admin.app')
@push('css')
<link href="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.css" rel="stylesheet" type="text/css" />
@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Create Perosnal</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Mange Perosnal</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างบุคลากร</div>
            <a href="{{ route('app.personals.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">

                <div class="row">
                    <form class="row g-3" id="personalFrom" personal="form" method="POST" action="{{ isset($personal) ? route('app.personals.update',$personal->id) : route('app.personals.store') }}" enctype="multipart/form-data">
                        @csrf
                        @if (isset($personal))
                            @method('PUT')
                        @endif
                        <div class="col-md-6">
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="name" class="form-label">ชื่อ - นามสกุล</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $personal->name ?? old('name') }}" autofocus>
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                        <div class="form-group row">
                                        <label for="inputBirth" class="form-label">Date:</label>
                                        <div class="ml-2">
                                            <input type="text" id="datepicker" class="form-control @error('birthday') is-invalid @enderror" value="" name="birthday" autocomplete="off" width="270"/>
                                            @error('birthday')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="phone" class="form-label">เบอร์โทรศัพท์</label>
                                    <input type="number" class="form-control @error('phone') is-invalid @enderror" id="phone" name="phone" value="{{ $personal->phone ?? old('phone') }}" autocomplete="phone">
                                    @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="email" class="form-label">อีเมลล์</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ $personal->email ?? old('email') }}" autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="position" class="form-label">ตำแหน่ง</label>
                                    <input type="text" class="form-control @error('position') is-invalid @enderror" id="position" name="position" value="{{ $personal->position ?? old('position') }}">
                                    @error('position')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="facebook" class="form-label">Facebook Url</label>
                                    <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ $personal->facebook ?? old('facebook') }}">
                                    @error('facebook')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="instagram" class="form-label">Instagram Url</label>
                                    <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ $personal->instagram ?? old('instagram') }}">
                                    @error('instagram')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="twitter" class="form-label">Twitter Url</label>
                                    <input type="text" class="form-control @error('twitter') is-invalid @enderror" id="twitter" name="twitter" value="{{ $personal->twitter ?? old('twitter') }}">
                                    @error('twitter')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                        </div>
                         <div class="col-md-6"> <div clas="row g-2">
                            <div class="mb-3">
                                    <label for="inputState" class="form-label">ตำแหน่งทางบริหาร</label>
                                    <select id="inputState" class="form-select @error('position_general') is-invalid @enderror" name="position_general">
                                        <option value="" @if(empty($personal->position_general)) selected @endif >Choose...</option>
                                        <option value="ผู้อำนวยการ สพป.เชียงใหม่ เขต 5" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการ สพป.เชียงใหม่ เขต 5' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการ สพป.เชียงใหม่ เขต 5' ? 'selected':'' }}  @endif>ผู้อำนวยการ สพป.เชียงใหม่ เขต 5</option>
                                        <option value="รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5" @if(isset($personal)) {{ $personal->position_general == 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5' ? 'selected' : '' }} @else {{ old('position_general') == 'รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5' ? 'selected':'' }}  @endif>รองผู้อำนวยการ สพป.เชียงใหม่ เขต 5</option>
                                        <option value="ผู้อำนวยการกลุ่มอำนวยการ" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มอำนวยการ' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มอำนวยการ' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มอำนวยการ</option>
                                        <option value="ผู้อำนวยการกลุ่มนโยบายและแผน" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มนโยบายและแผน' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มนโยบายและแผน' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มนโยบายและแผน</option>
                                        <option value="ผู้อำนวยการกลุ่มบริหารงานบุคคล" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มบริหารงานบุคคล' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มบริหารงานบุคคล' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มบริหารงานบุคคล</option>
                                        <option value="ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มบริหารงานการเงินและสินทรัพย์</option>
                                        <option value="ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มส่งเสริมการจัดการศึกษา</option>
                                        <option value="ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มพัฒนาครูและบุคลากรทางการศึกษา</option>
                                        <option value="ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มนิเทศติดตามและประเมินผลการจัดการศึกษา</option>
                                        <option value="ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มส่งเสริมการศึกษาทางไกลเทคโนโลยีสารสนเทศและการสื่อสาร</option>
                                        <option value="ผู้อำนวยการกลุ่มกฎหมายและคดี" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการกลุ่มกฎหมายและคดี' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการกลุ่มกฎหมายและคดี' ? 'selected':'' }}  @endif>ผู้อำนวยการกลุ่มกฎหมายและคดี</option>
                                        <option value="ผู้อำนวยการหน่วยตรวจสอบภายใน" @if(isset($personal)) {{ $personal->position_general == 'ผู้อำนวยการหน่วยตรวจสอบภายใน' ? 'selected' : '' }} @else {{ old('position_general') == 'ผู้อำนวยการหน่วยตรวจสอบภายใน' ? 'selected':'' }}  @endif>ผู้อำนวยการหน่วยตรวจสอบภายใน</option>
                                    </select>
                                    @error('position_general')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="level" class="form-label">ระดับ</label>
                                    <input type="text" class="form-control @error('level') is-invalid @enderror" id="level" name="level" value="{{ $personal->level ?? old('level') }}">
                                        @error('level')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="layer" class="form-label">อันดับ</label>
                                    <input type="text" class="form-control @error('layer') is-invalid @enderror" id="layer" name="layer" value="{{ $personal->layer ?? old('layer') }}">
                                        @error('layer')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="inputGroup" class="form-label">กลุ่มงาน</label>
                                    <select id="inputGroup" class="form-select @error('role_id') is-invalid @enderror" name="role_id">
                                        <option value="" selected>Choose...</option>
                                        @foreach ($roles as $key=>$role )
                                            <option value="{{ $role->id }}" @if(isset($personal)) {{ $personal->role->id == $role->id ? 'selected' : '' }} @else {{ (collect(old('role_id'))->contains($role->id)) ? 'selected':'' }}  @endif >{{ $role->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('role_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div clas="row g-2">
                                <div class="mb-3">
                                    <label for="inputPersonalType" class="form-label">ประเภท</label>
                                    <select id="inputPersonalType" class="form-select @error('personal_type') is-invalid @enderror" name="personal_type">
                                        <option value="" @if(empty($personal->personal_type)) selected @endif >Choose...</option>
                                        <option value="ข้าราชการ" @if(isset($personal)) {{ $personal->personal_type == 'ข้าราชการ' ? 'selected' : '' }} @else {{ old('personal_type') == 'ข้าราชการ' ? 'selected':'' }}  @endif>ข้าราชการ</option>
                                        <option value="พนักงานราชการ" @if(isset($personal)) {{ $personal->personal_type == 'พนักงานราชการ' ? 'selected' : '' }} @else {{ old('personal_type') == 'พนักงานราชการ' ? 'selected':'' }}  @endif>พนักงานราชการ</option>
                                        <option value="ลูกจ้างประจำ" @if(isset($personal)) {{ $personal->personal_type == 'ลูกจ้างประจำ' ? 'selected' : '' }} @else {{ old('personal_type') == 'ลูกจ้างประจำ' ? 'selected':'' }}  @endif>ลูกจ้างประจำ</option>
                                        <option value="ลูกจ้างชั่วคราว" @if(isset($personal)) {{ $personal->personal_type == 'ลูกจ้างชั่วคราว' ? 'selected' : '' }} @else {{ old('personal_type') == 'ลูกจ้างชั่วคราว' ? 'selected':'' }}  @endif>ลูกจ้างชั่วคราว</option>
                                    </select>
                                    @error('personal_type')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="formAvatar" class="form-label">แนบรูป</label>
                                    <input class="form-control @error('avatar') is-invalid @enderror" type="file" name="avatar">
                                    @error('avatar')
                                        <span class="invalid-feedback" avatar="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row g-2">
                                <div class="mb-3">
                                    <label for="inputState" class="form-label">สถานะ</label>
                                    <div class="form-check form-switch">
                                        <input class="form-check-input" type="checkbox" id="status" name="status" @isset($personal) {{ $personal->status == true ? 'checked' : '' }} @endisset>
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
                    </form>
                </div>


            <div class="col-12">
                <button class="btn btn-primary" onclick="showLoading(@isset($personal) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('personalFrom').id);">
                    @isset($personal)
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.min.js" type="text/javascript"></script>
    <script>
        $('#datepicker').datetimepicker({
            timepicker: false,
            datepicker: true,
            format: 'd-m-Y',
            value: '{{ isset($personal) ? $personal->birthday : '' }}'
        });
    </script>
@endpush

