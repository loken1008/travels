@extends('admin.body.master')
@section('title', 'Banner')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('homepage.update',$edithomepage->id) }}" method="post" enctype="multipart/form-data" id="edithomepageForm">
                                @csrf
                             
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Title<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="title" class="form-control" value="{{$edithomepage->title}}">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Sub Title<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subtitle" class="form-control" value="{{$edithomepage->subtitle}}">
                                                @error('subtitle')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="description" class="form-control" value="{{$edithomepage->description}}">{{$edithomepage->description}}</textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="">

                                            <label for="firstName5"> First Image :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="hblfm" data-input="mainthumbnail" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail" class="form-control" type="text" name="main_image">
            
                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$edithomepage->main_image}}">
                                            @error('main_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">

                                            <label for="firstName5"> Second Image :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="hmblfm" data-input="mainthumbnail" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail" class="form-control" type="text" name="image">
            
                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$edithomepage->image}}">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Image Alt<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="img_alt" class="form-control" value="{{$edithomepage->img_alt}}">
                                                @error('img_alt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Title</h5>
                                            <div class="controls">
                                                <input type="text" name="meta_title" class="form-control" value="{{$edithomepage->meta_title}}">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Keywords</h5>
                                            <div class="controls">
                                                <textarea name="meta_keywords" class="form-control" value="{{$edithomepage->meta_keywords}}">{{$edithomepage->meta_keywords}}</textarea>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Description</h5>
                                            <div class="controls">
                                                <textarea name="meta_description" class="form-control" value="{{$edithomepage->meta_description}}">{{$edithomepage->meta_description}}</textarea>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update" />
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
        var route_prefix = "/mgiadmin/mountainguide-filemanager";
        $('#hblfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#hmblfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#edithomepageForm").validate({
                rules: {
                    title: {
                        required: true,
                    },
                    subtitle: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "Please enter  title",
                    },
                    subtitle: {
                        required: "Please enter  subtitle",
                    },
                },
            });
        });
    </script>
@endsection
