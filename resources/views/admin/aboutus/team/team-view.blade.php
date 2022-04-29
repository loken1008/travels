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
                                        <th> Name</th>
                                        <th>Post </th>
                                        <th>Language</th>
                                        <th>Experiences</th>
                                        <th>Field Type</th>
                                        <th>Description</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($ourteam as $team)
                                        <tr>
                                            <td>{{ $team->name }}</td>
                                            <td>{{ $team->post }}</td>
                                            <td>{{ $team->language }}</td>
                                            <td>{{ $team->experiences }}</td>
                                            <td>{{ $team->type }}</td>
                                            <td>{!! Str::limit($team->description,200) !!}</td>
                                            <td><img src="{{ asset($team->image) }}" style="height:100px;width:100px"
                                                    alt="">
                                            </td>
                                            <td>
                                                <input type="checkbox" class="team-input" data-toggle="toggle"
                                                data-id="{{ $team->id }}" {{ $team->status ? 'checked' : '' }}
                                                data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                data-offstyle="danger" onchange="changeStatus({{ $team->id }})">
                                            </td>
                                            <td>
                                                <a href="{{ route('view.team', $team->id) }}" class="btn btn-primary"
                                                    style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                <a href="{{ route('edit.team', $team->id) }}" class="btn btn-info mt-2"
                                                    style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.team', $team->id) }}"
                                                    class="btn btn-danger mt-2" style="width:5rem" id="delete"
                                                    title="delete"><i class="fa fa-trash"></i></a>
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
                var status = $(this).prop('checked') == true ? 1 : 0;
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
                            url: '/ourteam/changeStatus',
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
                                // window.location.href = '/ourteam'
                            }
                        });
                    } else {
                        // window.location.href = '/ourteam'
                    }
                })

            })
        })
    </script>
@endsection
