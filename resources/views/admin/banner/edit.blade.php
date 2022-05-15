@extends('admin.body.master')
@section('title', 'Banner')
@section('content')

    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Edit Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('update.banner') }}" method="post" enctype="multipart/form-data" id="editbannerForm">
                                @csrf
                                <input type="hidden" name="id" value="{{ $editbanner->id }}">
                                <input type="hidden" name="old_image" value="{{ $editbanner->banner_image }}">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Banner Title<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="title" value="{{ $editbanner->title }}"
                                                    class="form-control">

                                            </div>
                                        </div>
                                        <div class="">

                                            <label for="firstName5"> Banner Image :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="blfm" data-input="mainthumbnail" data-preview="holder1"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail" class="form-control" type="text"
                                                    name="banner_image">

                                            </div>
                                            <?php
                                            $file_extension = substr(strrchr($editbanner->banner_image, '.'), 1);
                                            $file_extension = strtolower($file_extension);
                                            ?>
                                            @if ($file_extension == 'mp4')
                                                <iframe src="{{ asset($editbanner->banner_image) }}"
                                                    frameborder="0"></iframe>
                                            @else
                                                <img src="{{ asset($editbanner->banner_image) }}"
                                                    style="height:100px;width:100px" alt="">
                                            @endif
                                        </div>
                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Banner" />
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#editbannerForm").validate({
                rules: {
                    title: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "Please enter banner title",
                    },
                },
            });
        });
    </script>
@endsection
