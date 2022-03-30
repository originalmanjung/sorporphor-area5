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
            <a href="{{ route('app.questions.index') }}" class="btn btn-danger">ย้อนกลับ</a>
        </div>
        <div class="card-body">

           <div class="row g-2">
            <div class="col-md-8 order-2">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="badge bg-success form-label fs-5">หัวข้อเรื่อง:</label>
                    <p class="card-text fs-5">{{ $question->title }}</p>
                </div>
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="badge bg-secondary form-label fs-5">เนื้อหา:</label>
                    <p class="card-text fs-5">{{ $question->description }}</p>
                </div>
                <hr>

                @comments([
                    'model' => $question,
                    'perPage' => 5
                ])
            </div>
            <div class="col-md-4 order-1 order-md-2">
                <div class="card">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">ชื่อผู้โพส: {{ $question->name  }}</li>
                        <li class="list-group-item">เบอร์โทรศัพท์: {{ $question->phone }}</li>
                        <li class="list-group-item">อีเมลล์: {{ $question->email }}</li>
                    </ul>

                </div>
            </div>
           </div>

        </div>
    </div>
</div>
@endsection
