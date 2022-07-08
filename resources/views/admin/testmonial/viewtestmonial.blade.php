@extends('admin.body.master')
@section('title', 'Review')
@section('content') 


        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Review List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Reviewer Name</th>
                                            <th>Review Title</th>
                                            <th>Review</th>
                                            <th>Review rating</th>
                                            <th>Type</th>
                                            <th>Image</th>
                                            <th>Status</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($testmonials as $testmonial)
                                            <tr>
                                                <td>{{ $testmonial->name }} , {{$testmonial->country}}</td>
                                                <td>{{ $testmonial->message_title }}</td>
                                                <td>{{ Str::limit($testmonial->message_description,30)}}</td>
                                                <td>{{$testmonial->rating}}
                                                    @for($i=1; $i<=$testmonial->rating; $i++) 
                                                    <span><i class="fa fa-star text-warning"></i></span>
                                                    @endfor
                                                </td>
                                                <td>
                                                    @if($testmonial->type=="tripadvisor")
                                                    <img src="{{asset('tripadvisor.svg')}}" 
                                                    style="height:50px;width:50px" alt="">
                                                    @elseif($testmonial->type=="google")
                                                    <img src="{{asset('google.png')}}" 
                                                    style="height:50px;width:50px" alt="">
                                                    @elseif($testmonial->type=="facebook")
                                                    <img src="{{asset('facebook.svg')}}"
                                                    style="height:50px;width:50px" alt="">
                                                    @else 
                                                    <img src="{{asset('mg.png')}}"
                                                    style="height:50px;width:50px" alt="">
                                                    @endif
                                                </td>
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
                                                    <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$testmonial->id}}" style="width:5rem" title="view"><i class="fa fa-eye"></i></a>

                                                    <a href="{{route('edit.testmonial',$testmonial->id)}}" class="btn btn-info mt-2" style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('delete.testmonial',$testmonial->id)}}" class="btn btn-danger mt-2" style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
                                                    @if($testmonial->status==1)
                                                    <a href="{{route('active.testmonial',$testmonial->id)}}" class="btn btn-primary mt-2" style="width:5rem" title="Active"><i class="fa fa-unlock"></i></a>
                                                    @else
                                                    <a href="{{route('inactive.testmonial',$testmonial->id)}}" class="btn btn-warning mt-2" style="width:5rem" title="Inactive"><i class="fa fa-lock"></i></a>
                                                    @endif
                                                </td>
                                            </tr>
                                            <div class="modal fade" id="exampleModal{{ $testmonial->id }}" tabindex="-1"
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
                                                                    <p><span class="font-weight-bold"> Reviewer Name:</span> {{ $testmonial->name }} , {{$testmonial->country}}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <img src="{{ $testmonial->image }}" height="300"
                                                                        width="50%" alt="">
                                                                </div>
                                                            </div>
                                                            <div class="row mt-4">
                                                                <div class="col-md-12">
                                                                    <p><span class="font-weight-bold">Review  Title:</span> {{ $testmonial->message_title }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="row mt-2">
                                                                <div class="col-md-12">
                                                                    <p class="text-justify"><span class="font-weight-bold">Review Description:</span> {!! $testmonial->message_description !!}</p>
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
                            <h3 class="box-title">Add Review</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('store.testmonial') }}" method="post" enctype="multipart/form-data" id="testmonialForm">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Reviewer Name :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="name" class="form-control" id="name">
                                                    @error('name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Country :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="country" class="form-control" id="country">
                                                    @error('country')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5> Review title :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="message_title" class="form-control">
                                                    @error('message_title')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <h5> Review Description :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <textarea  name="message_description" class="form-control" rows="10" cols="20"></textarea>
                                                    @error('message_description')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5> Rating :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select  name="rating" class="form-control">
                                                        <option value="">Select Rating Value</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                    </select>
                                                    @error('rating')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5> Review Type :<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="type" class="form-control">
                                                        <option value="">Select Review Type</option>
                                                        <option value="tripadvisor">TripAdvisor</option>
                                                        <option value="google">Google</option>
                                                        <option value="facebook">Facebook</option>
                                                        <option value="normal">Normal</option>
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
        var route_prefix = "/mountainguide-filemanager";
        $('#tlfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.min.js"></script>
     <script>
        $(document).ready(function() {
          
            $("#testmonialForm").validate({
                    ignore: [],
                    rules: {
                        name: {
                            required: true,
                        },
                        message_title: {
                            required: true,
                        },
                        message_description: {
                            required: true,
                        },
                        image: {
                            required: true,
                        },
                    },
 
                    messages: {
                        name: {
                            required: "Please enter name",
                        },
                        message_title: {
                            required: "Please enter message title",
                        },
                        message_description: {
                            required: "Please enter message description",
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