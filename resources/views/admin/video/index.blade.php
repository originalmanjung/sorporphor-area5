@extends('layouts.admin.app')
@push('css')
    <link href="{{ asset('home/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <style>
        .dataTable-table > tbody > tr > td, .dataTable-table > tbody > tr > th, .dataTable-table > tfoot > tr > td, .dataTable-table > tfoot > tr > th, .dataTable-table > thead > tr > td, .dataTable-table > thead > tr > th {
            vertical-align: middle;
            text: center;
        }

    </style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Video</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">อัฟโหลดลิ้งวีดีโอจากยูทูป</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>อัฟโหลดลิ้งวีดีโอจากยูทูป ทั้งหมด</div>
            @can('app.videos.create')
            <a href="{{ route('app.videos.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
            @endcan
        </div>
        <div class="card-body">
            <table class="table table-striped" style="width:100%" id="table_test">
                <thead>
                    <tr>
                        <th scope="col">ไฟล์</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ไฟล์</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">รายละเอียด</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($videos as $key => $video)

                        <tr>
                            <td>
                                <a class="glightbox" href="{{ $video->url }}">
                                    <img src="{{ asset('storage/video_photos/'.$video->filename) }}" style="width: 150px;" alt="" class="img-fluid card-img-top rounded">
                                </a>
                            </td>
                            <td>{{ $video->name }}</td>
                            <td>{{ $video->description }}</td>
                            <td>{{ $video->user->name }}</td>
                            <td>{{ $video->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                            @canany(['update', 'delete'], $video)
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('app.videos.edit', $video->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $video->id }})"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $video->id }}" action="{{ route('app.videos.destroy',$video->id) }}" method="POST" style="display: none;">
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


    <script src="{{ asset('home/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/admin-script.js') }}"></script>
    <script type="text/javascript">
          /**
         * Initiate glightbox
         */
        const glightbox = GLightbox({
            selector: '.glightbox'
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table_test').DataTable();
        });
    </script>
@endpush
