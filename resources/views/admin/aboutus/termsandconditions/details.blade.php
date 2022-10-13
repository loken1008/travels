@extends('admin.body.master')
@section('title', 'Terms Details')
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
                                <label for="firstName5" style="font-size:14px">Title :</label>
                                <h5>{{ $detailstermsandconditions->title }}</h5>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5" style="font-size:14px">Type :</label>
                                <h5>{{ $detailstermsandconditions->type }}</h5>
                            </div>
                        </div>

                        <div class="col-md-12 mt-4">
                            <div class="form-group">
                                <label for="firstName5 h2 " style="font-size:14px">Description :</label>
                                <p class="text-justify">{!! $detailstermsandconditions->description !!}</p>
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
