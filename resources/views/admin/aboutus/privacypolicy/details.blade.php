@extends('admin.body.master')
@section('title', 'Introduction Details')
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
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5" style="color:white;font-size:14px">About Us Title :</label>
                                <h5>{{ $detailsintroduction->aboutus_title }}</h5>
                            </div>
                        </div>
                    
                        <div class="col-md-12">

                            <label for="firstName5 h2 " style="color:white;font-size:14px">  Image :</label>
                            <div class="input-group">

                                <a href="{{ $detailsintroduction->aboutus_image }}" target="_blank"><img id="holder1" style="max-height:150px;width:300px"
                                    src={{ $detailsintroduction->aboutus_image }}></a>

                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="firstName5 h2 " style="color:white;font-size:14px">Description :</label>
                                <p class="text-justify">{!! $detailsintroduction->aboutus_description !!}</p>
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
