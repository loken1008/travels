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
                                                <a href="#" class="btn btn-info" data-toggle="modal"
                                                    data-target="#exampleModal{{ $pbanner->id }}" style="width:5rem"
                                                    title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.pagebanner', $pbanner->id) }}"
                                                    class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i
                                                        class="fa fa-trash"></i></a>

                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $pbanner->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered" role="document">
                                                <div class="modal-content bg-white">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLongTitle">Update Page
                                                            Banner
                                                        </h5>
                                                        <input type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close" style="height:10px;margin-top:-5px">
                                                        <span aria-hidden="true">&times;</span>
                                                        </input>
                                                    </div>
                                                    <div class="modal-body">
                                                        <!-- /.box-header -->
                                                        <div class="box-body">
                                                            <div class="table">
                                                                <form
                                                                    action="{{ route('update.pagebanner', $pbanner->id) }}"
                                                                    method="post" enctype="multipart/form-data"
                                                                    id="updatepagebannerForm">
                                                                    @csrf
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <div class="form-group">
                                                                                <h5>Page Title :</h5>
                                                                                <div class="controls">
                                                                                    <select name="page_name"
                                                                                        class="form-control">
                                                                                        <option value="">Select Page Title
                                                                                        </option>
                                                                                        <option value="homepageone"
                                                                                            {{ $pbanner->page_name == 'homepageone' ? 'selected' : '' }}>
                                                                                            Homepage one</option>
                                                                                        <option value="homepagetwo"
                                                                                            {{ $pbanner->page_name == 'homepagetwo' ? 'selected' : '' }}>
                                                                                            Homepage two</option>
                                                                                        <option value="homepagethree"
                                                                                            {{ $pbanner->page_name == 'homepagethree' ? 'selected' : '' }}>
                                                                                            Homepage three</option>
                                                                                            <option value="tour"
                                                                                                {{ $pbanner->page_name == 'tour' ? 'selected' : '' }}>
                                                                                                Tour </option>
                                                                                                <option value="gallery"
                                                                                                    {{ $pbanner->page_name == 'gallery' ? 'selected' : '' }}>
                                                                                                Gallery</option>
                                                                                        <option value="introduction"
                                                                                            {{ $pbanner->page_name == 'introduction' ? 'selected' : '' }}>
                                                                                            Introduction</option>
                                                                                        <option value="chooseus"
                                                                                            {{ $pbanner->page_name == 'chooseus' ? 'selected' : '' }}>
                                                                                            Why Choose Us</option>
                                                                                        <option value="team"
                                                                                            {{ $pbanner->page_name == 'team' ? 'selected' : '' }}>
                                                                                            Our Team</option>
                                                                                        <option value="payment"
                                                                                            {{ $pbanner->page_name == 'payment' ? 'selected' : '' }}>
                                                                                            Payment Method</option>
                                                                                        <option value="privacy"
                                                                                            {{ $pbanner->page_name == 'privacy' ? 'selected' : '' }}>
                                                                                            Privacy Policy</option>
                                                                                        <option value="terms"
                                                                                            {{ $pbanner->page_name == 'terms' ? 'selected' : '' }}>
                                                                                            Terms & Conditions</option>
                                                                                        <option value="blogs"
                                                                                            {{ $pbanner->page_name == 'blogs' ? 'selected' : '' }}>
                                                                                            Blogs</option>
                                                                                        <option value="booking"
                                                                                            {{ $pbanner->page_name == 'booking' ? 'selected' : '' }}>
                                                                                            Booking Form</option>
                                                                                        <option value="contactus"
                                                                                            {{ $pbanner->page_name == 'contactus' ? 'selected' : '' }}>
                                                                                            Contact Us</option>
                                                                                            <option value="login"
                                                                                            {{ $pbanner->page_name == 'login' ? 'selected' : '' }}>
                                                                                            Login</option>
                                                                                    </select>
                                                                                    @error('page_name')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                            </div>
                                                                            <div>
                                                                                <label for="firstName5"> Page Banner Image
                                                                                    :<span class="text-danger">*</span>
                                                                                    :</label>
                                                                                <div class="input-group">
                                                                                    <span class="input-group-btn">
                                                                                        <a id="pulfm"
                                                                                            data-input="umainthumbnail"
                                                                                            data-preview="holder"
                                                                                            class="btn btn-primary">
                                                                                            <i class="fa fa-picture-o"></i>
                                                                                            Choose
                                                                                        </a>
                                                                                    </span>
                                                                                    <input id="umainthumbnail"
                                                                                        class="form-control" type="text"
                                                                                        name="page_banner">

                                                                                </div>
                                                                                <img id="holder"
                                                                                    src="{{ $pbanner->page_banner }}"
                                                                                    alt="{{ $pbanner->page_name }}"
                                                                                    style="margin-top:15px;max-height:100px;">
                                                                                @error('page_banner')
                                                                                    <span
                                                                                        class="text-danger">{{ $message }}</span>
                                                                                @enderror
                                                                            </div>

                                                                        </div>

                                                                    </div>

                                                                    <div class="text-xs-right mt-4">
                                                                        <input type="submit"
                                                                            class="btn btn-rounded btn-info"
                                                                            value="Update Page Banner" />
                                                                    </div>
                                                                </form>
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
