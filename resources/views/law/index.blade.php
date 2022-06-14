@extends('layouts.frontend.app')
@push('css')
<style>
    /* ITA */
    .faqs {
        position: relative;
        width: 100%;
        padding: 45px 0;
    }

    .faqs .row {
        position: relative;
    }

    .faqs .row::after {
        position: absolute;
        content: "";
        width: 1px;
        height: 100%;
        top: 0;
        left: calc(50% - .5px);
        background: #fd7e14;
    }

    .faqs #accordion-1 {
        padding-right: 15px;
    }

    .faqs #accordion-2 {
        padding-left: 15px;
    }

    @media(max-width: 767.98px) {
        .faqs .row::after {
            display: none;
        }

        .faqs #accordion-1,
        .faqs #accordion-2 {
            padding: 0;
        }

        .faqs #accordion-2 {
            padding-top: 15px;
        }
    }

    .faqs .card {
        margin-bottom: 15px;
        border: none;
        border-radius: 0;
    }

    .faqs .card:last-child {
        margin-bottom: 0;
    }

    .faqs .card-header {
        padding: 0;
        border: none;
        background: #ffffff;
    }

    .faqs .card-header a {
        display: block;
        padding: 10px 25px;
        width: 100%;
        color: #121518;
        font-size: 20px;
        font-weight: bold;
        line-height: 40px;
        border: 1px solid rgba(0, 0, 0, .1);
        transition: .5s;
    }

    .faqs .card-header [data-toggle="collapse"][aria-expanded="true"] {
        background: #fd7e14;
    }

    .faqs .card-header [data-toggle="collapse"]:after {
        font-family: 'font Awesome 5 Free';
        content: "\f067";
        float: right;
        color: #fd7e14;
        font-size: 12px;
        font-weight: 900;
        transition: .5s;
    }

    .faqs .card-header [data-toggle="collapse"][aria-expanded="true"]:after {
        font-family: 'font Awesome 5 Free';
        content: "\f068";
        float: right;
        color: #030f27;
        font-size: 12px;
        font-weight: 900;
        transition: .5s;
    }

    .faqs .card-body {
        padding: 20px 25px;
        font-size: 16px;
        background: #ffffff;
        border: 1px solid rgba(0, 0, 0, .1);
        border-top: none;
    }

    .faqs .card-body ul {
        list-style-type: none;
    }

    .faqs .card-body ul li {
      line-height: 10px;
      margin-left: -38px;
      margin-bottom: -10px;
    }


    .faqs .card-body ul li a h6 {
        margin-left: 10px;

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
                        <h2>กฏหมายที่เกี่ยวข้อง</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- ======= About Section ======= -->
    <section>
        <div class="container">
            <div class="row content">
                <div class="col-lg-12">
                    @if ($laws->isNotEmpty())

                    <div class="faqs">

                        <div class="row mb-5">
                            <div class="col-md-6">
                                <div id="accordion-1">
                                    <div class="card wow fadeInRight" data-wow-delay="0.1s">
                                        @foreach ($laws->slice(0, 4) as $key => $law)
                                        <div class="card-header mb-3">
                                            <a class="card-link collapsed" data-toggle="collapse" aria-expanded="true"  href="#collapse{{ $key }}">
                                                {{ $law->name }}
                                            </a>
                                        </div>
                                        <div id="collapse{{ $key }}" class="collapse show" data-parent="#accordion-2">
                                            <div class="card-body mb-3">
                                                @if($law->children->count() > 0)
                                                   @foreach($law->children as $child)
                                                   <ul>
                                                      <li ><a class="text-success d-flex align-items-center" href="{{ route('law.viewPDF', $child->id)}}" target="_blank"><h6><span><i class="far fa-check-circle text-primary mr-2"></i></span>{{ $child->name }}</h6></a></li>
                                                   </ul>
                                                   @endforeach
                                                @else
                                                   <strong class="text-center">ไม่พบข้อมูล</strong>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="accordion-2">
                                    <div class="card wow fadeInRight" data-wow-delay="0.1s">
                                        @foreach ($laws->slice(4, 10) as $key => $law)
                                        <div class="card-header mb-3">
                                            <a class="card-link collapsed" data-toggle="collapse" aria-expanded="true" href="#collapse{{ $key }}">
                                                {{ $law->name }}
                                            </a>
                                        </div>
                                        <div id="collapse{{ $key }}" class="collapse show" data-parent="#accordion-2">
                                            <div class="card-body mb-3">
                                                @if($law->children->count() > 0)
                                                   @foreach($law->children as $child)
                                                   <ul>
                                                      <li ><a class="text-success d-flex align-items-center" href="{{ route('law.viewPDF', $child->id)}}" target="_blank"><h6><span><i class="far fa-check-circle text-primary mr-2"></i></span>{{ $child->name }}</h6></a></li>
                                                   </ul>
                                                   @endforeach
                                                @else
                                                   <strong class="text-center">ไม่พบข้อมูล</strong>
                                                @endif
                                            </div>
                                        </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

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
