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
                                <span>
                                    @if(!empty((int)$detailshotel->tour_id))
                                    {{ $detailshotel->tour->tour_name }}
                                    @else 
                                    {{ $detailshotel->tour_id }}
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Full Name :</label>
                                <span>@if(!empty($detailshotel->full_name)){{ $detailshotel->full_name}}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Email :</label>
                                <span>@if(!empty($detailshotel->email)){{ $detailshotel->email }} @endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Address :</label>
                                <span>@if(!empty($detailshotel->address)){{ $detailshotel->address }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Mobile :</label>
                                <span>@if(!empty($detailshotel->mobile)){{ $detailshotel->mobile }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Country :</label>
                                <span>@if(!empty($detailshotel->country)){{ $detailshotel->country }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Number Of Person :</label>
                                <span>@if(!empty($detailshotel->number_people)){{ $detailshotel->number_people }}@endif</span>
                            </div>
                        </div>
                        @if(!empty((int)$detailshotel->tour_id))
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Arrival date :</label>
                                <span>@if(!empty($detailshotel->arrival_date)){{ $detailshotel->arrival_date }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Departure Date :</label>
                                <span>@if(!empty($detailshotel->departure_date)){{ $detailshotel->departure_date }}@endif</span>
                            </div>
                        </div>
                        @else 
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Start Date :</label>
                                <span>@if(!empty($detailshotel->start_date)){{ $detailshotel->start_date }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5">Tour Days :</label>
                                <span>@if(!empty($detailshotel->tour_days)){{ $detailshotel->tour_days }}@endif</span>
                            </div>
                        </div>
                        @endif
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5">Message :</label>
                                <p class="text-justify">@if(!empty($detailshotel->message)){{ $detailshotel->message }}@endif</p>
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
