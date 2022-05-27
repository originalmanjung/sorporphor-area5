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
          <a href="{{ route('app.budgets.index') }}" class="btn btn-danger">ย้อนกลับ</a>
        </div>
        <div class="card-body">
          <h5 class="card-title">{{ $budget->name }}</h5>
          <p class="card-text">{{ $budget->description }}</p>
        </div>
        @if (empty($budget->file))
            <div class="mb-2" align="center">
                <h5><span class="badge bg-danger">ไม่มีเอกสารแนบ</span></h5>
            </div>
        @else
            <iframe class="vh-100" style="height: 100%" height="100%" width=100% src="{{ asset('storage/budget_files/'.$budget->file) }}"></iframe>
        @endif
    </div>
</div>
@endsection
