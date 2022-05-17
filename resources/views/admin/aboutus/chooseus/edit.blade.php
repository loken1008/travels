@extends('admin.body.master')
@section('title', 'Update Choose Us')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Choose Us</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('update.choose',$editchoose->id) }}" method="post" enctype="multipart/form-data" id="echooseForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Choose Us Title: <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title" class="form-control" value="{{$editchoose->title}}">
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">

                                                <label for="firstName5"> Image :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnail" class="form-control" type="text" name="image">
                
                                                </div>
                                                <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$editchoose->image}}">
                                               
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="firstName5"> Description : <span class="text-danger">*</span></label>
                                                  <textarea id="my-editor"  class="form-control" name="description" value="{{$editchoose->description}}">{{$editchoose->description}}</textarea>
                                                  @error('description')
                                                  <span class="text-danger">{{$message}}</span>
                                                  @enderror
                                                  </div>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Choose Us"/>
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
        <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    
        <script>
            var route_prefix = "/laravel-filemanager";
            $('#blfm').filemanager('images', {
                prefix: route_prefix
            });
        </script>
           <script>
            var options = {
                filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
                filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
                filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
                filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
            };
        </script>
          <script>
            CKEDITOR.replace('my-editor', options);
        </script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
         
            <script>
                $(document).ready(function() {
                    $.validator.addMethod('crequired', function(value, element, params) {
                        var idname = jQuery(element).attr('id');
                        var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                        return !params || messageLength.length !== 0;
                    }, "Description field is required");
         
         
                    $("#echooseForm").validate({
                            ignore: [],
                            rules: {
                                 title: {
                                      required: true,
                                 },
                                
                                 description: {
                                      crequired: true
                                 }
                            },
         
                            messages: {
                                 title: {
                                      required: "Title field is required",
                                 },
                                
                            },
                        submitHandler: function() {
                            //you can add code here to recombine the variants into one value if you like, before doing a $.post
                            form.submit();
                            alert('successful submit');
                            return false;
                        }
                    });
                });
            </script>
@endsection