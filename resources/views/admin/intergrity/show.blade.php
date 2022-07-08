@extends('layouts.admin.app')
@push('css')
<style>
 .tree-content a {
     font-size:18px;
     text-decoration: none;
 }
</style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Legislation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการ ITA</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                @can('app.intergrities.create')
                <!-- Button Child Modal -->
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#childModal">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่ม
                </button>
                @endcan
                 <!-- Modal Child-->
                 <form id="ITAForm" ita="form" method="POST" action="{{ route('app.intergrities.store') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal fade" id="childModal" tabindex="-1" aria-labelledby="childModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">{{ $intergrity->name }}</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row g-2">
                                    <div class="col mb-3 form-group">
                                        <label for="name" class="form-label">ชื่อหัวข้อ ITA</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus required>
                                    </div>
                                </div>

                                <div class="row g-2">
                                    <div class="col mb-3 form-group">
                                        <label for="url" class="form-label">ลิ้ง URL</label>
                                        <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}" autofocus>
                                        @error('url')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="row g-2">
                                    <div class="col mb-3 form-group">
                                        <label for="formFileSm" class="form-label">แนบไฟล์ </label>
                                        <input class="form-control form-control-sm @error('file') is-invalid @enderror" id="formFileSm" type="file" name="file">
                                        @error('file')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                    </div>
                                </div>
                                <input name="parent_id" type="hidden" value="{{ $intergrity->id }}">
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                <button type="submit" class="btn btn-primary" onclick="showLoading('กำลังเพิ่มข้อมูล...',document.getElementById('ITAForm').id);">บันทึก</button>
                            </div>
                        </div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-6 col-md-6">
                <select class="form-select @error('parent_id') is-invalid @enderror" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    @foreach ($intergrities as $key=>$intergrityItem )
                        <option value="{{ route('app.intergrities.show', $intergrityItem->id)}}" @if(url()->current() == route('app.intergrities.show', $intergrityItem->id)) selected @endif>{{ $intergrityItem->name }}</option>>
                    @endforeach
                </select>
            </div>
            <div><a href="{{ route('app.intergrities.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a></div>
        </div>
        <div class="card-body">
            <tr>
                <td>
                    @if($intergrity->children->isEmpty())
                        <strong>ไม่มีหัวข้อย่อย</strong>
                    @else
                        <ul class="mt-2">
                            @foreach ($intergrity->children as $child)
                            <li class="tree-content">
                                <a @isset($child->url) target="_blank" href="{{ $child->url ?? '#' }}" @endisset class="text-secondary">{{ $child->name }}</a>
                                <span class="ml-5" style="margin-left:20px;">
                                    @isset($child->file)<a class="" style="margin-right: 5px;" href="{{ route('app.intergrities.showPDF',$child->id) }}" target="_blank"><i class="fas fa-eye" data-toggle="tooltip" title="View PDF"></i></a>@endisset
                                    @canany(['update', 'delete'], $child)
                                    <a class="" style="margin-right: 5px;"  href="{{ route('app.intergrities.edit', $child->id)}}"><i class="fas fa-pencil-alt" data-toggle="tooltip" title="Edit"></i></a>
                                    <a class="" style="margin-right: 5px; cursor: pointer;"  onclick="deleteData({{ $child->id }})"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                                    <form id="delete-form-{{ $child->id }}" action="{{ route('app.intergrities.destroy',$child->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcanany
                                    @can('app.intergrities.create')
                                    <!-- Button Sub Child Modal -->
                                    <a class="text-success" style="margin-right: 5px;"  type="button" data-bs-toggle="modal" data-bs-target="#subChildModal-{{ $child->id }}"><i class="fas fa-plus" data-toggle="tooltip" title="Add"></i></a>
                                    @endcan
                                    <!-- Modal Sub Child-->
                                    <form id="subChild" ita="form" method="POST" action="{{ route('app.intergrities.store') }}" enctype="multipart/form-data">
                                        @csrf
                                        <div class="modal fade" id="subChildModal-{{ $child->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $child->name }}</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <div class="row g-2">
                                                        <div class="col mb-3 form-group">
                                                            <label for="name" class="form-label">ชื่อหัวข้อ ITA</label>
                                                            <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus required>
                                                        </div>
                                                    </div>

                                                    <div class="row g-2">
                                                        <div class="col mb-3 form-group">
                                                            <label for="url" class="form-label">ลิ้ง URL</label>
                                                            <input type="text" class="form-control @error('url') is-invalid @enderror" id="url" name="url" value="{{ old('url') }}" autofocus>
                                                            @error('url')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="row g-2">
                                                        <div class="col mb-3 form-group">
                                                            <label for="formFileSm" class="form-label">แนบไฟล์ </label>
                                                            <input class="form-control form-control-sm @error('file') is-invalid @enderror" id="formFileSm" type="file" name="file">
                                                            @error('file')
                                                            <span class="invalid-feedback" role="alert">
                                                                <strong>{{ $message }}</strong>
                                                            </span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <input name="parent_id" type="hidden" value="{{ $child->id }}">
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                                                    <button type="submit" class="btn btn-primary">บันทึก</button>
                                                </div>
                                            </div>
                                            </div>
                                        </div>
                                    </form>
                                </span>
                                @foreach($child->children as $subchild)
                                    <ul>
                                        <li>
                                            <a @isset($subchild->url) target="_blank" href="{{ $subchild->url ?? '#' }}" @endisset  class="text-secondary">{{ $subchild->name }}</a>
                                            <span class="ml-5" style="margin-left:20px;">
                                                @isset($subchild->file)<a class="" style="margin-right: 5px;" href="{{ route('app.intergrities.showPDF',$subchild->id) }}" target="_blank"><i class="fas fa-eye" data-toggle="tooltip" title="View PDF"></i></a>@endisset
                                                @canany(['update', 'delete'], $subchild)
                                                <a class="" style="margin-right: 5px;"  href="{{ route('app.intergrities.edit', $subchild->id)}}"><i class="fas fa-pencil-alt" data-toggle="tooltip" title="Edit"></i></a>
                                                <a class="" style="margin-right: 5px; cursor: pointer;"  onclick="deleteData({{ $subchild->id }})"><i class="fa fa-trash" data-toggle="tooltip" title="Delete"></i></a>
                                                <form id="delete-form-{{ $subchild->id }}" action="{{ route('app.intergrities.destroy',$subchild->id) }}" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                                @endcanany
                                            </span>
                                        </li>
                                    </ul>
                                @endforeach
                            </li>
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
@push('js')
<script src="{{ asset('js/admin-script.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
<script>
    @if($errors->isNotEmpty())
        Swal.fire({
            icon: 'error',
            title: 'Errors',
            @foreach ($errors->all() as $error)
            text: '{{ $error }}',
            @endforeach
            footer: '<a href="">Why do I have this issue?</a>'
        })
    @endisset
</script>
@endpush
