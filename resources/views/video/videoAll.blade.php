@extends('layouts.frontend.app')
@push('css')
<style>



.block-img-video-1 > a {
  display: block;
  position: relative;
  cursor: pointer; }
  .block-img-video-1 > a .icon {
    position: absolute;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: inline-block;
    top: 50%;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    background: #fff;
    -webkit-transition: .3s all ease-in-out;
    -o-transition: .3s all ease-in-out;
    transition: .3s all ease-in-out; }
    .block-img-video-1 > a .icon > span {
      position: absolute;
      top: 50%;
      font-size: .8rem;
      left: 50%;
      -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
      transform: translate(-50%, -50%);
      color: #000; }
  .block-img-video-1 > a:hover .icon {
    background: #fff;
    width: 50px;
    height: 50px; }

    .top-left {
  position: absolute;
  top: 8px;
  left: 16px;
}
.bottom-right {
  position: absolute;
  bottom: 0px;
  right: 0px;
 background: rgba(0, 0, 0, 0.7);
  font-size: 12px;
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
                        <h2>วีดีโอ สพป.เชียงใหม่ เขต 5</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="row">
             
                    @foreach ($videos as $video)
                   
                        <div class="col-md-3 mt-5 mb-5">
                            <figure class="block-img-video-1" data-aos="fade">
                                <a href="https://vimeo.com/45830194" data-fancybox data-ratio="2">
                                    <span class="icon"><span class="icon-play"></span></span>
                                    <img src="{{ asset('storage/video_photos/' .$video->filename) }}" alt="Image" class="img-fluid">
                                    <div class="top-left text-white">{{ Str::limit($video->name, 65) ?? '' }}</div>
                                      <div class="bottom-right"><p class="card-text text-white p-1">{{ $video->user->name }}</p></div>
                                </a>
                            </figure>
                        </div>
                    @endforeach
                           
            </div>
        </div>
        <div class="d-flex justify-content-center">
                {{ $videos->links('vendor.pagination.custom') }}
        </div>
        
       
    </section>
</main>
@endsection
