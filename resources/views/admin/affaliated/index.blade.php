@extends('admin.body.master')
@section('title', 'Affilated/Payment Method')
@section('content') 
        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-8">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Affilated/Payment Method List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Sn</th>
                                            <th>Image</th>
                                            <th>Type</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($affilated as $key=> $affilate)
                                            <tr>
                                                    <td>{{$key+1}}</td>
                                                    <td>
                                                    <img src="{{asset($affilate->image)}}"
                                                        style="height:100px;width:100px" alt="">
                                                    </td>
                                                    <td>{{$affilate->type}}</td>
                                                    <td>
                                                        @if($affilate->status==  1)
                                                    <span class="badge badge-info">Active</span>
                                                    @else 
                                                    <span class="badge badge-danger">Inactive</span>
                                                    @endif
                                                    </td>
                                                <td>
                                                    <a href="{{route('edit.affaliated',$affilate->id)}}" class="btn btn-info mt-2" style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('delete.affaliated',$affilate->id)}}" class="btn btn-danger mt-2" style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
                                                    @if($affilate->status==1)
                                                    <a href="{{route('active.affaliated',$affilate->id)}}" class="btn btn-primary mt-2" style="width:5rem" title="Active"><i class="fa fa-unlock"></i></a>
                                                    @else
                                                    <a href="{{route('inactive.affaliated',$affilate->id)}}" class="btn btn-warning mt-2" style="width:5rem" title="Inactive"><i class="fa fa-lock"></i></a>
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
                            <h3 class="box-title">Add Affilated/Pay</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('store.affaliated') }}" method="post" enctype="multipart/form-data" id="affilatedForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Type :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="type" class="form-control">
                                                        <option value="">Select  Type</option>
                                                        <option value="affilated-member">Affilated Member</option>
                                                        <option value="pay-method">Pay Method</option>
                                                    </select>
                                                    @error('type')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="">

                                                <label for="firstName5">  Image :<span class="text-danger">*</span></label>
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
                                        </div>
                                        

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add "/>
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
        var route_prefix = "/mgiadmin/mountainguide-filemanager";
        $('#tlfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
     <script>
        $(document).ready(function() {
          
            $("#affilatedForm").validate({
                    ignore: [],
                    rules: {
                        type: {
                            required: true,
                        },
                       
                        image: {
                            required: true,
                        },
                    },
 
                    messages: {
                        type: {
                            required: "Please enter type",
                        },
                       
                        image: {
                            required: "Please select image",
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