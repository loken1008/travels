@extends('admin.body.master')
@section('title', 'Introduction ')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-7">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Introduction </h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th> Title</th>
                                        <th>Description </th>
                                        <th>Image</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($introduction as $intro)
                                        <tr>
                                            <td>{{ $intro->aboutus_title }}</td>
                                            <td>{!! Str::limit($intro->aboutus_description,100) !!}</td>
                                            <td><img src="{{ asset($intro->aboutus_image) }}"
                                                    style="height:100px;width:100px" alt="">
                                            </td>
                                            <td>
                                                <a href="{{ route('view.introduction', $intro->id) }}"
                                                    class="btn btn-primary" style="width:5rem" title="view"><i
                                                        class="fa fa-eye"></i></a>
                                                <a href="{{ route('edit.introduction', $intro->id) }}"
                                                    class="btn btn-info mt-2" style="width:5rem" title="edit"><i
                                                        class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.introduction', $intro->id) }}"
                                                    class="btn btn-danger mt-2" style="width:5rem" id="delete"
                                                    title="delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

            <div class="col-5">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add About Us</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.introduction') }}" method="post" enctype="multipart/form-data" id="introForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>About Us Title: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="aboutus_title" class="form-control">
                                                @error('aboutus_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                        <label for="firstName5"> Image :</label>
                                        <div class="input-group">
                                            <span class="input-group-btn">
                                                <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                            <input id="mainthumbnail" class="form-control" type="text"
                                                name="aboutus_image"><br>

                                        </div>
                                        <img id="holder1" style="margin-top:15px;max-height:100px;">
                                        @error('aboutus_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="firstName5"> Description : <span class="text-danger">*</span></label>
                                            <textarea id="my-editor" class="form-control" name="aboutus_description"></textarea>
                                            @error('aboutus_description')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                </div>

                                @if ($introduction->count() < 1)
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add" />
                                    </div>
                                @endif
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
        var route_prefix = "/mountainguide-filemanager";
        $('#blfm').filemanager('images', {
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
           $.validator.addMethod('irequired', function(value, element, params) {
               var idname = jQuery(element).attr('id');
               var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
               return !params || messageLength.length !== 0;
           }, "About Us Description field is required");


           $("#introForm").validate({
                   ignore: [],
                   rules: {
                          aboutus_title: {
                            required: true,
                          },
                          aboutus_image: {
                            required: true,
                          },
                          aboutus_description: {
                            irequired: true
                          },
                   },

                   messages: {
                          aboutus_title: {
                            required: "Please enter title",
                          },
                          aboutus_image: {
                            required: "Please upload image",
                          }
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
