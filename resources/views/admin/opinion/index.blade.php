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
    <h1 class="mt-4">opinions</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">รับเรื่องรับฟังความคิดเห็น</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <div><i class="fas fa-table me-1"></i>รับเรื่องรับฟังความคิดเห็น ทั้งหมด</div>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">วันที่ยืนเรื่อง</th>
                        <th scope="col">วันที่รับเรื่อง</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">วันที่ยืนเรื่อง</th>
                        <th scope="col">วันที่รับเรื่อง</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($opinions as $key => $opinion)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $opinion->title }}</td>
                            <td>
                                @if ($opinion->approved == '0')
                                    <div class="text-center">
                                        <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="approveData({{ $opinion->id }})" >ยังไม่ได้รับเรื่อง</a>
                                        <form id="approve-form-{{ $opinion->id }}" action="{{ route('app.opinions.update',$opinion->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    </div>
                                @else
                                <div class="text-center">
                                    <h5><span class="badge bg-success">รับเรื่องแล้ว|โดย : {{ $opinion->user->name }}</span></h5>
                                </div>
                                @endif
                            </td>
                            <td>{{ $opinion->created_at->format('d/m/Y') }}</td>
                            <td>{{ isset($opinion->approved_at) ? $opinion->approved_at->format('d/m/Y') : 'ยังไม่มีวันที่รับเรื่อง' }}</td>
                            <td class="text-center">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('app.opinions.show', $opinion->id)}}" class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></a>
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
