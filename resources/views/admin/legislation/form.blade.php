@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
    <style>
        a:link {
            text-decoration: none;
        }
    </style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">OTA System</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">บริหารจัดการ OTA</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>สร้าง OTA</div>
            <a href="{{ route('app.legislations.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <form class="row g-3" id="legislationFrom" legislation="form" method="POST" action="{{ route('app.legislations.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="col">
                            <div class="row g-2">
                                <div class="col-md mb-3">
                                    <label for="inputLegislationList" class="form-label">กลุ่มงาน</label>
                                    <select id="inputLegislationList" class="form-select @error('legislation_list_id') is-invalid @enderror" name="legislation_list_id">
                                        <option value="" selected>Choose...</option>
                                        @foreach ($legislationList as $key=>$leList )
                                            <option value="{{ $leList->id }}" {{ (collect(old('legislation_list_id'))->contains($leList->id)) ? 'selected':'' }} >{{ $leList->name }}</option>
                                        @endforeach
                                    </select>
                                     @error('legislation_list_id')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                                <table id="tableField" class="table table-bordered" id="dynamicAddRemove">
                                    <tr>
                                        <th>ชื่อรายการ</th>
                                        <th>แนบไฟล์</th>
                                        <th>จัดการ</th>
                                    </tr>
                                    <tr>
                                        <td>
                                            <input type="text" name="names[]" class="@error('names.*') is-invalid @enderror form-control form-control-sm" />
                                            @error('names.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </td>
                                        <td>
                                            <input type="file" name="files[]" class=" @if($errors->has('files')) @error('files') is-invalid @enderror @else @error('files.*') is-invalid @enderror @endif form-control form-control-sm" aria-label="file example" required/>
                                            @if ($errors->has('files'))
                                                @error('files')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @else
                                                @error('files.*')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            @endif
                                        </td>
                                        <td align="center"><button type="button" id="add" name="add" class="btn btn-primary btn-sm"><i class="fas fa-plus"></i></button></td>
                                    </tr>
                                </table>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12">
                <button class="btn btn-primary" onclick="showLoading('กำลังเพิ่มข้อมูล...' ,document.getElementById('legislationFrom').id);">
                    <i class="fas fa-plus-circle"></i>
                    <span>สร้าง</span>
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
        $(document).ready(function () {
            var html = '<tr><td><input type="text" name="names[]" class="form-control form-control-sm" /></td><td><input type="file" name="files[]" class="form-control form-control-sm"/></td><td><button type="button" id="remove" name="remove" class="btn btn-danger btn-sm">Remove</button></td></tr>';
            $("#add").click(function () {
                $("#tableField").append(html);
            });
            $("#tableField").on('click','#remove',function(){
                $(this).closest('tr').remove();
            });
        });
    </script>
@endpush
