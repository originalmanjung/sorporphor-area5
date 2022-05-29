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
    <h1 class="mt-4">Child Law</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">หัวข้อย่อย กฏหมายที่เกี่ยวข้อง</li>
    </ol>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                @can('app.laws.create')
                    <a href="{{ route('app.laws.createChild', $law->id) }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้างหัวข้อย่อย</a>
                @endcan
            </div>
            <div class="col-6 col-md-6">
                <select class="form-select @error('parent_id') is-invalid @enderror" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    @foreach ($laws as $key=>$lawItem )
                        <option value="{{ route('app.laws.show', $lawItem->id)}}" @if(url()->current() == route('app.laws.show', $lawItem->id)) selected @endif>{{ $lawItem->name }}</option>>
                    @endforeach
                </select>
            </div>
            <div><a href="{{ route('app.laws.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a></div>
        </div>
        <div class="card-body">
            <tr>
                <td>
                    @if($law->children->isEmpty())
                        <div class="text-center"><strong>ไม่พบหัวข้อย่อย</strong></div>
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
                            @foreach ($law->children as $key => $child)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td>{{ $child->name }}</td>
                                    <td class="text-center">
                                        <div class="d-grid gap-2 d-md-flex">
                                        <a class="btn btn-primary btn-sm rounded-3" style="" type="button" href="{{ route('app.laws.viewPDF', $child->id)}}" data-toggle="tooltip" data-placement="top" title="View"><i class="fas fa-file-pdf"></i></a>
                                        @can('app.laws.edit')
                                            <a href="{{ route('app.laws.edit', $child->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        @endcan
                                        @can('app.laws.destroy')
                                            <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $child->id }})"><i class="fa fa-trash"></i></a>
                                            <form id="delete-form-{{ $child->id }}" action="{{ route('app.laws.destroy',$child->id) }}" method="POST" style="display: none;">
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
