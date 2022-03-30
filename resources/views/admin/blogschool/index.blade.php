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
    <h1 class="mt-4">Activity</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการกิจกรรมโรงเรียน</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>กิจกรรมโรงเรียนทั้งหมด</div>
            <a href="{{ route('app.blogSchools.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($blogSchools as $key => $blogSchool)
                        <tr>
                            <td><img width="70" class="img-thumbnail" src="@if($blogSchool->blogSchoolPhotos->isNotEmpty()) {{ asset('storage/blogschool_photos/'. $blogSchool->blogSchoolPhotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="News Photo"></td>
                            <td>{{ $blogSchool->title }}</td>
                            <td>
                                @if ($blogSchool->status == '1')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $blogSchool->created_at->diffForHumans() }}</td>
                            <td class="text-center">
                            @canany(['update', 'delete'], $blogSchool)
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('app.blogSchools.show', $blogSchool->id)}}" class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></a>
                                    <a href="{{ route('app.blogSchools.edit', $blogSchool->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $blogSchool->id }})"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $blogSchool->id }}" action="{{ route('app.blogSchools.destroy',$blogSchool->id) }}" method="POST" style="display: none;">
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
