@extends('frontend.main')
@section('title', 'Gallery')
@section('content')


   <!-- Gallery Section Start -->
   <section class="gallery-section">
    <div class="container">
        <div class="row">
            <div class="section-title">
                <h2>Gallery</h2>
                <div class="chooseus-box layout"></div>
            </div>
        </div>
       
        <div class="row gallery-items">
            @foreach($allgallery as $gal)
            <div class="col-md-4">
                <div class="gallery-item">
                      <a href="{{$gal->cover_image}}" data-lightbox="photos"><img srcset="{{$gal->cover_image}}" alt="mountainguideinfo-image"></a>
                </div>
                    <div class="view-gallery mr-1">
                        <a href="{{route('gallery.details',Str::slug($gal->gallery_title))}}" class="text-decoration-none text-capitalize">
                            {{$gal->gallery_title}}
                        </a>
                    </div>
            </div>
          @endforeach
        </div>
    </div>
</section>
<section class="paginate text-center pt-0 pb-70">
    <div class="container">
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
@include('frontend.common.tour')
@endsection
