@extends('admin.body.master')
@section('title', 'Update Gallery')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Gallery</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('update.gallery',$editgallery->id) }}" method="post" enctype="multipart/form-data" id="editgalleryForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Gallery Title :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="gallery_title" class="form-control" value="{{$editgallery->gallery_title}}">
                                                    @error('gallery_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div>
                                                <label for="firstName5"> Cover Image :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnail" class="form-control" type="text" name="cover_image">
                
                                                </div>
                                                <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$editgallery->cover_image}}">
                                            </div>
                                            <div>
                                                <label for="firstName5"> Related Images :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="mainthumbnails" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnails" class="form-control" type="text" name="gallery_image">
                
                                                </div>
                                                @php
                                                $imagess = explode(',', $editgallery->gallery_image);
                                                
                                              @endphp
                                              @foreach($imagess as $image)
                                                <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$image}}">
                                                @endforeach
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-xs-right mt-2">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Gallery"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "/mountainguide-filemanager";
        $('#blfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
     <script>
        var route_prefix = "/mountainguide-filemanager";
        $('#lfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#editgalleryForm").validate({
                rules: {
                    gallery_title: {
                        required: true,
                    },
                },
                messages: {
                   gallery_title: {
                        required: "Gallery Title is required",
                    },
                },
            });

        });
    </script>
@endsection