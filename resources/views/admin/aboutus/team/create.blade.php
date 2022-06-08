@extends('admin.body.master')
@section('title', 'Our Team')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Our Team</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.team') }}" method="post" enctype="multipart/form-data" id="teamForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Name: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="name" class="form-control">
                                                @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Post: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="post" class="form-control">
                                                @error('post')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Language: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="language" class="form-control">
                                                @error('language')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Experiences: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="experiences" class="form-control">
                                                @error('experiences')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        {{-- <div class="form-group">
                                            <label>Field Type: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <select  name="type" class="form-control">
                                                    <option value="">Select Field Type</option>
                                                    <option value="Administration">Administration</option>
                                                    <option value="Hiking">Hiking/Trekking</option>
                                                    <option value="Mountainer">Mountainer</option>
                                                    <option value="Safari">Safari</option>
                                                    <option value="Tourguide">Tour Guide</option>
                                                </select>
                                                @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div> --}}

                                            <label for="firstName5"> Image : <span class="text-danger">*</span></label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail" class="form-control" type="text" name="image">

                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                            <div class="form-group">
                                                <label for="firstName5"> Description : <span class="text-danger">*</span></label>
                                                <textarea id="my-editor" class="form-control" name="description"></textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                </div>
                                <div class="text-xs-right" style="float: right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Team" />
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
                $.validator.addMethod('terequired', function(value, element, params) {
                    var idname = $(element).attr('id');
                    var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                    return !params || messageLength.length !== 0;
                }, "Description field is required");
     
     
                $("#teamForm").validate({
                        ignore: [],
                        rules: {
                            name: {
                                required: true,
                            },
                            post: {
                                required: true,
                            },
                            language: {
                                required: true,
                            },
                            experiences: {
                                required: true,
                            },
                            type: {
                                required: true,
                            },
                            image: {
                                required: true,
                            },
                            description: {
                                terequired: true,
                            },
                            
                        },
     
                        messages: {
                            name: {
                                required: "Please enter name",
                            },
                            post: {
                                required: "Please enter post",
                            },
                            language: {
                                required: "Please enter language",
                            },
                            experiences: {
                                required: "Please enter experiences",
                            },
                            type: {
                                required: "Please enter type",
                            },
                            image: {
                                required: "Please enter image",
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
