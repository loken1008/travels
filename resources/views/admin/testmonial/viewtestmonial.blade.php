@extends('admin.body.master')
@section('title', 'Testmonial')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Testmonial List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Testmonial Title</th>
                                            <th>Testmonial</th>
                                            <th> Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($testmonials as $testmonial)
                                            <tr>
                                                <td>{{ $testmonial->name }}</td>
                                                <td>{{ $testmonial->message_title }}</td>
                                                <td>{{$testmonial->message_description}}</td>
                                                <td><img src="{{asset($testmonial->image)}}"
                                                        style="height:100px;width:100px" alt="">
                                                    </td>
                                                    <td>
                                                        @if($testmonial->status==  1)
                                                    <span class="badge badge-info">Active</span>
                                                    @else 
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                    </td>
                                                <td>
                                                    <a href="{{route('edit.testmonial',$testmonial->id)}}" class="btn btn-info" style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('delete.testmonial',$testmonial->id)}}" class="btn btn-danger mt-2" style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
                                                    @if($testmonial->status==1)
                                                    <a href="{{route('active.testmonial',$testmonial->id)}}" class="btn btn-primary mt-2" style="width:5rem" title="Active"><i class="fa fa-unlock"></i></a>
                                                    @else
                                                    <a href="{{route('inactive.testmonial',$testmonial->id)}}" class="btn btn-warning mt-2" style="width:5rem" title="Inactive"><i class="fa fa-lock"></i></a>
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
                            <h3 class="box-title">Add Testmonial</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('store.testmonial') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5> Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5> Message title<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="message_title" class="form-control">
                                                    @error('message_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-12">

                                                <label for="firstName5">  Image :</label>
                                                <div class="input-group">
                                                    <span class="input-group-btn">
                                                        <a id="tlfm" data-input="mainthumbnail" data-preview="holder"
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
                                            </div>
                                            <div class="form-group">
                                                <h5> Message Description<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea  name="message_description" class="form-control" rows="10" cols="20"></textarea>
                                                    @error('message_description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                        </div>
                                        

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add Testmonial"/>
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
        $('#tlfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
@endsection