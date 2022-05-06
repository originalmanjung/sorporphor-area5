@extends('layouts.admin.app')
@push('css')
<style>
 .tree-content a {
     font-size:18px;
     text-decoration: none;
 }
</style>
@endpush
@section('content')
<div class="container-fluid px-4">
    <h1 class="mt-4">Legislation</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">จัดการ ITA</li>
    </ol>
        <div class="d-flex justify-content-end mb-2">
        </div>
    <div class="card mb-4">
        <div class="card-header d-flex justify-content-between align-items-center">
            <div>
                <select class="form-select @error('parent_id') is-invalid @enderror" onchange="window.location.href=this.options[this.selectedIndex].value;">
                    @foreach ($intergrities as $key=>$intergrityItem )
                        <option value="{{ route('app.intergrities.show', $intergrityItem->id)}}" @if(url()->current() == route('app.intergrities.show', $intergrityItem->id)) selected @endif>{{ $intergrityItem->name }}</option>>
                    @endforeach
                </select>
            </div>
            <div><a href="{{ route('app.intergrities.index') }}" type="button" class="btn btn-danger"><i class="fas fa-arrow-circle-left"></i> ย้อนกลับ</a></div>
        </div>
        <div class="card-body">
            <tr>
                <td>
                    @if($intergrity->children->isEmpty())
                        <strong>ไม่มีหัวข้อย่อย</strong>
                    @else
                        <ul class="mt-2">
                            @foreach ($intergrity->children as $child)
                                @include('admin.intergrity.subList', ['subChild' => $child])
                            @endforeach
                        </ul>
                    @endif
                </td>
            </tr>
        </div>
    </div>
</div>
@include('sweetalert::alert')
@endsection
@push('js')
<script src="{{ asset('js/admin-script.js') }}"></script>
<script src="{{ asset('js/sweetalert2.all.js') }}"></script>
@endpush
