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
                     <h2>ประวัติความเป็นมา</h2>
                 </div>
              </div>
           </div>
        </div>
     </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= About Section ======= -->
    <section>
        <div class="container">
            <div class="row content">
                <div class="col-lg-12">
                   @if ($histories->isNotEmpty())
                        @foreach ($histories as $history)
                        <div class="card-body">
                            <p class="card-text">{!! $history->description !!}</p>
                        </div>
                        @endforeach
                   @else
                        <div class="card text-center border border-1 mt-4 mb-4">
                            <div class="card-header">
                                Notification
                            </div>
                            <div class="card-body">
                                <p class="card-text">No information was found at this time.</p>
                            </div>
                        </div>
                   @endif
                </div>
            </div>
        </div>
    </section><!-- End About Section -->
</main>
@endsection
