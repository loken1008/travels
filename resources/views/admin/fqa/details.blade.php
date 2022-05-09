@extends('admin.body.master')
@section('title', 'FQA Details')
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
                                <label for="firstName5" style="color:white;font-size:14px">Tour Name :</label>
                                <h5>{{ $fqadetails->tour->tour_name }}</h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5" style="color:white;font-size:14px">Question :</label>
                                <h5>{{ $fqadetails->question }}</h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5" style="color:white;font-size:14px">Status :</label>
                                <h5>@if( $fqadetails->status=='1')Active @else Inactive @endif</h5>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="firstName5 h2 " style="color:white;font-size:14px">Description :</label>
                                <p class="text-justify">{!! $fqadetails->answer !!}</p>
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
