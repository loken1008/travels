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
                        <h3 class="box-title">Itineries/Equipments List</h3>
                        <a href="{{ route('itinery.create') }}"><input type="submit"
                                class="btn btn-rounded btn-info pull-right " value="Add Itineries/Equipment"></a>
                    </div>

                    <!-- /.box-body -->
                    <div class="box-body">
                        <!-- Nav tabs -->
                        <ul class="nav nav-tabs nav-fill" role="tablist">
                            <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home11" role="tab"><span></span> <span class="hidden-xs-down ml-15">Itineries List</span></a> </li>
                            <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile11" role="tab"><span></span> <span class="hidden-xs-down ml-15">Equipments List</span></a> </li>
                          
                        </ul>
                        <!-- Tab panes -->
                        <div class="tab-content tabcontent-border">
                            <div class="tab-pane active" id="home11" role="tabpanel">
                                <div class="p-15">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Tour Name</th> 
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($alltour as $key =>$tour)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                       
                                                        <td>{{ $tour->tour_name }}</td>
                                                       
                                                        
                                                        <td>
                                                            <a class="btn btn-primary {{ $route == 'tour.viewdetails' ? 'active' : '' }}"
                                                            href="{{ route('tour.viewdetails', $tour->id) }}" style="width:5rem"
                                                            title="view"><i class="fa fa-eye"></i></a>
                                                            <a class="btn btn-info mt-1 {{ $route == 'itinery.edit' ? 'active' : '' }}"
                                                                href="{{ route('itinery.edit', $tour->id) }}" style="width:5rem"
                                                                title="edit"><i class="fa fa-pencil"></i></a>

                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="tab-pane" id="profile11" role="tabpanel">
                                <div class="p-15">
                                    <div class="table-responsive">
                                        <table id="example1" class="table table-bordered table-striped">
                                            <thead>
                                                <tr>
                                                    <th>SN</th>
                                                    <th>Tour Name</th> 
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse($alltour as $key =>$tour)
                                                    <tr>
                                                        <td>{{$key+1}}</td>
                                                        <td>{{ $tour->tour_name }}</td>
                                                       
                                                        <td>
                                                            <a class="btn btn-primary {{ $route == 'tour.viewdetails' ? 'active' : '' }}"
                                                            href="{{ route('tour.viewdetails', $tour->id) }}" style="width:5rem"
                                                            title="view"><i class="fa fa-eye"></i></a>
                                                            <a class="btn btn-info mt-1 {{ $route == 'equipment.edit' ? 'active' : '' }}"
                                                                href="{{ route('equipment.edit', $tour->id) }}" style="width:5rem"
                                                                title="edit"><i class="fa fa-pencil"></i></a>
                                                           
                                                        </td>
                                                    </tr>
                                                @empty
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                           
                        </div>
                    </div>
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

