@extends('layouts.frontend.app')
@push('css')

@endpush
@section('content')
<main id="main" class="bg-white">

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2 style="font-size:3vw;">{{ $standardServices->name ?? 'ไม่พบข้อมูล' }}</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section Begin -->
    <section class="mt-5">
        <div class="container">
        
                @if ($standardServices->children->count() > 0)
                    @foreach ($standardServices->children as $standardService)

                        <div class="d-flex flex-column">
                            <h3 class="card-title">{{ $standardService->name }}</h3>
                            <div class="row mt-3 mb-3">

                            @if ($standardService->children->count() > 0)
                                @foreach($standardService->children as $standardServiceChild)
                                    <div class="col-md-6 mb-4">
                                        <div class="card border-0" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                            <div class="card-body">
                                            <h5 class="card-title">{{ $standardServiceChild->name }}</h5>
                                            <iframe width="100%" height="500" class="embed-responsive-item" src="{{ asset('storage/StandardService_files/'.$standardServiceChild->file) }}"></iframe>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="col-12">
                                    <div class="card text-center border border-1 mt-4 mb-4">
                                        <div class="card-header">
                                            Notification
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text">No information was found at this time.</p>
                                        </div>
                                    </div>
                                </div>
                            @endif

                            </div>
                        </div>
                    @endforeach



                @else
                    <div class="col-12">
                        <div class="card text-center border border-1 mt-4 mb-4">
                            <div class="card-header">
                                Notification
                            </div>
                            <div class="card-body">
                                <p class="card-text">No information was found at this time.</p>
                            </div>
                        </div>
                    </div>
                @endif
        </div>
    </section>
    <!-- Services Section End -->
</main>
@endsection
