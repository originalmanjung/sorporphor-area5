@extends('layouts.admin.app')
@section('content')
    <div class="container-fluid px-4">
        <h1 class="mt-4">Dashboard</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">จำนวณ ร้องเรียน-ร้องทุกข์ ทั้งหมด {{ $complaints->count() }} เรื่อง</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('app.complaints.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">จำนวณ รับฟังความคิดเห็น ทั้งหมด {{ $opinions->count() }} เรื่อง</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('app.opinions.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">จำนวณ Q&A ทั้งหมด {{ $questions->count() }} เรื่อง</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('app.questions.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">จำนวณ กิจกรรม ทั้งหมด {{ $news->count() }} เรื่อง</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="{{ route('app.news.index') }}">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                DataTable Example
            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ลำด้บ</th>
                            <th>E-mail</th>
                            <th>Name</th>
                            <th>สิทธิ์</th>
                            <th>สร้างเมื่อ</th>
                            <th>อัฟเดทเมื่อ</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ลำดับ</th>
                            <th>E-mail</th>
                            <th>Name</th>
                            <th>สิทธิ์</th>
                            <th>สร้างเมื่อ</th>
                            <th>อัฟเดทเมื่อ</th>
                        </tr>
                    </tfoot>
                    <tbody>
                     @foreach ($users as $key => $user)
                        <tr>
                            <td>{{ $key+1 }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <div class="d-flex align-items-center">
                                    <div><img width="40" height="40" class="rounded-circle" src="{{ isset($user->avatar) ? asset('storage/user_avatars/'.$user->avatar) : config('app.placeholder').'150.png' }}" alt="User Avatar"></div>
                                    <div class="d-flex flex-column user-name-table">
                                        <div>{{ $user->name }}</div>
                                        <div>
                                            @if ($user->role)
                                                <span class="badge bg-primary">{{ $user->role->name }}</span>
                                            @else
                                                <span class="badge bg-danger">No role found :</span>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                @if ($user->status == '1')
                                    <span class="badge bg-success">Active</span>
                                @else
                                    <span class="badge bg-danger">Inactive</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->diffForHumans() }}</td>
                            <td>{{ $user->updated_at->diffForHumans() }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
@push('js')
@endpush
