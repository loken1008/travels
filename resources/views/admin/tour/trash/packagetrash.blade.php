@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
@extends('admin.body.master')
@section('title', 'Tour')
@section('content')



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Package Trashed List</h3>
                        <a href="{{ route('tour.create') }}"><input type="submit"
                                class="btn btn-rounded btn-info pull-right" value="Add Trip"></a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Country</th>
                                        <th>Destination tour</th>
                                        <th>Tour Name</th>
                                        <th>Tour Type</th>
                                        <th>images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($trashedPackage as $tour)
                                        <tr>
                                            <td>{{ $tour->country->country_name }}</td>
                                            <td>{{ $tour->place->place_name }}</td>
                                            <td>{{ $tour->tour_name }}</td>
                                            <td >{{$tour->type=="trip"?'Trip':''}}</td>
                                           
                                            <td>
                                                <img src="{{ $tour->mainImage }}" alt="" width="100px" height="100px"
                                                style="padding-top:10px">
                                                
                                            </td>
                                            <td>
                                                
                                                <a class="btn btn-primary mt-1 {{ $route == 'tour.restore' ? 'active' : '' }}"
                                                href="{{ route('tour.restore', $tour->id) }}" id="restore" style="width:5rem"
                                                title="restore"><i class="fa fa-recycle" ></i></a>
                                                <a href="{{ route('tour.delete', $tour->id) }}" class="btn btn-danger mt-1"
                                                    style="width:5rem" id="delete" title="delete"><i
                                                        class="fa fa-trash"></i></a>
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
