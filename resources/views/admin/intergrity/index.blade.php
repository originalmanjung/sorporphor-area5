@extends('layouts.admin.app')
@push('css')
<style>
    .dataTable-table>tbody>tr>td,
    .dataTable-table>tbody>tr>th,
    .dataTable-table>tfoot>tr>td,
    .dataTable-table>tfoot>tr>th,
    .dataTable-table>thead>tr>td,
    .dataTable-table>thead>tr>th {
        vertical-align: middle;
        text: center;
    }

    ul li a, ol li a{
        text-decoration: none;
        font-size: 18px;
    }
    ol li {
        margin-bottom:15px !important;
    }
</style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Legislation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการ ITA3</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>ประเภททั้งหมด</div>
            @can('app.intergrities.create')
            <!-- Button Modal -->
            <div>
                <button type="button" class="btn btn-primary mx-auto" data-bs-toggle="modal" data-bs-target="#intergrityModal">
                    <i class="fa fa-plus-circle" aria-hidden="true"></i> เพิ่ม
                </button>
            </div>
            @endcan
        </div>
        <div class="card-body">
            <!-- Modal -->
            <form id="ITAFrom" ita="form" method="POST" action="{{ route('app.intergrities.store') }}">
                @csrf
                <div class="modal fade" id="intergrityModal" tabindex="-1" aria-labelledby="intergrityModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">สร้างหัวข้อหลัก</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <div class="row g-2">
                                <div class="col mb-3 form-group">
                                    <label for="name" class="form-label">หัวข้อ ITA :</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ old('name') }}" autofocus required>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">ปิด</button>
                            <button type="submit" class="btn btn-primary">บันทึก</button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อประเภท</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อประเภท</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($intergrities as $key => $intergrity)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $intergrity->name }} </td>
                        <td>{{ $intergrity->user->name }}</td>
                        <td class="text-center">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a class="btn btn-primary btn-sm rounded-3" style="" type="button" href="{{ route('app.intergrities.show', $intergrity->id)}}"><i class="fas fa-eye"></i></a>
                                @canany(['update', 'delete'], $intergrity)
                                    <a class="btn btn-success btn-sm rounded-3" style="" type="button" href="{{ route('app.intergrities.edit', $intergrity->id)}}"><i class="fas fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm rounded-0" type="button" onclick="deleteData({{ $intergrity->id }})"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $intergrity->id }}" action="{{ route('app.intergrities.destroy',$intergrity->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                @endcanany
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
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
