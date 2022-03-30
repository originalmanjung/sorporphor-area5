@extends('layouts.admin.app')
@push('css')
    <style>
        iframe {
            margin-bottom: -70px;
        }
    </style>
@endpush
@section('content')
<div class="p-5">

    <div class="card">
        <div class="card-header d-flex align-items-center">
         <div class="me-auto">รายละเอียด</div>
          <a href="{{ route('app.menuPersonalWorks.index') }}" class="btn btn-danger">ย้อนกลับ</a>
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $menuPersonalWork->name }}</h5>
        </div>
        <div class="card h-100">
            <iframe class="vh-100" style="height: 100%" height="100%" width=100% src="{{ asset('storage/menuPersonalWork_files/'.$menuPersonalWork->file) }}"></iframe>
        </div>
    </div>
</div>
@endsection
