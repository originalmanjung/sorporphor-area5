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
    <h1 class="mt-4">Legislation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการ ITA2</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>ประเภททั้งหมด</div>
            <a href="{{ route('app.ita.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้างประเภท</a>
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
