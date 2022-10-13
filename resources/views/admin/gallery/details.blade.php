@extends('admin.body.master')
@section('title', 'Gallery Details')
@section('content')
    <!-- Main content -->
    <section class="content">
        <div id="gallery">
            <div class="box bg-transparent no-shadow b-0">
                <div class="box-body text-center p-0">
                    <div class="btn-group">
                        <h5 >View All  Details</h5>
                    </div>
                </div>
            </div>
            <!-- Default box -->
            <div class="box bg-transparent no-shadow b-0">
                <div class="box-body">
                    <div id="gallery-content">
                        <div>
                            <h5 class="text-center">Gallery Title:{{ $gallerydetails->gallery_title }}</h5>
                        </div>
                        <div class="text-center">
                            <h5 class="text-center">Cover Image</h5>
                            <a href="{{$gallerydetails->cover_image}}" data-toggle="lightbox" data-gallery="multiimages"
                                data-title="Image title will be apear here"><img src="{{$gallerydetails->cover_image}}"
                                    alt="gallery" class="all studio" style="width:350px;height:445px" /> </a>
                               
                        </div>
                               
                       <h5 class="text-center">Related Images</h5>
                        <div id="gallery-content-center">
                     
                            @php
                            $images = explode(',', $gallerydetails->gallery_image);
                        @endphp
                        @foreach ($images as $image)
                            <a href="{{$image}}" data-toggle="lightbox" data-gallery="multiimages"
                                style="width:350px;height:445px;"><img src="{{$image}}"
                                    alt="gallery" class="all studio" style="width:350px;height:445px" /> </a>
                           @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->

    </section>
    <!-- /.content -->

@endsection
