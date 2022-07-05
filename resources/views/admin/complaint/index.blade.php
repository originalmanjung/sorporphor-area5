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
    <h1 class="mt-4">Complaints</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">รับเรื่องร้องเรียน-ร้องทุกข์</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header">
            <div><i class="fas fa-table me-1"></i>รับเรื่องร้องเรียน-ร้องทุกข์ ทั้งหมด</div>
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
                    @foreach ($complaints as $key => $complaint)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td class="d-flex flex-column">
                                {{ $complaint->title }}
                                <div>
                                    @if ($complaint->type == 'general')
                                        <span class="badge bg-secondary">เรื่องทั่วไป</span>
                                    @else
                                        <span class="badge bg-secondary">การทุจริตและประพฤติมิชอบ</span>
                                    @endif
                                </div>
                            </td>
                            <td>
                                @if ($complaint->approved == '0')
                                    <div class="text-center">
                                        <a class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Delete" onclick="approveData({{ $complaint->id }})" >ยังไม่ได้รับเรื่อง</a>
                                        <form id="approve-form-{{ $complaint->id }}" action="{{ route('app.complaints.update',$complaint->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('PUT')
                                        </form>
                                    </div>
                                @else
                                <div class="text-center">
                                    <h5><span class="badge bg-success">รับเรื่องแล้ว|โดย : {{ $complaint->user->name }}</span></h5>
                                </div>
                                @endif
                            </td>
                            <td>{{ $complaint->created_at->format('d/m/Y') }}</td>
                            <td>{{ isset($complaint->approved_at) ? $complaint->approved_at->format('d/m/Y') : 'ยังไม่มีวันที่รับเรื่อง' }}</td>
                            <td class="text-center">

                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('app.complaints.show', $complaint->id)}}" class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></a>
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
