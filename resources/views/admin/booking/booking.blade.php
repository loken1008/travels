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
                                                <th>Mobile</th>
                                                <th>Country</th>
                                                <th>Email</th>
                                                <th>Booking Type</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($getbooking as $booking)
                                            <tr>
                                                @if((int)$booking->tour_id)
                                                <td>{{$booking->tour->tour_name}}</td>
                                                @else
                                                <td>{{$booking->tour_id}}</td>
                                                @endif
                                                <td>{{$booking->full_name}} </td>
                                                <td>{{$booking->mobile}}</td>
                                                <td>{{$booking->country}}</td>
                                                <td>{{$booking->email}}</td>
                                                @if((int)$booking->tour_id)
                                                <td></td>
                                                @else
                                                <td>Custom Booking</td>
                                                @endif
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
