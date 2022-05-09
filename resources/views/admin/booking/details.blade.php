@extends('admin.body.master')
@section('title', 'Booking Details')
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
                                <label for="firstName5">Tour Name :</label>
                                <span>{{ $detailshotel->tour->tour_name }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Full Name :</label>
                                <span>@if(!empty($detailshotel->first_name)){{ $detailshotel->first_name}} {{ $detailshotel->last_name}}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Email :</label>
                                <span>{{ $detailshotel->email }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Address :</label>
                                <span>{{ $detailshotel->address }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Post Code :</label>
                                <span>{{ $detailshotel->post_code }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Telephone :</label>
                                <span>{{ $detailshotel->telephone }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Mobile :</label>
                                <span>{{ $detailshotel->mobile }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Country :</label>
                                <span>{{ $detailshotel->country }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Number Of Person :</label>
                                <span>{{ $detailshotel->number_people }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Arrival date :</label>
                                <span>{{ $detailshotel->arrival_date }}</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Departure Date :</label>
                                <span>{{ $detailshotel->departure_date }}</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5">Departure Date :</label>
                                <p class="text-justify">{{ $detailshotel->message }}</p>
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
