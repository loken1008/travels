@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
@endphp
@extends('admin.body.master')
@section('title', 'Country')
@section('content')

          

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Country List</h3>
                                <a href="{{route('country.create')}}"><input type="submit" class="btn btn-rounded btn-info pull-right" value="Add Country"></a>
                            </div>
                          
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Country Name</th>
                                                {{-- <th>Start Price</th> --}}
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($getcountry as $country)
                                            <tr>
                                                <td>{{$country->country_name}}</td>
                                                {{-- <td>{{$country->start_price}}</td> --}}
                                                <td><img src="{{$country->country_image}}" height="100" width="100" alt=""></td>
                                                <td>{!!$country->description!!}</td>
                                                <td>
                                                 
                                                        <input type="checkbox" class="switcher-input"  data-toggle="toggle" data-id="{{$country->id}}"  {{ $country->status ? 'checked' : ''}} data-on="Enabled" data-off="Disabled" data-onstyle="success" data-offstyle="danger">
                                                       
                                                </td>
                                                <td>
                                                    <a class="btn btn-info {{($route=='country.edit')?'active':''}}" href="{{route('country.edit',$country->id)}}"  style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('country.delete',$country->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
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
