@extends('layouts.admin.app')
@push('css')
    <style>
        .dataTable-table > tbody > tr > td, .dataTable-table > tbody > tr > th, .dataTable-table > tfoot > tr > td, .dataTable-table > tfoot > tr > th, .dataTable-table > thead > tr > td, .dataTable-table > thead > tr > th {
            vertical-align: middle;
            text: center;
        }
        a { text-decoration: none; }
        .pdf-tax :hover {
            color: red !important;
        }
        .pdf-tax :hover {
            color: white !important;
        }
    </style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">OTA System</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">บริหารจัดการ OTA</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>OTA ทั้งหมด</div>
            <a href="{{ route('app.legislations.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อหัวข้อ</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">สร้างล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับ</th>
                        <th scope="col">ชื่อหัวข้อ</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">สร้างล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($legislations as $key => $legislation)
                        @foreach ($legislation->legislationFiles as $key => $legislationFile)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td><a href="{{ route('app.legislationFiles.show', $legislationFile->id) }}" class="m-2 pdf-tax d-flex align-items-center btn btn-outline-danger" target="_blank"><i class="fas fa-file-pdf fa-2x" style="margin-right: 10px"></i> {{ $legislationFile->name }}</a></td>
                                <td>{{ $legislation->legislationList->name}}</td>
                                <td>{{ $legislation->user->name}}</td>
                                <td>{{ $legislation->created_at->diffForHumans() }}</td>
                                <td class="text-center">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        @canany(['update', 'delete'], $legislation)
                                            <a class="btn btn-danger btn-sm rounded-0" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $legislationFile->id }})"><i class="fa fa-trash"></i></a>
                                            <form id="delete-form-{{ $legislationFile->id }}" action="{{ route('app.legislationFiles.destroy',$legislationFile->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endcanany
                                    </div>
                                </td>
                            </tr>
                        @endforeach
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
