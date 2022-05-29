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
        <div class="card-body">
          <h5 class="card-title">{{ $law->name }}</h5>
          <p class="card-text">{{ $law->description }}</p>
        </div>
            <iframe class="vh-100" style="height: 100%" height="100%" width=100% src="{{ asset('storage/law_files/'.$law->file) }}"></iframe>
    </div>
</div>
@endsection
