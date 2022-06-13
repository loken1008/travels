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
                        <h3 class="box-title">Tour List</h3>
                        <a  href="{{ route('viewtour.trashed') }}"><input type="submit"
                            class="btn btn-rounded btn-warning pull-right ml-2" value="View Trashed"></a>
                        <a href="{{ route('tour.create') }}"><input type="submit"
                                class="btn btn-rounded btn-info pull-right " value="Add Trip"></a>

                               
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
                                        <th>Status</th>
                                        <th>images</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($gettour as $key =>$tour)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $tour->country->country_name }}</td>
                                            <td >@if(!empty($tour->category->category_name)){{$tour->category->category_name}}@endif</td>
                                            <td >@if(!empty($tour->subcategory->sub_category_name)){{$tour->subcategory->sub_category_name}}@endif</td>
                                            <td>{{ $tour->tour_name }}</td>
                                           
                                            <td>

                                                <input type="checkbox" class="tour-input" data-toggle="toggle{{$tour->id}}"
                                                    data-id="{{ $tour->id }}" {{ $tour->status ? 'checked' : '' }}
                                                    data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                    data-offstyle="danger">

                                            </td>
                                            <td>
                                                <img src="{{ $tour->mainImage }}" alt="" width="100px" height="100px"
                                                style="padding-top:10px">
                                                {{-- @forelse($tour->images as $image)
                                                    @php
                                                        $imagess = explode(',', $image->images);
                                                        
                                                    @endphp
                                                    @foreach ($imagess as $images)
                                                        <img src="{{ $images }}" alt="" width="100px" height="100px"
                                                            style="padding-top:10px">
                                                    @endforeach
                                                @empty
                                                    <p>No Image</p>
                                                @endforelse --}}
                                            </td>
                                            <td>
                                                <a class="btn btn-primary {{ $route == 'tour.viewdetails' ? 'active' : '' }}"
                                                href="{{ route('tour.viewdetails', $tour->id) }}" style="width:5rem"
                                                title="view"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-info mt-1 {{ $route == 'tour.edit' ? 'active' : '' }}"
                                                    href="{{ route('tour.edit', $tour->id) }}" style="width:5rem"
                                                    title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('tour.softdelete', $tour->id) }}" class="btn btn-warning mt-1"
                                                    style="width:5rem" id="softdelete" title="trash"><i
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
   
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
   
    <script>
        $(function() {
            $('.tour-input').change(function(e) {
                e.preventDefault();
                var status = $(this).prop('checked') == true ? 1 : 0;
                var tour_id = $(this).data('id');
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
                            url: '/tour/changeStatus',
                            data: {
                                'status': status,
                                'tour_id': tour_id
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Status!',
                                    'Status has been changed.',
                                    'success',
                                )
                                window.location.href = '/tour/view'
                            }
                        });
                    } else {
                        window.location.href = '/tour/view'
                    }
                })
    
            })
          
    $('#example1 .tour-input').bootstrapToggle();

        })
    </script>
@endsection

