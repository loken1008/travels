@extends('admin.body.master')
@section('title', 'Testmonial')
@section('content')

   <!-- Main content -->
   <section class="content">
    <div class="row">

        <div class="col-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Edit Testmonial</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table">
                        <form action="{{ route('update.testmonial') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" value="{{$edittestmonial->id}}">
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <h5> Name<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="name" value="{{$edittestmonial->name}}" class="form-control">
                                            @error('name')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <h5> Message title<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <input type="text" name="message_title" value="{{$edittestmonial->message_title}}" class="form-control">
                                            @error('message_title')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-12">

                                        <label for="firstName5">  Image :</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="blfm" data-input="mainthumbnail" data-preview="holder1"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="mainthumbnail" class="form-control" type="text" name="image">
        
                                        </div>
                                        <img id="holder1" style="margin-top:15px;max-height:100px;" src={{$edittestmonial->image}}>
                                    </div>
                                    <div class="form-group">
                                        <h5> Message Description<span class="text-danger">*</span></h5>
                                        <div class="controls">
                                            <textarea  name="message_description"rows="10" cols="20" class="form-control" value="{{$edittestmonial->message_description}}">{{$edittestmonial->message_description}}</textarea>
                                            @error('message_description')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <div class="text-xs-right">
                                <input type="submit" class="btn btn-rounded btn-info" value="Update Testmonial"/>
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