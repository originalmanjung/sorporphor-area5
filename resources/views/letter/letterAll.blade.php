@extends('layouts.frontend.app')
@push('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.8.5/venobox.min.css" integrity="sha512-fLPVtIsNNyEUkM4/gtK7Hsw15w2BdvqGD93vDeUIWTKWSTs71DZVL9Ay2ZoiJOL1GfS5zkIcpdzsvqNiZ0T/AQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<style>
    #venue {
        padding: 60px 0;
    }

    #venue .container-fluid {
        margin-bottom: 3px;
    }

    #venue .venue-gallery-container {
        padding-right: 12px;
    }

    #venue .venue-gallery {
        overflow: hidden;
        border-right: 3px solid #fff;
        border-bottom: 3px solid #fff;
    }

    #venue .venue-gallery img {
        transition: all ease-in-out 0.4s;
    }

    #venue .venue-gallery:hover img {
        -webkit-transform: scale(1.1);
        transform: scale(1.1);
    }

</style>
@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.8.5/venobox.min.js" integrity="sha512-b8e+5lyQcc3HPI1Om9n0BYq2XNuUtEmABdppZxXn2L2hbDeW/kUGOrILuQKSVn2jPHcXI7C0oRDPR1nJdyfBlQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        // Initialize Venobox
        $('.venobox').venobox({
            framewidth : '800px',                            // default: ''
            frameheight: '1200px',                            // default: ''
            bgcolor: '',
            overlayColor: 'rgba(6, 12, 34, 0.85)',
            closeBackground: '',
            closeColor: '#fff'
        });
    </script>
@endpush
@endpush
@section('content')
<main id="main" class="bg-white">

    <div class="back_re">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="title">
                        <h2>@if($letter->type == 'district') จดหมายข่าวโรงเรียน @elseif($letter->type == 'region') จดหมายข่าว สพป. @endif</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <section id="venue" class="wow fadeInUp">

        <div class="container-fluid">

            <div class="container-fluid venue-gallery-container">
                <div class="row no-gutters">

                    @if ($letters->isNotEmpty())
                    @foreach ($letters as $letter)
                    <div class="col-lg-3 col-md-4">
                        <div class="venue-gallery">
                            <a href="{{ asset('storage/letter_files/'. $letter->file) }}" class="venobox" data-gall="venue-gallery">
                                <img src="{{ asset('storage/letter_files/'. $letter->file) }}" alt="" class="img-fluid">
                            </a>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-8 card text-center border border-1 mx-auto">
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
             <div class="d-flex justify-content-center">
                {{ $letters->links('vendor.pagination.custom') }}
            </div>
        </div>
    </section>

</main>
@endsection
