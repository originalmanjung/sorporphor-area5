@extends('layouts.frontend.app')
@push('css')
<style>
    .vh-100 {
        min-height: 150vh;
    }
</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2 style="font-size:3vw;">{{ $corruption->name }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section Begin -->
    <section class="mt-5 mb-5">
        <div class="container">
            <iframe class="vh-100" style="height: 100%" height="100%" width=100% src="{{ asset('storage/corruption_files/'.$corruption->file) }}"></iframe>
        </div>
    </section>
    <!-- Services Section End -->
</main>
@endsection
