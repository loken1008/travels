@extends('admin.body.master')
@section('title', 'Home Page')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">

@if($homePage->count()>0)
<div class="col-12">
    @else
            <div class="col-6">
                @endif
            

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Homepage List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Home Page Title</th>
                                        <th>Sub Title</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($homePage as $homepage)
                                        <tr>
                                            <td>{{ $homepage->title }}</td>
                                            <td>{{$homepage->subtitle}}</td>
                                            <td>
                                                <a href="{{ route('homepage.edit', $homepage->id) }}" class="btn btn-info"
                                                    style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('homepage.delete', $homepage->id) }}"
                                                    class="btn btn-danger" style="width:5rem" id="delete"
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
            @if($homePage->count()<1)
            <div class="col-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('homepage.store') }}" method="post" id="homepageForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Title<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="title" class="form-control">
                                                @error('title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Sub Title<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="subtitle" class="form-control">
                                                @error('subtitle')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Description<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <textarea name="description" class="form-control"></textarea>
                                                @error('description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="">

                                            <label for="firstName5"> First Image :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="hblfm" data-input="mainthumbnail" data-preview="holder"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail" class="form-control" type="text" name="main_image">
            
                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                                            @error('main_image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="">

                                            <label for="firstName5"> Second Image :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="hmblfm" data-input="mainthumbnail1" data-preview="holder1"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail1" class="form-control" type="text" name="image">
            
                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                                            @error('image')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <h5>Image Alt<span class="text-danger">*</span></h5>
                                            <div class="controls">
                                                <input type="text" name="img_alt" class="form-control">
                                                @error('img_alt')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Title</h5>
                                            <div class="controls">
                                                <input type="text" name="meta_title" class="form-control">

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Keywords</h5>
                                            <div class="controls">
                                                <textarea name="meta_keywords" class="form-control">Meta Keywords</textarea>

                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <h5>Meta Description</h5>
                                            <div class="controls">
                                                <textarea name="meta_description" class="form-control">Meta Description</textarea>

                                            </div>
                                        </div>
                                    </div>

                                </div>
                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add" />
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "/mgiadmin/mountainguide-filemanager";
        $('#hblfm').filemanager('images', {
            prefix: route_prefix
        });
        $('#hmblfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#homepageForm").validate({
                rules: {
                    title: {
                        required: true,
                    },
                    subtitle: {
                        required: true,
                    },
                },
                messages: {
                    title: {
                        required: "Please enter  title",
                    },
                    subtitle: {
                        required: "Please enter  subtitle",
                    },
                },
            });
        });
    </script>
@endsection
