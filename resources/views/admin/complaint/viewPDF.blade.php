@extends('layouts.admin.app')
@push('css')
    <style>
        .vh-100 {
            min-height: 100vh;
        }
    </style>
@endpush
@section('content')
<div class="p-5">

    <div class="card">
        <div class="card-header d-flex align-items-center">
         <div class="me-auto">รายละเอียด</div>
          <a href="{{ url()->previous() }}" class="btn btn-danger">ย้อนกลับ</a>
        </div>
        <iframe class="vh-100" style="height: 100%" height="100%" width=100% src="{{ asset('storage/complaint_files/'.$complaint->file) }}"></iframe>

    </div>
</div>
@endsection
