@extends('admin.body.master')
@section('title', 'Page Banner Edit')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update Page
                            Banner</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('update.pagebanner', $editpagebanner->id) }}" method="post"
                                enctype="multipart/form-data" id="updatepagebannerForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <h5>Page Title :</h5>
                                            <div class="controls">
                                                <select name="page_name" class="form-control">
                                                    <option value="">Select Page
                                                        Title
                                                    </option>
                                                    <option value="homepageone"
                                                        {{ $editpagebanner->page_name == 'homepageone' ? 'selected' : '' }}>
                                                        Homepage one</option>
                                                    <option value="homepagetwo"
                                                        {{ $editpagebanner->page_name == 'homepagetwo' ? 'selected' : '' }}>
                                                        Homepage two</option>
                                                    <option value="homepagethree"
                                                        {{ $editpagebanner->page_name == 'homepagethree' ? 'selected' : '' }}>
                                                        Homepage three</option>
                                                    <option value="tour"
                                                        {{ $editpagebanner->page_name == 'tour' ? 'selected' : '' }}>
                                                        Tour </option>
                                                    <option value="gallery"
                                                        {{ $editpagebanner->page_name == 'gallery' ? 'selected' : '' }}>
                                                        Gallery</option>
                                                    <option value="introduction"
                                                        {{ $editpagebanner->page_name == 'introduction' ? 'selected' : '' }}>
                                                        Introduction</option>
                                                    <option value="chooseus"
                                                        {{ $editpagebanner->page_name == 'chooseus' ? 'selected' : '' }}>
                                                        Why Choose Us</option>
                                                    <option value="team"
                                                        {{ $editpagebanner->page_name == 'team' ? 'selected' : '' }}>
                                                        Our Team</option>
                                                    <option value="payment"
                                                        {{ $editpagebanner->page_name == 'payment' ? 'selected' : '' }}>
                                                        Payment Method</option>
                                                    <option value="privacy"
                                                        {{ $editpagebanner->page_name == 'privacy' ? 'selected' : '' }}>
                                                        Privacy Policy</option>
                                                    <option value="terms"
                                                        {{ $editpagebanner->page_name == 'terms' ? 'selected' : '' }}>
                                                        Terms & Conditions</option>
                                                    <option value="blogs"
                                                        {{ $editpagebanner->page_name == 'blogs' ? 'selected' : '' }}>
                                                        Blogs</option>
                                                    <option value="booking"
                                                        {{ $editpagebanner->page_name == 'booking' ? 'selected' : '' }}>
                                                        Booking Form</option>
                                                    <option value="contactus"
                                                        {{ $editpagebanner->page_name == 'contactus' ? 'selected' : '' }}>
                                                        Contact Us</option>
                                                    <option value="login"
                                                        {{ $editpagebanner->page_name == 'login' ? 'selected' : '' }}>
                                                        Login</option>
                                                </select>
                                                @error('page_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div>
                                            <label for="firstName5"> Page Banner Image
                                                :<span class="text-danger">*</span>
                                                :</label>
                                            <div class="input-group">
                                                <span class="input-group-btn">
                                                    <a id="pulfm" data-input="umainthumbnail"
                                                        data-preview="holder" class="btn btn-primary">
                                                        <i class="fa fa-picture-o"></i>
                                                        Choose
                                                    </a>
                                                </span>
                                                <input id="umainthumbnail" class="form-control" type="text"
                                                    name="page_banner">

                                            </div>
                                            <img id="holder" src="{{ $editpagebanner->page_banner }}"
                                                alt="{{ $editpagebanner->page_name }}"
                                                style="margin-top:15px;max-height:100px;">
                                            @error('page_banner')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>

                                    </div>

                                </div>

                                <div class="text-xs-right mt-4">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Page Banner" />
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->

            </div>

        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        var route_prefix = "/mgiadmin/mountainguide-filemanager";
        $('#pulfm').filemanager('images', {
            prefix: route_prefix
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script>
        $(document).ready(function() {
            $('#updatepagebannerForm').validate({
                rules: {
                    page_name: {
                        required: true
                    },
                   
                },
                messages: {
                    page_name: {
                        required: "Please select page title"
                    },
                    
                }
            });
        });
    </script>
@endsection
