@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
@endphp
@extends('admin.body.master')
@section('title', 'Hotel')
@section('content')

          

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Hotel List</h3>
                                <a href="{{route('hotel.create')}}"><input type="submit" class="btn btn-rounded btn-info pull-right" value="Add Hotel"></a>
                            </div>
                          
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Country Name</th>
                                                <th>Tour Name</th>
                                                <th>Hotel Name</th>
                                                <th>Address</th>
                                                <th>Phone</th>
                                                <th>Image</th>
                                                <th>Map Link</th>
                                                <th>Description</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($gethotel as $hotel)
                                            <tr>
                                                <td>{{$hotel->country->country_name}}</td>
                                                <td>@if(!empty($hotel->tour->tour_name)){{$hotel->tour->tour_name}}@endif</td>
                                                <td>{{$hotel->hotel_name}}</td>
                                                <td>{{$hotel->hotel_address}}</td>
                                                <td>{{$hotel->hotel_phone}}</td>
                                                <td><img src="{{$hotel->image}}" height="100" width="100" alt=""></td>
                                                <td>{{Str::limit($hotel->map_link,50)}}</td>
                                                <td>{!!Str::limit($hotel->hotel_description,100)!!}</td>
                                                <td>
                                                    <input type="checkbox" class=" hotel-input" data-toggle="toggle"
                                                    data-id="{{ $hotel->id }}" {{ $hotel->status ? 'checked' : '' }}
                                                    data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                    data-offstyle="danger" onchange="changeStatus({{ $hotel->id }})">
                                                </td>
                                                <td class="p-1">
                                                    <a class="btn btn-primary {{($route=='hotel.viewdetails')?'active':''}}" href="{{route('hotel.viewdetails',$hotel->id)}}"  style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-info{{($route=='hotel.edit')?'active':''}}" href="{{route('hotel.edit',$hotel->id)}}"  style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('hotel.delete',$hotel->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
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
            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script>
                $(function() {
                    $('.hotel-input').change(function(e) {
                        e.preventDefault();
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        var hotel_id = $(this).data('id');
                        Swal.fire({
                            title: 'Are you sure?',
                            text: "You won't be able to revert this!",
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Yes, Change Status!',
                            // location.reload();
                        }).then((result) => {
                            if (result.isConfirmed) {
        
                                $.ajax({
                                    type: "GET",
                                    dataType: "json",
                                    url: '/hotel/changeHotelStatus',
                                    data: {
                                        'status': status,
                                        'hotel_id': hotel_id
                                    },
                                    success: function(data) {
                                        Swal.fire(
                                            'Status!',
                                            'Status has been changed.',
                                            'success',
                                        )
                                        window.location.href = '/hotel'
                                    }
                                });
                            } else {
                                window.location.href = '/hotel'
                            }
                        })
        
                    })
                })
            </script>
           

@endsection
