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
    <h1 class="mt-4">Corruptions</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">การดำเนินงานเพื่อป้องกันการทุจริต</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>การดำเนินงานเพื่อป้องกันการทุจริต ทั้งหมด</div>
            <a href="{{ route('app.corruptions.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">ไฟล์</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">ไฟล์</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($corruptions as $key => $corruption)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $corruption->name }}</td>
                            <td><a href="{{ route('app.corruptions.show', $corruption) }}"><i class="fas fa-file-pdf fa-2x text-danger"></i></a></td>
                            <td>{{ $corruption->user->name }}</td>
                            <td>{{ $corruption->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                            @canany(['update', 'delete'], $corruption)
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('app.corruptions.edit', $corruption->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $corruption->id }})"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $corruption->id }}" action="{{ route('app.corruptions.destroy',$corruption->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            @endcanany
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
