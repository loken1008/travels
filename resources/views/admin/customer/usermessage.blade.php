@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
@endphp
@extends('admin.body.master')
@section('title', 'Users Message')
@section('content')



    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Users Message</h3>

                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Contact Number</th>
                                        <th>Country</th>
                                        <th>Message</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($usermessage as $customer)
                                        <tr>
                                            <td>{{ $customer->f_name }} </td>
                                            <td>{{ $customer->email }}</td>
                                            <td>{{ $customer->phone }}</td>
                                            <td>{{ $customer->country }}</td>
                                            <td>{{ $customer->message }}</td>

                                            <td class="p-1">
                                                <a href="#" data-toggle="modal"
                                                    data-target="#exampleModal{{ $customer->id }}" class="btn btn-info "
                                                    style="width:5rem"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('usermessage.delete', $customer->id) }}"
                                                    class="btn btn-danger mt-1" style="width:5rem" id="delete" title="delete"><i
                                                        class="fa fa-trash"></i></a>


                                            </td>
                                        </tr>

                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $customer->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content bg-white">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">View
                                                            {{ $customer->f_name }} {{ $customer->l_name }} Message</h5>
                                                        {{-- <input type="button" class="close " data-dismiss="modal"
                                                            aria-label="Close">
                                                        <span aria-hidden="true">&times;</span> --}}

                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="firstName5"> Name :</label>
                                                            <span>{{ $customer->f_name }} </span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="firstName5">Email :</label>
                                                            <span>{{ $customer->email }}</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="firstName5">Contact No :</label>
                                                            <span>{{ $customer->phone }}</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="firstName5">Country Name :</label>
                                                            <span>{{ $customer->country }}</span>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="firstName5">Message :</label>
                                                            <span>{{ $customer->message }}</span>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <input type="button" class="btn btn-warning" data-dismiss="modal"
                                                            value="Close">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
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
