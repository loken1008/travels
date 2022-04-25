@extends('admin.body.master')
@section('title', 'Hotel Details')
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
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Country Name :</label>
                                <span>{{ $detailshotel->country->country_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Tour Name :</label>
                                <span>@if(!empty($detailshotel->tour->tour_name)){{ $detailshotel->tour->tour_name }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Hotel Name :</label>
                                <span>{{ $detailshotel->hotel_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Address :</label>
                                <span>{{ $detailshotel->hotel_address }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Phone :</label>
                                <span>{{ $detailshotel->hotel_phone }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <label for="firstName5">Map :</label>
                            <div class="form-group">
                               
                                <iframe src="{{$detailshotel->map_link}}" frameborder="0" width="50%" height="50%"></iframe>
                            </div>
                        </div>
                        <div class="col-md-12">

                            <label for="firstName5">  Image :</label>
                            <div class="input-group">

                                <a href="{{ $detailshotel->image }}" target="_blank"><img id="holder1" style="max-height:150px;width:600px"
                                    src={{ $detailshotel->image }}></a>

                            </div>
                        </div>

                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5">Description :</label>
                                <p class="text-justify">{!! $detailshotel->hotel_description !!}</p>
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
