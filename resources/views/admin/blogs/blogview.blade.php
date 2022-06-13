@php
$prefix=Request::route()->getPrefix();
$route=Route::current()->getName();
@endphp
@extends('admin.body.master')
@section('title', 'Blog')
@section('content')

          

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-12">

                        <div class="box">
                            <div class="box-header with-border">
                                <h3 class="box-title">Blog List</h3>
                                <a href="{{route('blog.create')}}"><input type="submit" class="btn btn-rounded btn-info pull-right" value="Add Blogs"></a>
                            </div>
                          
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="table-responsive">
                                    <table id="example1" class="table table-bordered table-striped">
                                        <thead>
                                            <tr>
                                                <th>Tour Name</th>
                                                <th>Blog Title</th>
                                                <th>Author Name</th>
                                                <th>Blog Type</th>
                                                <th>Image</th>
                                                <th>Description</th>
                                                <th>Blog Create Date</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($getblog as $blog)
                                            <tr>
                                                <td>@if(!empty($blog->tour->tour_name)){{$blog->tour->tour_name}}@endif</td>
                                                <td>{{$blog->blog_title}}</td>
                                                <td>{{$blog->author_name}}</td>
                                                <td>{{$blog->blog_type}}</td>
                                                <td><img src="{{$blog->blog_image}}" height="100" width="100" alt=""></td>
                                                <td class="text-justify">{!!Str::words($blog->blog_description,20,'.')!!}</td>
                                                <td>{{$blog->created_at->format('M-d-Y')}}</td>
                                                <td>
                                                    <input type="checkbox" class=" blog-input" data-toggle="toggle"
                                                    data-id="{{ $blog->id }}" {{ $blog->status ? 'checked' : '' }}
                                                    data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                    data-offstyle="danger">
                                                </td>
                                                <td class="p-1">
                                                    <a class="btn btn-primary {{($route=='blog.viewdetails')?'active':''}}" href="{{route('blog.viewdetails',$blog->id)}}"  style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                    <a class="btn btn-info {{($route=='blog.edit')?'active':''}}" href="{{route('blog.edit',$blog->id)}}"  style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('blog.delete',$blog->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
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
                    $('.blog-input').change(function(e) {
                        e.preventDefault();
                        var status = $(this).prop('checked') == true ? 1 : 0;
                        var blog_id = $(this).data('id');
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
                                    url: '/blog/changeblogStatus',
                                    data: {
                                        'status': status,
                                        'blog_id': blog_id
                                    },
                                    success: function(data) {
                                        Swal.fire(
                                            'Status!',
                                            'Status has been changed.',
                                            'success',
                                        )
                                        window.location.href = '/blog/view'
                                    }
                                });
                            } else {
                                window.location.href = '/blog/view'
                            }
                        })
        
                    })
                    $('#example1 .blog-input').bootstrapToggle();
                })
            </script>
           

@endsection
