@extends('layouts.admin.app')
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Role</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการสิทธิ์ผู้ใช้งาน</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้างสิทธิ์ผู้ใช้งาน</div>
            <a href="{{ route('app.roles.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">


                <form id="roleFrom" role="form" method="POST" action="{{ isset($role) ? route('app.roles.update',$role->id) : route('app.roles.store') }}">
                    @csrf
                    @if (isset($role))
                        @method('PUT')
                    @endif
                    <div class="card-body">
                        @if (isset($role))
                            <h2><span class="badge bg-primary mb-4">จัดการสิทธิ์ {{ $role->name }}</span></h2>
                        @endif
                        <div class="form-group mb-3">
                            <label for="formGroupExampleInput">ชื่อสิทธิ์</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ $role->name ?? old('name') }}" placeholder="กรอกข้อมูล">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <div class="custom-control custom-checkbox">
                                <input type="checkbox" class="form-check-input" id="select-all">
                                <label class="custom-control-label" for="select-all">Select All</label>
                            </div>
                        </div>
                        @forelse($modules->chunk(2) as $key => $chunks)
                        <div class="row">
                            @foreach($chunks as $key=>$module)
                            <div class="col">
                                <h5>Module: {{ $module->name }}</h5>
                                @foreach($module->permissions as $key=>$permission)
                                <div class="mb-3 ml-4">
                                    <div class="custom-control custom-checkbox mb-2">
                                        <input type="checkbox" class="form-check-input list-check @error('permissions') is-invalid @enderror" id="permission-{{ $permission->id }}" value="{{ $permission->id }}" name="permissions[]"
                                        {{ in_array($permission->id, old('permissions', [])) ? 'checked' : '' }}
                                        @if(isset($role))
                                            @foreach($role->permissions as $rPermission)
                                            {{ $permission->id == $rPermission->id ? 'checked' : '' }}
                                            @endforeach
                                        @endif>
                                        <label class="form-check-label" for="permission-{{ $permission->id }}">{{ $permission->name }}</label>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                            @endforeach
                        </div>
                        @empty
                        <div class="row">
                            <div class="col text-center">
                                <strong>No Module Found.</strong>
                            </div>
                        </div>
                        @endforelse
                    </div>
                </form>
                <button type="button" class="btn btn-danger" id="reset-btn">
                            <i class="fas fa-redo"></i>
                            <span>Reset</span>
                </button>

                <button class="btn btn-primary" onclick="showLoading(@isset($news) 'กำลังอัฟเดทข้อมูล...' @else 'กำลังเพิ่มข้อมูล...' @endisset,document.getElementById('roleFrom').id);">
                    @isset($role)
                    <i class="fas fa-arrow-circle-up"></i>
                    <span>อัฟเดท</span>
                    @else
                    <i class="fas fa-plus-circle"></i>
                    <span>สร้าง</span>
                    @endisset
                </button>
        </div>
    </div>
@endsection
@push('js')
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/admin-script.js') }}"></script>
    <script type="text/javascript">
        // Listen for click on toggle checkbox
        $('#select-all').click(function (event) {
            if (this.checked) {
                // Iterate each checkbox
                $(':checkbox').each(function () {
                    this.checked = true;
                });
            } else {
                $(':checkbox').each(function () {
                    this.checked = false;
                });
            }
        });
    </script>
    <script type="text/javascript">
        $('#reset-btn').click(function(event){
            $('input[type=checkbox]').each(function(){
                this.checked = false;
            });
        });
    </script>
    <script type="text/javascript">
        @if (isset($role))
            if ( {{ $role->permissions->count() }} == 50) {
                $('#select-all').prop('checked', true);
            }
        @endif
        
        $('input[name="permissions[]"]').change(function() {
            var numberChecked = $('input[name="permissions[]"]:checked').length;
            if(numberChecked == 49) {
                $('#select-all').prop('checked', true);
            } else {
                $('#select-all').prop('checked', false);
            }
        });
    </script>
@endpush

