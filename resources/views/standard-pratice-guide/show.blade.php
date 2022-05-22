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
                        <h2 style="font-size:3vw;">คู่มือ/มาตรฐานการปฏิบัติงานของกลุ่ม/หน่วย/บุคลากร</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

      <!-- Services Section Begin -->
    <section class="mt-5">
        <div class="container">
            <div class="row">
            @if ($standardPraticeGuides->isNotEmpty())
                @foreach ($standardPraticeGuides as $standardPraticeGuide)


                        <div class="col-md-6 mb-4">
                            <div class="card border-0" style="box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);">
                                <div class="card-body">
                                  <h5 class="card-title">{{ $standardPraticeGuide->name }}</h5>
                                  <iframe width="100%" height="500" class="embed-responsive-item" src="{{ asset('storage/StandardPraticeGuide_files/'.$standardPraticeGuide->file) }}"></iframe>
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
    </section>
    <!-- Services Section End -->
</main>
@endsection
