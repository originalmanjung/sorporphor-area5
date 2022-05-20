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
    <h1 class="mt-4">Child Standard Pratice Guide</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">หัวข้อย่อย คู่มือมาตรฐานการปฏิบัติงาน</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                @can('app.standardPraticeGuides.create')
                    <a href="{{ route('app.standardPraticeGuides.createChild', $standardPraticeGuide->id) }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้างหัวข้อ</a>
                @endcan
            </div>
            <div class="col-6 col-md-6">
                <select class="form-select @error('parent_id') is-invalid @enderror" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    @foreach ($standardPraticeGuides as $key=>$standardPraticeGuideItem )
                        <option value="{{ route('app.standardPraticeGuides.show', $standardPraticeGuideItem->id)}}" @if(url()->current() == route('app.standardPraticeGuides.show', $standardPraticeGuideItem->id)) selected @endif>{{ $standardPraticeGuideItem->name }}</option>>
                    @endforeach
                </select>
            </div>
            <div><a href="{{ route('app.standardPraticeGuides.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a></div>
        </div>
        <div class="card-body">
            <tr>
                <td>
                    @if($standardPraticeGuide->children->isEmpty())
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
                            @foreach ($standardPraticeGuide->children as $key => $child)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $child->name }}</td>
                                    <td class="text-center">
                                        <div class="d-grid gap-2 d-md-flex">
                                        <a class="btn btn-primary btn-sm rounded-3" style="" type="button" href="#" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-eye"></i></a>
                                        @can('app.standardPraticeGuides.edit')
                                            <a href="{{ route('app.standardPraticeGuides.edit', $child->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endcan  
                                        @can('app.standardPraticeGuides.destroy')
                                            <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $child->id }})"><i class="fa fa-trash"></i></a>
                                            <form id="delete-form-{{ $child->id }}" action="{{ route('app.standardPraticeGuides.destroy',$child->id) }}" method="POST" style="display: none;">
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
