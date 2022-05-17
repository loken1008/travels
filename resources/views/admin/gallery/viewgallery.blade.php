@extends('admin.body.master')
@section('title', 'Gallery')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Gallery List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Gallery Title</th>
                                            <th>Cover Image</th>
                                            {{-- <th>Status</th> --}}
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($gallerys as $gallery)
                                            <tr>
                                                <td>{{ $gallery->gallery_title }}</td>
                                                <td><img src="{{asset($gallery->cover_image)}}"
                                                        style="height:100px;width:100px" alt="">
                                                    </td>
                                                    {{-- <td>
                                                    @if($gallery->status==  1)
                                                    <span class="badge badge-info">Active</span>
                                                    @else 
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                    </td> --}}
                                                <td>
                                                    <a href="{{route('view.gallery',$gallery->id)}}" class="btn btn-primary" style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('edit.gallery',$gallery->id)}}" class="btn btn-info" style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('delete.gallery',$gallery->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
                                                    {{-- @if($gallery->status==1)
                                                    <a href="{{route('active.gallery',$gallery->id)}}" class="btn btn-primary" style="width:5rem" title="Active"><i class="fa fa-unlock"></i></a>
                                                    @else
                                                    <a href="{{route('inactive.gallery',$gallery->id)}}" class="btn btn-warning" style="width:5rem" title="Inactive"><i class="fa fa-lock"></i></a>
                                                    @endif --}}
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
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Gallery</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('store.gallery') }}" method="post" enctype="multipart/form-data" id="galleryForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Gallery Title :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="gallery_title" class="form-control">
                                                    @error('gallery_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div>
                                                <label for="firstName5"> Cover Image :<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnail" class="form-control" type="text" name="cover_image">
                
                                                </div>
                                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                                @error('cover_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <div>
                                                <label for="firstName5"> Related Images :<span class="text-danger">*</span></label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="lfm" data-input="mainthumbnails" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnails" class="form-control" type="text" name="gallery_image">
                
                                                </div>
                                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                                @error('gallery_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Gallery"/>
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
     <script>
        var route_prefix = "/laravel-filemanager";
        $('#lfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
         <script>
             $(document).ready(function() {
                 $("#galleryForm").validate({
                     rules: {
                         gallery_title: {
                             required: true,
                         },
                         cover_image: {
                             required: true
     
                         },
                         gallery_image: {
                             required: true
                         },
                     },
                     messages: {
                        gallery_title: {
                             required: "Gallery Title is required",
                         },
                         cover_image: {
                             required: "Cover Image is required",
                         },
                         gallery_image: {
                             required: "Gallery Images is required ",
                         },
     
                     },
                 });
     
             });
         </script>
@endsection