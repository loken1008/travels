@extends('admin.body.master')
@section('title', 'Blog')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Update Blog</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{route('blog.update',$editblog->id)}}" method="post" class="tab-wizard wizard-circle" enctype="multipart/form-data">
                   @csrf
                  
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                            
                                <div class="form-group">
                                    <label for="firstName5">Blog Title :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{$editblog->blog_title}}" name="blog_title">
                                    @error('blog_title')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Author Name :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{$editblog->author_name}}" name="author_name">
                                    @error('author_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Blog Type :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{$editblog->blog_type}}" name="blog_type">
                                    @error('blog_type')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                
                            </div>
                            <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5"> Description :</label>
                              <textarea id="my-editor"  class="form-control" name="blog_description" value={{$editblog->blog_description}}>{{$editblog->blog_description}}</textarea>
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
                                <img id="holder1" style="margin-top:15px;max-height:100px;" src={{$editblog->blog_image}}>
                            </div>
                        </div>
                       
                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Update Blog">
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
        var route_prefix = "/laravel-filemanager";
        $('#clfm').filemanager('images', {
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
@endsection
