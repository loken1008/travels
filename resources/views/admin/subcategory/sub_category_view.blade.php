@extends('admin.body.master')
@section('title', 'Sub Category')
@section('content')
    <div class="container-full">        <!-- Main content -->
        <section class="content">
            <div class="row">


                <div class="col-8">

                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Sub Categories List</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>SN</th>
                                            <th>Category</th>
                                            <th>Sub Category Name</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse($subcategories as $key=> $subcategory)
                                            <tr>
                                                <td>{{$key+1}}</td>
                                                <td>{{ $subcategory['category']['category_name'] }}</td>
                                                <td>{{ $subcategory->sub_category_name }}</td>
                                                <td>
                                                    <a href="{{route('edit.subcategory',$subcategory->id)}}" class="btn btn-info" style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                    <a href="{{route('delete.subcategory',$subcategory->id)}}" class="btn btn-danger " style="width:5rem" id="delete" title="delete"><i class="fa fa-trash"></i></a>
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
                <div class="col-4">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Add Sub Category</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('store.subcategory') }}" method="post" >
                                    @csrf
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Category<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" id="select"  class="form-control">
                                                        <option value="" selected="" disabled>Select Category</option>
                                                        @foreach($category as $cat)
                                                        <option value="{{$cat->id}}">{{$cat->category_name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>SubCategory  Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="sub_category_name" class="form-control">
                                                    @error('sub_category_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Add New"/>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </section>
        <!-- /.content -->
@endsection
