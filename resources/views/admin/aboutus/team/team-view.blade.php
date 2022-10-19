@extends('admin.body.master')
@section('title', 'Our Team')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-12">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Team List</h3>
                        <a href="{{route('create.team')}}"><input type="submit" class="btn btn-rounded btn-info pull-right" value="Add Team"></a>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Order</th>
                                        <th> Name</th>
                                        <th>Post </th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody id="teamcontents">
                                    @forelse($ourteam as $key=> $team)
                                        <tr class="row1" data-id="{{ $team->id }}">
                                            <th>{{$key+1}}</th>
                                            <td ><i class="fa fa-sort"></i></td>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->post }}</td>
                                            <td>
                                                <input type="checkbox" class="team-input" data-toggle="toggle"
                                                data-id="{{ $team->id }}" {{ $team->status ? 'checked' : '' }}
                                                data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                data-offstyle="danger" onchange="changeStatus({{ $team->id }})">
                                            </td>
                                            <td>
                                                <a href="#" class="btn btn-primary" data-toggle="modal"
                                                    data-target="#exampleModal{{ $team->id }}"
                                                    style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('edit.team', $team->id) }}" class="btn btn-info "
                                                    style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.team', $team->id) }}"
                                                    class="btn btn-danger " style="width:5rem" id="delete"
                                                    title="delete"><i class="fa fa-trash"></i></a>
                                            </td>
                                        </tr>
                                           <!-- Modal -->
                                           <div class="modal fade" id="exampleModal{{ $team->id }}" tabindex="-1"
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
                                                            <div class="col-md-6">
                                                                <p><span class="font-weight-bold">Name:</span> {{ $team->name }}</p>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <p><span class="font-weight-bold">Post:</span> {{ $team->post }}</p>
                                                            </div>
                                                        </div>
                    
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p><span class="font-weight-bold">Language:</span> {{ $team->language }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <p><span class="font-weight-bold">Experience:</span> {{ $team->experiences }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-12">
                                                                <img src="{{ $team->image }}" height="300"
                                                                    width="100%" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="row mt-2">
                                                            <div class="col-md-12">
                                                                <p class="text-justify"><span class="font-weight-bold">Description:</span> {!! $team->description !!}</p>
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

            </div>
         
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
  
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script>
        $(function() {
            $('.team-input').change(function(e) {
                e.preventDefault();
                var status = $(this).prop('checked') == true ? '1' : '0';
                var team_id = $(this).data('id');
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
                            url: '/mgiadmin/aboutus/ourteam/changeStatus',
                            data: {
                                'status': status,
                                'team_id': team_id
                            },
                            success: function(data) {
                                Swal.fire(
                                    'Status!',
                                    'Status has been changed.',
                                    'success',
                                )
                                window.location.href = '/mgiadmin/aboutus/all/ourteam'
                            }
                        });
                    } else {
                        window.location.href = '/mgiadmin/aboutus/all/ourteam'
                    }
                })

            })
            $('#example1 .team-input').bootstrapToggle();
        })
    </script>
@endsection
