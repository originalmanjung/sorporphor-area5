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
          <a href="{{ route('app.noticeSchools.index') }}" class="btn btn-danger">ย้อนกลับ</a>
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $noticeSchool->name }}</h5>
          <p class="card-text">{{ $noticeSchool->description }}</p>
        </div>
        @if (empty($noticeSchool->file))
            <div class="mb-2" align="center">
                <h5><span class="badge bg-danger">ไม่มีเอกสารแนบ</span></h5>
            </div>
        @else
            <iframe class="vh-100" style="height: 100%" height="100%" width=100% src="{{ asset('storage/noticeSchool_files/'.$noticeSchool->file) }}"></iframe>
        @endif
    </div>
</div>
@endsection
