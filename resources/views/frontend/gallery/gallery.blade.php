@extends('frontend.main')
@section('title', 'All Images')
@section('content')


<section class="gallery-section">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2 class="text-capitalize">{{$gallerydetails->gallery_title}} Images</h2>
                <div class="chooseus-box layout"></div>
            </div>
            <a href="{{ route('allgallery') }}" class="text-decoration-none"><h5 class="text-info">Back to Gallery</h5></a>
        </div>
        @php 
        $images=explode(',',$gallerydetails->gallery_image);
        @endphp
        <div class="row gallery-items">
            @foreach($images as $gal)
            <div class="col-md-4">
                <div class="gallery-item">
                      <a href="{{$gal}}" data-fancybox="gallery"><img srcset="{{$gal}}" alt="mountainguideinfo-image"></a>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
<!-- Gallery Section End -->
@include('frontend.common.tour')
@endsection
