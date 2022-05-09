@extends('admin.body.master')
@section('title', 'Banner')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Banner List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Banner Title</th>
                                            <th>Banner Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($banners as $banner)
                                            <tr>
                                                <td>{{ $banner->title }}</td>
                                                <td>
                                                    <?php
                                                        $file_extension = substr(strrchr($banner->banner_image ,'.'),1);
                                                        $file_extension = strtolower($file_extension);
                                                    ?>
                                                        @if ($file_extension == "mp4")
                                                        <iframe src="{{asset($banner->banner_image)}}" frameborder="0"></iframe>
                                                   
                                                        @else  
                                                        <img src="{{asset($banner->banner_image)}}"
                                                        style="height:100px;width:100px" alt="">
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if($banner->status==  1)
                                                    <span class="badge badge-info">Active</span>
                                                    @else 
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                    </td>
                                                <td>
                                                    <a href="{{route('edit.banner',$banner->id)}}" class="btn btn-info" style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('delete.banner',$banner->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
                                                    @if($banner->status==1)
                                                    <a href="{{route('active.banner',$banner->id)}}" class="btn btn-primary mt-2" style="width:5rem" title="Active"><i class="fa fa-unlock"></i></a>
                                                    @else
                                                    <a href="{{route('inactive.banner',$banner->id)}}" class="btn btn-warning mt-2" style="width:5rem" title="Inactive"><i class="fa fa-lock"></i></a>
                                                    @endif
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
                            <h3 class="box-title">Add Banner</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('store.banner') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Banner Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="title" class="form-control">
                                                    @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="">

                                                <label for="firstName5"> Banner Image :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="blfm" data-input="mainthumbnail" data-preview="holder"
                                                            class="btn btn-primary">
                                                            <i class="fa fa-picture-o"></i> Choose
                                                        </a>
                                                    </span>
                                                    <input id="mainthumbnail" class="form-control" type="text" name="banner_image">
                
                                                </div>
                                                <img id="holder1" style="margin-top:15px;max-height:100px;">
                                                @error('banner_image')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Banner"/>
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