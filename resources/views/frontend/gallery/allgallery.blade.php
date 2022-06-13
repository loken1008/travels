@extends('frontend.main')
@section('title', 'Gallery')
@section('content')



    <!-- Inner Section Start -->
    <section class="inner-area parallax-bg" data-background="images/bg/px-1.jpg" data-type="parallax" data-speed="3">
        <div class="container">
            <div class="section-content">
                <div class="row">
                    <div class="col-12">
                        <h4>Gallery</h4>
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
                <h2>Mountain Guide <span>Tour</span> Gallery</h2>
            </div>
        </div>
       
        <div class="row gallery-items">
            @foreach($allgallery as $gal)
            <div class="col-sm-4 col-grid">
                <div class="gallery-item">
                    <div class="thumb" style="height:270px">
                        <img src="{{$gal->cover_image}}" alt="image" style="width:634px;height:270px">
                        <div class="overlay">
                            <div class="inner">
                                <a href="{{$gal->cover_image}}" class="icon lightbox-image">
                                    <i class="fa fa-plus"></i>
                                </a>
                                <h4>{{$gal->gallery_title}}</h4>
                                <p>Tour, Travel</p>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="view-gallery mr-1">
                        <a href="{{route('gallery.details',Str::slug($gal->gallery_title))}}" class="read-btn" style="">View Related Images
                            <i class="fa fa-long-arrow-right" aria-hidden="true"></i>
                        </a>
                    </div>
            </div>
          @endforeach
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-center">
                         {{$allgallery->links()}}
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Gallery Section End -->

@endsection
