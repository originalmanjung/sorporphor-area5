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
    <h1 class="mt-4">Personals</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">บุคลากรในสังกัด</li>
    </ol>

    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>บุคลากรในสังกัด ทั้งหมด</div>
            @can('app.personals.create')
            <a href="{{ route('app.personals.create') }}" type="button" class="btn btn-primary"><i class="fas fa-plus-circle"></i> สร้าง</a>
            @endcan
        </div>
        <div class="card-body">
            <table id="datatablesSimple">
                <thead>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">กลุ่มงาน</th>
                        <th scope="col">ตำแหน่ง</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th scope="col">รูป</th>
                        <th scope="col">ชื่อ</th>
                        <th scope="col">กลุ่มงาน</th>
                        <th scope="col">ตำแหน่งทางการบริหาร</th>
                        <th scope="col">สถานะ</th>
                        <th scope="col">ผู้สร้าง</th>
                        <th scope="col">การจัดการ</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach ($personals as $key => $personal)
                        <tr>
                            <td><img src="{{ $personal->avatar ? asset('storage/personal_avatars/'.$personal->avatar) : config('app.placeholder').'150.png' }}" alt="Admin" class="rounded-circle" width="70" height="70"></td>
                            <td>{{ $personal->name ?? 'ยังไม่มีข้อมูล' }}</td>
                            <td>
                                @if ($personal->group == 'กลุ่มบริหารงานการเงินและสินทรัพย์')
                                    กลุ่มบริหารการเงินและสินทรัพย์
                                @else
                                    {{ $personal->group ?? 'ยังไม่มีข้อมูล' }}
                                @endif
                            </td>
                            <td>
                                @if ($personal->group == 'กลุ่มบริหารงานการเงินและสินทรัพย์')
                                    ผู้อำนวยการกลุ่มบริหารการเงินและสินทรัพย์
                                @else
                                    @if ($personal->position_general) 
                                        {{ $personal->position_general }} 
                                    @elseif ($personal->position_sub)  
                                        {{ $personal->position_sub }}   
                                    @elseif ($personal->position) 
                                        {{ $personal->position }} 
                                    @else 
                                        {{ 'ไม่พบข้อมูล' }} 
                                    @endif
                                @endif
                            </td>
                            <td>
                                @if ($personal->status == '1')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $personal->user->name }}</td>
                            <td class="text-center">
                                <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                    <a href="{{ route('app.personals.show', $personal->id)}}" class="btn btn-primary btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Add"><i class="fa fa-table"></i></a>
                                    <a href="{{ route('app.personals.edit', $personal->id)}}" class="btn btn-success btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                    @if ($personal->deletable == true)
                                    <a class="btn btn-danger btn-sm" type="button" data-toggle="tooltip" data-placement="top" title="Delete" onclick="deleteData({{ $personal->id }})"><i class="fa fa-trash"></i></a>
                                    <form id="delete-form-{{ $personal->id }}" action="{{ route('app.personals.destroy',$personal->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                    @endif
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
