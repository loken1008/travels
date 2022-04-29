@extends('admin.body.master')
@section('title', 'Introduction ')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-6">

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

            <div class="col-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Choose Us</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.introduction') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>About Us Title<span class="text-danger">*</span></label>
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
                                                name="aboutus_image">

                                        </div>
                                        <img id="holder1" style="margin-top:15px;max-height:100px;">
                                        @error('aboutus_image')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                        <div class="form-group">
                                            <label for="firstName5"> Description :</label>
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
