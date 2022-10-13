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
                                                
                                                <th>Blog Title</th>
                                                <th>Comment User Name</th>
                                                <th>Email</th>
                                                <th>Comment</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($getcomment as $comment)
                                            <tr>
                                                <td>{{$comment->blogs->blog_title}}</td>
                                                <td>{{$comment->name}}</td>
                                                <td>{{$comment->email}}</td>
                                                <td>{{Str::limit($comment->comment,100)}}</td>
                                                <td class="p-1">
                                                    <a class="btn btn-primary {{($route=='blog.viewcommentdetails')?'active':''}}" href="{{route('blog.viewcommentdetails',$comment->id)}}"  style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                    <a href="{{route('blog.commentdelete',$comment->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
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
          
           

@endsection
