@extends('admin.body.master')
@section('title', 'Sub category')
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Edit SubCategory</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('update.subcategory',$editsubcategory->id) }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$editsubcategory->id}}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Category<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <select name="category_id" id="select"  class="form-control">
                                                        <option value="" selected="" disabled>Select Category</option>
                                                        @foreach($editcategory as $cat)
                                                        <option value="{{$cat->id}}"{{$cat->id==$editsubcategory->category_id?'selected':''}}>{{$cat->category_name}}</option>
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
                                                    <input type="text" name="sub_category_name" value="{{$editsubcategory->sub_category_name}}" class="form-control">
                                                    @error('sub_category_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Sub Category"/>
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
