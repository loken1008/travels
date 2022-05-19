@extends('admin.body.master')
@section('title', 'Blog')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Add Blog</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{route('blog.store')}}" method="post" class="tab-wizard wizard-circle" enctype="multipart/form-data" id="blogForm">
                   @csrf
                  
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstName5">Tour :</label>
                                    <select class="form-control" name="tour_id" id="">
                                        <option value="">Select Tour</option>
                                        @foreach($tours as $tour)
                                        <option value="{{$tour->id}}">{{$tour->tour_name}}</option>
                                        @endforeach
                                    </select>
                                    @error('blog_title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Blog Title : <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="blogtitle" value="{{@old('blog_title')}}" name="blog_title">
                                    @error('blog_title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Author Name :</label>
                                    <input type="text" class="form-control" id="authorname" value="{{@old('author_name')}}" name="author_name">
                                    @error('author_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Blog Type :</label>
                                    <input type="text" class="form-control" id="blogtype" value="{{@old('blog_type')}}" name="blog_type">
                                    @error('blog_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5"> Description :</label>
                              <textarea id="my-editor"  class="form-control" name="blog_description"></textarea>
                              @error('blog_description')
                              <span class="text-danger">{{$message}}</span>
                              @enderror
                              </div>
                            </div>
                            <div class="col-md-12">

                                <label for="firstName5"> Blog Image :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="clfm" data-input="mainthumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="mainthumbnail" class="form-control" type="text" name="blog_image">

                                </div>
                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                @error('blog_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                       
                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Add Blog">
                        </div>

                </form>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "/mountainguide-filemanager";
        $('#clfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script>
        var options = {
            filebrowserImageBrowseUrl: '/mountainguide-filemanager?type=Images',
            filebrowserImageUploadUrl: '/mountainguide-filemanager/upload?type=Images&_token=',
            filebrowserBrowseUrl: '/mountainguide-filemanager?type=Files',
            filebrowserUploadUrl: '/mountainguide-filemanager/upload?type=Files&_token='
        };
    </script>
    <script>
        CKEDITOR.replace('my-editor', options);
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
     <script>
        $(document).ready(function() {
            $.validator.addMethod('brequired', function(value, element, params) {
                var idname = $(element).attr('id');
                var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                return !params || messageLength.length !== 0;
            }, "Description field is required");
 
 
            $("#blogForm").validate({
                    ignore: [],
                    rules: {
                        blog_title: {
                            required: true,
                        },
                        author_name: {
                            required: true,
                        },
                        blog_type: {
                            required: true,
                        },
                        blog_description: {
                            brequired: true,
                        },
                        blog_image: {
                            required: true,
                        },
                    },
 
                    messages: {
                        blog_title: {
                            required: "Please enter blog title",
                        },
                        author_name: {
                            required: "Please enter author name",
                        },
                        blog_type: {
                            required: "Please enter blog type",
                        },
                        blog_image: {
                            required: "Please enter blog image",
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
