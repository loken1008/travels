@extends('admin.body.master')
@section('title', 'Choose Us')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Choose Us</h3>
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
                                    @forelse($chooseus as $choose)
                                        <tr>
                                            <td>{{ $choose->title }}</td>
                                            <td>{!! Str::limit($choose->description,100) !!}</td>
                                            <td><img src="{{ asset($choose->image) }}" style="height:100px;width:100px"
                                                    alt="">
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary"
                                                    style="width:5rem" title="view" data-toggle="modal" data-target="#exampleModal{{$choose->id}}"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('edit.choose', $choose->id) }}" class="btn btn-info mt-2"
                                                    style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.choose', $choose->id) }}"
                                                    class="btn btn-danger mt-2" style="width:5rem" id="delete"
                                                    title="delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <div class="modal fade" id="exampleModal{{ $choose->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content bg-white" >
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">View Detail</h5>
                                                        <input type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close" style="height:10px;margin-top:-5px">
                                                        <span aria-hidden="true">&times;</span>
                                                        </input>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p><span class="font-weight-bold">Title:</span> {{ $choose->title }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <img src="{{ $choose->image }}" height="300"
                                                                    width="100%" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <p class="text-justify"><span class="font-weight-bold">Description:</span> {!! $choose->description !!}</p>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
         
            <div class="col-4">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Choose Us</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.choose') }}" method="post" enctype="multipart/form-data" id="chooseForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Choose Us Title: <span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <input type="text" name="title" class="form-control">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

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
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Choose Us" />
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
               $.validator.addMethod('crequired', function(value, element, params) {
                   var idname = jQuery(element).attr('id');
                   var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
                   return !params || messageLength.length !== 0;
               }, "Description field is required");
    
    
               $("#chooseForm").validate({
                       ignore: [],
                       rules: {
                            title: {
                                 required: true,
                            },
                            image: {
                                 required: true
                            },
                            description: {
                                 crequired: true
                            }
                       },
    
                       messages: {
                            title: {
                                 required: "Title field is required",
                            },
                            image: {
                                 required: "Image field is required"
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
