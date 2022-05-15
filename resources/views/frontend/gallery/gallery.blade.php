@extends('frontend.main')
@section('title', 'All Images')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Related Images</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Inner Section End -->

   <!-- Gallery Section Start -->
   <section class="gallery-section pt-85 pb-0">
    <div class="container-fluid">
        <div class="row">
            <div class="section-title">
                <h2>{{$gallerydetails->gallery_title}} <span>Tour</span> Related Images</h2>
            </div>
        </div>
       @php 
       $images=explode(',',$gallerydetails->gallery_image);
       @endphp
        <div class="row gallery-items">
            @foreach($images as $gal)
            <div class="col-sm-4 col-grid">
                <div class="gallery-item">
                    <div class="thumb">
                        <img src="{{$gal}}" alt="image" style="width:634px;height:518px">
                        <div class="overlay">
                            <div class="inner">
                                <a href="{{$gal}}" class="icon lightbox-image">
                                    <i class="fa fa-plus"></i>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
<!-- Gallery Section End -->
@endsection
