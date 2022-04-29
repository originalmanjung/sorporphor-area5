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

    ul li a, ol li a{
        text-decoration: none;
        font-size: 18px;
    }
    ol li {
        margin-bottom:15px !important;
    }
</style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Legislation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการ ITA3</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>ประเภททั้งหมด</div>
            <a href="{{ route('app.intergrities.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้างประเภท</a>
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อประเภท</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">สร้างล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">ลำดับที่</th>
                        <th scope="col">ชื่อประเภท</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">สร้างล่าสุด</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($intergrities as $key => $intergrity)
                    <tr>
                        <td>{{ $key + 1 }}</td>
                        <td>
                            <div class="accordion" id="accordionExample-{{ $key + 1 }}">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree-{{ $key + 1 }}" aria-expanded="false" aria-controls="collapseThree-{{ $key + 1 }}">
                                            {{ $intergrity->name }}
                                        </button>
                                    </h2>
                                    <div id="collapseThree-{{ $key + 1 }}" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample-{{ $key + 1 }}">
                                        <div class="accordion-body">
                                            @if($intergrity->children->isEmpty())
                                                 <strong>ไม่มีหัวข้อย่อย</strong>
                                            @else
                                                @foreach($intergrity->children as $child)
                                                <div style="margin-left: 20px;">
                                                    <ul>
                                                        <li class="d-flex align-items-center"><a href="{{ $child->url ?? '#' }}" class="" style="margin-right:10px;">{{ $child->name }}</a>
                                                            @isset($child->file)<a class="btn btn-primary btn-sm rounded-3" style="margin-left:3px;" type="button" href="{{ route('app.ita.show',$child->id) }}" target="_blank"><i class="fas fa-file-pdf"></i></a>@endisset
                                                            <a class="btn btn-success btn-sm rounded-3" style="margin-left:3px;" type="button" href="{{ route('app.intergrities.edit', $child->id)}}"><i class="fas fa-edit"></i></a>
                                                            <a class="btn btn-danger btn-sm rounded-3" style="margin-left:3px;" type="button" onclick="deleteData({{ $child->id }})"><i class="fa fa-trash"></i></a>
                                                            <form id="delete-form-{{ $child->id }}" action="{{ route('app.ita.delete-child',$child->id) }}" method="POST" style="display: none;">
                                                                @csrf
                                                                @method('DELETE')
                                                            </form>  
                                                        </li>
                                                    </ul>
                                                    
                                                  
                                                    <div style="margin-left:40px; margin-top:-5px;">
                                                        <ol>
                                                            @foreach($child->children as $subChild)
                                                                <li class=""><a href="{{ $subChild->url ?? '#' }}" >{{ $subChild->name }}</a>
                                                                    @isset($subChild->file)<a class="btn btn-primary btn-sm rounded-3" style="" type="button" href="{{ route('app.ita.show',$subChild->id) }}" target="_blank"><i class="fas fa-file-pdf"></i></a>@endisset
                                                                    <a class="btn btn-success btn-sm rounded-3" style="" type="button" href="{{ route('app.intergrities.edit', $subChild->id)}}"><i class="fas fa-edit"></i></a>
                                                                    <a class="btn btn-danger btn-sm rounded-3" style="" type="button" onclick="deleteData({{ $subChild->id }})"><i class="fa fa-trash"></i></a>
                                                                    <form id="delete-form-{{ $subChild->id }}" action="{{ route('app.ita.delete-sub-child',$subChild->id) }}" method="POST" style="display: none;">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                    </form>  
                                                                </li>
                                                            @endforeach
                                                        </ol>
                                                    </div>
                                                   
                                                </div>
                                                @endforeach 
                                            @endif
                        </td>
                        <td>{{ $intergrity->user->name}}</td>
                        <td>{{ $intergrity->created_at->diffForHumans() }}</td>
                        <td class="text-center">
                            <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                
                                <a class="btn btn-success btn-sm rounded-3" style="" type="button" href="{{ route('app.intergrities.edit', $intergrity->id)}}"><i class="fas fa-edit"></i></a>
                                <a class="btn btn-danger btn-sm rounded-0" type="button" onclick="deleteData({{ $intergrity->id }})"><i class="fa fa-trash"></i></a>
                                <form id="delete-form-{{ $intergrity->id }}" action="{{ route('app.intergrities.destroy',$intergrity->id) }}" method="POST" style="display: none;">
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
