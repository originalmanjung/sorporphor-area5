@extends('layouts.admin.app')
@push('css')
    <style>
        .dataTable-table > tbody > tr > td, .dataTable-table > tbody > tr > th, .dataTable-table > tfoot > tr > td, .dataTable-table > tfoot > tr > th, .dataTable-table > thead > tr > td, .dataTable-table > thead > tr > th {
            vertical-align: middle;
            text: center;
        }

    </style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Legislation Lists</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการประเภท ITA</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>ประเภททั้งหมด</div>
            <a href="{{ route('app.legislationLists.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้างประเภท</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อประเภท</th>
                        <th scope="col">กลุ่มงาน</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">สร้างล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อประเภท</th>
                        <th scope="col">กลุ่มงาน</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">สร้างล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($legislationLists as $key => $legislationList)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $legislationList->name }}</td>
                             <td>{{ $legislationList->role->name }}</td>
                            <td>
                                @if ($legislationList->status == '1')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $legislationList->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('app.legislationLists.edit', $legislationList->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $legislationList->id }})"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $legislationList->id }}" action="{{ route('app.legislationLists.destroy',$legislationList->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
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
@endpush
