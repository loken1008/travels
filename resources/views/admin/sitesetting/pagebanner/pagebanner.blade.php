@extends('admin.body.master')
@section('title', 'Page Banner')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-8">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Page Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Page Title</th>
                                        <th>Page Banner</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($pagebanner as $key=> $pbanner)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td class="text-capitalize">{{ $pbanner->page_name }}</td>
                                            <td> <a href="{{ asset($pbanner->page_banner) }}" target="__blank"><img
                                                        src="{{ asset($pbanner->page_banner) }}"
                                                        style="height:100px;width:100px" alt="pagebanner"></a>
                                            </td>

                                            <td>
                                                <a href="{{route('edit.pagebanner',$pbanner->id)}}" class="btn btn-info" style="width:5rem"
                                                    title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.pagebanner', $pbanner->id) }}"
                                                    class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i
                                                        class="fa fa-trash"></i></a>

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
                        <h3 class="box-title">Add Page Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.pagebanner') }}" method="post" enctype="multipart/form-data"
                                id="pagebannerForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Page Title :</h5>
                                            <div class="controls">
                                                <select name="page_name" class="form-control">
                                                    <option value="">Select Page Title</option>
                                                    <option value="homepageone">Homepage one</option>
                                                    <option value="homepagetwo">Homepage two</option>
                                                    <option value="homepagethree">Homepage three</option>
                                                    <option value="tour">Tour </option>
                                                    <option value="gallery">Gallery </option>
                                                    <option value="introduction">Introduction</option>
                                                    <option value="chooseus">Why Choose Us</option>
                                                    <option value="team">Our Team</option>
                                                    <option value="payment">Payment Method</option>
                                                    <option value="privacy">Privacy Policy</option>
                                                    <option value="terms">Terms & Conditions</option>
                                                    <option value="blogs">Blogs</option>
                                                    <option value="booking">Booking Form</option>
                                                    <option value="contactus">Contact Us</option>
                                                    <option value="login">Login </option>
                                                </select>
                                                @error('page_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="firstName5"> Page Banner Image :<span
                                                    class="text-danger">*</span> :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="plfm" data-input="mainthumbnail" data-preview="holder1"
                                                        class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i> Choose
                                                    </a>
                                                </span>
                                                <input id="mainthumbnail" class="form-control" type="text"
                                                    name="page_banner">

                                            </div>
                                            <img id="holder1" style="margin-top:15px;max-height:100px;">
                                            @error('page_banner')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="text-xs-right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Page Banner" />
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
        $('#plfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script>
        var route_prefix = "/mountainguide-filemanager";
        $('#pulfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#pagebannerForm').validate({
                rules: {
                    page_name: {
                        required: true
                    },
                    page_banner: {
                        required: true,
                    },

                },
                messages: {
                    page_name: {
                        required: "Please select page title"
                    },
                    page_banner: {
                        required: 'Please upload logo',
                    },

                }
            });
        });
    </script>
@endsection
