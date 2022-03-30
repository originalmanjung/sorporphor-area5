@extends('layouts.admin.app')
@push('css')

@endpush
@section('content')


<div class="container-fluid px-4">
    <h1 class="mt-4">Answer Questions</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Q&A</li>
    </ol>

    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div><i class="fas fa-table me-1"></i>ตอบคำถาม Q&A</div>
            <a href="{{ route('app.questions.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-7">
                    <div class="row g-3">
                        <div class="col-md">
                            <div class="card">
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <label for="exampleInputEmail1" class="form-label">ชื่อผู้ถาม:</label>
                                        <p class="form-control">{{ $question->name }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <label for="exampleInputEmail1" class="form-label">กลุ่มงาน:</label>
                                        <p class="form-control">{{ $question->role->name }}</p>
                                    </li>
                                    <li class="list-group-item">
                                        <label for="exampleInputEmail1" class="form-label">คำถาม:</label>
                                        <p class="form-control">{{ $question->description }}</p>
                                    </li>
                                </ul>
                              </div>
                        </div>
                    </div>
                    <form class="row g-3" id="questionFrom" question="form" method="POST" action="{{ isset($question) ? route('app.questions.update',$question->id) : route('app.questions.store') }}">
                        @csrf
                        @if (isset($question))
                            @method('PUT')
                        @endif

                        <div class="col mt-5">
                            <div class="row g-2">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <label for="answer" class="form-label">คำตอบ</label>
                                            <textarea class="form-control @error('answer') is-invalid @enderror" id="answer" name="answer" rows="7">{{ $question->answer ?? old('answer') }}</textarea>
                                            @error('answer')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-12 mt-3">
                <button class="btn btn-primary" onclick="showLoading('กำลังอัฟเดทข้อมูล...',document.getElementById('questionFrom').id);">
                    <i class="fas fa-arrow-circle-up"></i>
                    <span>ส่งคำตอบ</span>
                </button>
            </div>
        </div>
    </div>
    @include('sweetalert::alert')
@endsection
@push('js')
    <script src="{{ asset('js/sweetalert2.all.js') }}"></script>
    <script src="{{ asset('js/admin-script.js') }}"></script>
@endpush

