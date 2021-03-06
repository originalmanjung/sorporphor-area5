@extends('layouts.admin.app')
@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
    <link rel="stylesheet" type="text/css" href="https://unpkg.com/file-upload-with-preview@4.1.0/dist/file-upload-with-preview.min.css" />
    <style>
        .dataTable-table > tbody > tr > td, .dataTable-table > tbody > tr > th, .dataTable-table > tfoot > tr > td, .dataTable-table > tfoot > tr > th, .dataTable-table > thead > tr > td, .dataTable-table > thead > tr > th {
            vertical-align: middle;
            text: center;
        }
    </style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Letter</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จดหมายข่าว</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>จดหมายข่าว ทั้งหมด</div>
            @can('app.letters.create')
            <a href="{{ route('app.letters.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
            @endcan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">อัฟเดทล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($letters as $key => $letter)
                        <tr>
                            <td>
                                <a class="thumbnail fancybox" rel="ligthbox" href="{{ asset('storage/letter_files/'.$letter->file) }}">
                                    <img width="70" class="img-thumbnail" src="@if(!empty($letter->file)) {{ asset('storage/letter_files/'.$letter->file) }}  @else {{ config('app.placeholder').'200.png' }}@endif" alt="News Photo">
                                </a>
                            </td>
                            <td>
                                <div class="d-flex flex-column user-name-table">
                                    <div>{{ $letter->name }}</div>
                                    <div>
                                        <span class="badge bg-primary">{{ $letter->letters }}</span>
                                    </div>
                                </div>
                            </td>
                            <td>{{ $letter->user->name }}</td>
                            <td>{{ $letter->updated_at->diffForHumans() }}</td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                @canany(['update', 'delete'], $letter)
                                    @can('app.letters.edit')
                                    <a href="{{ route('app.letters.edit', $letter->id)}}" class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    @endcan
                                    @can('app.letters.destroy')
                                    <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $letter->id }})"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $letter->id }}" action="{{ route('app.letters.destroy',$letter->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endcan
                                @endcan
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
    <script type="text/javascript">
        $(document).ready(function(){
            $(".fancybox").fancybox({
                openEffect: "none",
                closeEffect: "none"
            });
        });
    </script>
@endpush
