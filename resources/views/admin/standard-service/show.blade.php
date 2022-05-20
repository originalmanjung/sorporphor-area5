@extends('layouts.admin.app')
@push('css')
<style>
 .tree-content a {
     font-size:18px;
     text-decoration: none;
 }
</style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Child Standard Services</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">คู่มือ/มาตรฐานการให้บริการสถิติการให้บริการและรายงานพึงพอใจ</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                @can('app.standardServices.create')
                    <a href="{{ route('app.standardServices.createChild', $standardService->id) }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
                @endcan
            </div>
            <div class="col-6 col-md-6">
                <select class="form-select @error('parent_id') is-invalid @enderror" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    @foreach ($standardServices as $key=>$standardServiceItem )
                        <option value="{{ route('app.standardServices.show', $standardServiceItem->id)}}" @if(url()->current() == route('app.standardServices.show', $standardServiceItem->id)) selected @endif>{{ $standardServiceItem->name }}</option>>
                    @endforeach
                </select>
            </div>
            <div><a href="@if(isset($standardService->parent_id)){{ route('app.standardServices.show', $standardService->parent_id)}}@else{{ route('app.standardServices.index') }}@endisset" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a></div>
        </div>
        <div class="card-body">
            <tr>
                <td>
                    @if($standardService->children->isEmpty())
                        <div class="text-center"><strong>ไม่พบข้อมูล</strong></div>
                    @else
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">การจัดการ</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อ</th>
                                <th scope="col">การจัดการ</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($standardService->children as $key => $child)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $child->name }}</td>
                                    <td class="text-center">
                                        <div class="d-grid gap-2 d-md-flex">
                                        @if(empty($standardService->parent))
                                            <a class="btn btn-primary btn-sm rounded-3" style="" type="button" href="{{ route('app.standardServices.show', $child->id)}}" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                        @endif
                                         
                                        @can('app.standardServices.edit')
                                            <a href="{{ route('app.standardServices.edit', $child->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endcan  
                                        @can('app.standardServices.destroy')
                                            <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $child->id }})"><i class="fa fa-trash"></i></a>
                                            <form id="delete-form-{{ $child->id }}" action="{{ route('app.standardServices.destroy',$child->id) }}" method="POST" style="display: none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    @endif
                </td>
            </tr>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
@push('js')
<script src="{{ asset('js/admin-script.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
@endpush
