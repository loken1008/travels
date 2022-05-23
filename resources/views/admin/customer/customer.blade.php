@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
@endphp
@extends('admin.body.master')
@section('title', 'Users')
@section('content')

          

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Users List</h3>
                              
                            </div>
                          
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th> Name</th>
                                                <th>Email</th>
                                                <th>Address</th>
                                                <th>Mobile</th>
                                                <th>Country</th>
                                                <th>Image</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($customers as $customer)
                                            <tr>
                                                <td>{{$customer->first_name}} {{$customer->last_name}}</td>
                                                <td>{{$customer->email}}</td>
                                                <td>{{$customer->address}}</td>
                                                <td>{{$customer->mobile}}</td>
                                                <td>{{$customer->country}}</td>
                                                <td>
                                                @if(!empty($customer->image))
                                                    <img src="{{asset('frontend/images/users/'. $customer->image)}}" height="100" width="100" alt="">
                                                @endif
                                                </td>
                                                <td class="p-1">
                                                    <a href="{{route('customer.delete',$customer->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
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
