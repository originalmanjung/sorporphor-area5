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
    <h1 class="mt-4">History</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">ประวัติความเป็นมา</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>ประวัติความเป็นมา ทั้งหมด</div>
            @can('app.histories.create')
                <a href="{{ route('app.histories.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
            @endcan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($histories as $key => $history)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $history->name }}</td>
                            <td>{{ $history->user->name }}</td>
                            <td>{{ $history->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a href="{{ route('app.histories.show', $history->id)}}" class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></a>
                                <a href="{{ route('app.histories.edit', $history->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $history->id }})"><i class="fa fa-trash"></i></a>
                                <form id="delete-form-{{ $history->id }}" action="{{ route('app.histories.destroy',$history->id) }}" method="POST" style="display: none;">
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
