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
                        <h3 class="box-title">Tour Trashed List</h3>
                        <a href="{{ route('tour.create') }}"><input type="submit"
                                class="btn btn-rounded btn-info pull-right" value="Add Trip"></a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Country</th>
                                        <th>Category</th>
                                        <th>Sub category</th>
                                        <th>Tour Name</th> 
                                        <th>Is Best Selling</th>  
                                        <th>images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($trashedTour as $key=> $tour)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $tour->country->country_name }}</td>
                                            <td >@if(!empty($tour->category->category_name)){{$tour->category->category_name}}@endif</td>
                                            <td >@if(!empty($tour->subcategory->sub_category_name)){{$tour->subcategory->sub_category_name}}@endif</td>
                                            <td>{{ $tour->tour_name }}</td>
                                            <td>@if($tour->is_best_selling==1)Best Sell @else Normal @endif</td>
                                           
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
