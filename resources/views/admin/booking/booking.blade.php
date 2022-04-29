@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
@endphp
@extends('admin.body.master')
@section('title', 'Booking')
@section('content')

          

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Booking List</h3>
                            </div>
                          
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tour Name</th>
                                                <th>Full Name</th>
                                                <th>Address</th>
                                                <th>Arrival Date</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($getbooking as $booking)
                                            <tr>
                                                <td>{{$booking->tour->tour_name}}</td>
                                                <td>{{$booking->fullname}}</td>
                                                <td>{{$booking->address}}</td>
                                                <td>{{$booking->arrival_date}}</td>
                                              
                                                <td>
                                                    <a class="btn btn-info {{($route=='showbookingdetails')?'active':''}}" href="{{route('showbookingdetails',$booking->id)}}"  style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('delete.booking',$booking->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
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

                        <!-- /.box -->
                    </div>
                    <!-- /.col -->
                </div>
                <!-- /.row -->
            </section>
            <!-- /.content -->
        
           

@endsection
