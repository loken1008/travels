@extends('admin.body.master')
@section('title', 'Blog Details')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">View Details</h4>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">

                <section>
                    <div class="row">
                        @if(!empty($detailsblog->tour->tour_name ))
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5" style="color:white;font-size:14px">Tour Name :</label>
                                <h5>{{ $detailsblog->tour->tour_name }}</h5>
                            </div>
                        </div>
                       @endif
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5" style="color:white;font-size:14px">Blog Title :</label>
                                <h5>{{ $detailsblog->blog_title }}</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5 h2 " style="color:white;font-size:14px">Author Name :</label>
                                <span>{{ $detailsblog->author_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5 h2 " style="color:white;font-size:14px">Blog Type :</label>
                                <span>{{ $detailsblog->blog_type }}</span>
                            </div>
                        </div>
                       
                        <div class="col-md-12">

                            <label for="firstName5 h2 " style="color:white;font-size:14px">  Image :</label>
                            <div class="input-group">

                                <a href="{{ $detailsblog->blog_image }}" target="_blank"><img id="holder1" style="max-height:150px;width:300px"
                                    src={{ $detailsblog->blog_image }}></a>

                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="firstName5 h2 " style="color:white;font-size:14px">Description :</label>
                                <p class="text-justify">{!! $detailsblog->blog_description !!}</p>
                            </div>
                        </div>
                       
                       
                       
                    </div>
                   
                    <hr>
                 
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>

@endsection
