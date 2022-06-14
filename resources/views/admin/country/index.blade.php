@php
$prefix = Request::route()->getPrefix();
$route = Route::current()->getName();
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
                        <a href="{{ route('country.create') }}"><input type="submit"
                                class="btn btn-rounded btn-info pull-right" value="Add Country"></a>
                    </div>

                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>SN</th>
                                        <th>Country Name</th>
                                        {{-- <th>Start Price</th> --}}
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($getcountry as $key=> $country)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $country->country_name }}</td>
                                            {{-- <td>{{$country->start_price}}</td> --}}
                                            <td><img src="{{ $country->country_image }}" height="100" width="100" alt="">
                                            </td>
                                            <td>{!! Str::limit($country->description,100) !!}</td>
                                            <td>

                                                <input type="checkbox" class="switcher-input" data-toggle="toggle"
                                                    data-id="{{ $country->id }}" {{ $country->status ? 'checked' : '' }}
                                                    data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                    data-offstyle="danger">

                                            </td>
                                            <td>
                                                <a class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{ $country->id }}" href="#"
                                                    style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                <a class="btn btn-info mt-2 {{ $route == 'country.edit' ? 'active' : '' }}"
                                                    href="{{ route('country.edit', $country->id) }}" style="width:5rem"
                                                    title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('country.delete', $country->id) }}" class="btn btn-danger mt-2 "
                                                    style="width:5rem" id="delete" title="delete"><i
                                                        class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                        <!-- Modal -->
                                        <div class="modal fade" id="exampleModal{{ $country->id }}" tabindex="-1"
                                            role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content bg-white" >
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">View Detail</h5>
                                                        <input type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close" style="height:10px;margin-top:-5px">
                                                        <span aria-hidden="true">&times;</span>
                                                        </input>
                                                    </div>
                                                    <div class="modal-body">

                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p><span class="font-weight-bold">Country Name:</span> {{ $country->country_name }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <img src="{{ $country->country_image }}" height="300"
                                                                    width="100%" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <p class="text-justify"><span class="font-weight-bold">Description:</span> {!! $country->description !!}</p>
                                                            </div>
                                                        </div>

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
