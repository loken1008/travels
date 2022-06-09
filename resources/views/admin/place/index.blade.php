@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
@extends('admin.body.master')
@section('title', 'Place')
@section('content')



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Destination Place List</h3>
                        <a href="{{ route('place.create') }}"><input type="submit"
                                class="btn btn-rounded btn-info pull-right" value="Add Place"></a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Country</th>
                                        <th>Destination Name</th>
                                        <th>Description/Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getplace as $key=> $place)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $place->country->country_name }}</td>
                                            <td>{{ $place->place_name }}</td>
                                            <td>{!! $place->description !!}</td>
                                            <td>

                                                <input type="checkbox" class="place-input" data-toggle="toggle"
                                                    data-id="{{ $place->id }}" {{ $place->status ? 'checked' : '' }}
                                                    data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                    data-offstyle="danger">

                                            </td>
                                            <td>
                                                <a class="btn btn-info {{($route=='place.edit')?'active':''}}"
                                                    href="{{ route('place.edit', $place->id) }}" style="width:5rem"
                                                    title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('place.delete', $place->id) }}" class="btn btn-danger "
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

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>

    <script>
        $(function() {
            $('.place-input').change(function(e) {
                e.preventDefault();
                var status = $(this).prop('checked') == true ? 1 : 0;
                var place_id = $(this).data('id');
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
                            url: '/place/changeStatus',
                            data: {
                                'status': status,
                                'place_id': place_id
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Status!',
                                    'Status has been changed.',
                                    'success',
                                )
                                window.location.href='/place/view'
                            }
                        });
                    }else{
                        window.location.href='/place/view'
                    }
                })

            })
        })
    </script>

@endsection
