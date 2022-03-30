@extends('layouts.home.app')
@push('css')
<link href="https://cdn.jsdelivr.net/npm/simple-datatables@latest/dist/style.css" rel="stylesheet" />
<style>
    .dataTable-table > tbody > tr > td, .dataTable-table > tbody > tr > th, .dataTable-table > tfoot > tr > td, .dataTable-table > tfoot > tr > th, .dataTable-table > thead > tr > td, .dataTable-table > thead > tr > th {
        vertical-align: middle;
        text: center;
    }
</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <!-- ======= Breadcrumbs ======= -->
    <section id="breadcrumbs" class="breadcrumbs">
        <div class="container">
            <div class="d-flex justify-content-between align-items-center">
                <h2>Q&A</h2>
                <ol>
                    <li><a href="{{ route('home') }}">หน้าหลัก</a></li>
                    <li>Q&A ทั้งหมด</li>
                </ol>
            </div>

        </div>
    </section><!-- End Breadcrumbs -->

  <section>
    <div class="container">
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <div><i class="fas fa-table me-1"></i>Q&A ทั้งหมด</div>
                    <a href="{{ route('questions.create') }}" type="button" class="btn btn-danger text-white"><i class="fas fa-plus-circle"></i> สร้าง</a>
                </div>
                <div class="card-body">
                    <table id="datatablesSimple">
                        <thead>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อเรื่อง</th>
                                <th scope="col">ผู้สร้าง</th>
                                <th scope="col">วันที่</th>
                                <th scope="col">จัดการ</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th scope="col">ลำดับที่</th>
                                <th scope="col">ชื่อเรื่อง</th>
                                <th scope="col">ผู้สร้าง</th>
                                <th scope="col">วันที่</th>
                                <th scope="col">จัดการ</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($questions as $key => $question)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $question->title }}</td>
                                <td>{{ $question->description }}</td>
                                <td>{{ $question->created_at->format('d/m/Y') }}</td>
                                <td class="text-center">
                                    <div class="d-grid gap-2 d-md-flex justify-content-md-center">
                                        <a href="{{ route('questions.show', $question->slug)}}" class="btn btn-primary text-white">
                                            คลิกเพื่อดูโพส <span class="badge bg-secondary">views: {{ $question->views ?? '0' }}</span>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
  </section>
    @include('sweetalert::alert')
</main>
@endsection
@push('js')
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@latest" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
<script src="{{ asset('admin/js/datatables-simple-demo.js') }}"></script>
<script src="{{ asset('js/admin-script.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
@endpush
