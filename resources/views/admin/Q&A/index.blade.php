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

</style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">questions</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Q&A</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>Q&A ทั้งหมด</div>
            @can('app.questions.create')
            <a href="{{ route('questions.create') }}" type="button" class="btn btn-danger text-white"><i class="fas fa-plus-circle"></i> สร้าง</a>
            @endcan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">วันที่</th>
                        <th scope="col">จัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($questions as $key => $question)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>{{ $question->title }}</td>
                        <td>{{ $question->description }}</td>
                        <td>{{ $question->created_at->format('d/m/Y') }}</td>
                        <td class="text-center">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                <a href="{{ route('app.questions.show', $question->slug)}}" class="btn btn-primary text-white">
                                    คลิกเพื่อดูโพส <span class="badge bg-secondary">views: {{ $question->views ?? '0' }}</span>
                                </a>
                                <a class="btn btn-danger" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $question->id }})"><i class="fa fa-trash"></i></a>
                                <form id="delete-form-{{ $question->id }}" action="{{ route('app.questions.destroy',$question->slug) }}" method="POST" style="display: none;">
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
