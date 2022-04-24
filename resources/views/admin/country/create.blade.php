@extends('admin.body.master')
@section('title', 'Country')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Add Country</h4>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{route('country.store')}}" method="post" class="tab-wizard wizard-circle" enctype="multipart/form-data">
                   @csrf
                  
                    <section>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="firstName5">Country Name :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{@old('country_name')}}" name="country_name">
                                    @error('country_name')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="firstName5">Start Price :</label>
                                    <input type="text" class="form-control" id="firstName5" value="{{@old('start_price')}}" name="start_price">
                                    @error('start_price')
                                    <span class="text-danger">{{$message}}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">

                                <label for="firstName5"> Country Image :</label>
                                <div class="input-group">
                                    <span class="input-group-btn">
                                        <a id="clfm" data-input="mainthumbnail" data-preview="holder"
                                            class="btn btn-primary">
                                            <i class="fa fa-picture-o"></i> Choose
                                        </a>
                                    </span>
                                    <input id="mainthumbnail" class="form-control" type="text" name="country_image">

                                </div>
                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                @error('country_image')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group">
                          <label for="firstName5">Country Description :</label>
                        <textarea id="my-editor"  class="form-control" name="description"></textarea>
                        @error('description')
                        <span class="text-danger">{{$message}}</span>
                        @enderror
                        </div>
                        <div class="box-footer">
                            <input type="submit" class="btn btn-rounded btn-info pull-right" value="Add Country">
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
        var route_prefix = "laravel-filemanager";
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
