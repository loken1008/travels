@extends('admin.body.master')
@section('title', 'Update About Us')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update About Us</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('update.introduction',$editintroduction->id) }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>About Us Title<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="aboutus_title" class="form-control" value="{{$editintroduction->aboutus_title}}">
                                                    @error('aboutus_title')
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
                                                    <input id="mainthumbnail" class="form-control" type="text" name="aboutus_image">
                
                                                </div>
                                                <img id="holder1" style="margin-top:15px;max-height:100px;" src="{{$editintroduction->aboutus_image}}">
                                               
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label for="firstName5"> Description :</label>
                                                  <textarea id="my-editor"  class="form-control" name="aboutus_description" value="{{$editintroduction->aboutus_description}}">{{$editintroduction->aboutus_description}}</textarea>
                                                  @error('aboutus_description')
                                                  <span class="text-danger">{{$message}}</span>
                                                  @enderror
                                                  </div>
                                                </div>
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update"/>
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
@endsection