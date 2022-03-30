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
          <a href="{{ route('app.histories.index') }}" class="btn btn-danger">ย้อนกลับ</a>
        </div>
        <div class="card-body">
          <p class="card-text">{!! $history->description !!}</p>
        </div>
    </div>
</div>
@endsection
