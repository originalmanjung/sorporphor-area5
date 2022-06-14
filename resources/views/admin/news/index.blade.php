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
        <li class="breadcrumb-item active">จัดการกิจกรรม สพป.</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>กิจกรรม สพป. ทั้งหมด</div>
            @can('app.news.create')
            <a href="{{ route('app.news.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้างข่าว</a>
            @endcan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อเรื่อง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">ประเภท</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($news as $key => $newss)
                        <tr>
                            <td><img width="70" class="img-thumbnail" src="@if($newss->newsphotos->isNotEmpty()) {{ asset('storage/news_photos/'. $newss->newsphotos[0]->filename) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="News Photo"></td>
                            <td>{{ $newss->title }}</td>
                            <td>
                                @if ($newss->status == '1')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>
                                @if ($newss->content == 'general')
                                    กิจกรรม สพป.
                                @elseif($newss->content == 'honest')
                                    กิจกรรมเขตพื้นที่สุจริต/การมีส่วนร่วมของผู้บริหาร
                                @elseif($newss->content == 'culture')
                                    กิจกรรมการเสริมสร้างวัฒนธรรมองค์กร
                                @else
                                    กิจกรรมการมีส่วนร่วมจากทุกภาคส่วน
                                @endif
                            </td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('app.news.show', $newss->id)}}" class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></a>
                                    <a href="{{ route('app.news.edit', $newss->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $newss->id }})"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $newss->id }}" action="{{ route('app.news.destroy',$newss->id) }}" method="POST" style="display: none;">
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
