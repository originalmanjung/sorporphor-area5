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
    <h1 class="mt-4">Standard Services</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">คู่มือ/มาตรฐานการให้บริการสถิติการให้บริการและรายงานพึงพอใจ</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>ประเภททั้งหมด</div>
            <div>
                @can('app.standardServices.create')
                    <a href="{{ route('app.standardServices.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
                @endcan
            </div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($standardServices as $key => $standardService)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $standardService->name }}</td>
                            <td>{{ $standardService->user->name }}</td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a class="btn btn-primary btn-sm rounded-3" style="" type="button" href="{{ route('app.standardServices.show', $standardService->id)}}" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                    @canany(['update', 'delete'], $standardService)
                                        @can('app.standardServices.edit')
                                            <a href="{{ route('app.standardServices.edit', $standardService->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('app.standardServices.destroy')
                                            <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $standardService->id }})"><i class="fa fa-trash"></i></a>
                                            <form id="delete-form-{{ $standardService->id }}" action="{{ route('app.standardServices.destroy',$standardService->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endcan
                                    @endcan
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
