@extends('layouts.frontend.app')
@push('css')
<style>


</style>
@endpush
@section('content')
<main id="main" class="bg-white">

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>หลักเกณฑ์การบริหารและพัฒนาทรัพยากรบุคคล</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= About Section ======= -->
    <section>
        <div class="container">
            <div class="p-5">

                <div class="card">
                    <div class="card-header d-flex align-items-center">
                        รายละเอียด
                    </div>
                    <div class="card-body">

                        <p class="card-text">{{ $humanResource->name }}</p>

                    </div>
                    <iframe class="vh-100" style="height: 600px;" src="{{ asset('storage/humanResource_files/'.$humanResource->file) }}"></iframe>
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
</main>
@endsection
