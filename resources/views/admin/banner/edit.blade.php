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
                        <form action="{{ route('update.banner') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$editbanner->id}}">
                            <input type="hidden" name="old_image" value="{{$editbanner->banner_image}}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5>Banner Title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="title" value="{{$editbanner->title}}" class="form-control">
                                           
                                        </div>
                                    </div>
                                    <div class="">

                                        <label for="firstName5"> Banner Image :</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="blfm" data-input="mainthumbnail" data-preview="holder1"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="mainthumbnail" class="form-control" type="text" name="banner_image">
        
                                        </div>
                                        <img id="holder1" style="margin-top:15px;max-height:100px;" src={{$editbanner->banner_image}}>
                                    </div>
                                </div>

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Banner"/>
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
        var route_prefix = "/laravel-filemanager";
        $('#blfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
@endsection