@extends('admin.body.master')
@section('title', 'Coupon')
@section('content')
        <!-- Main content -->
        <section class="content">
            <div class="row">

                <div class="col-12">
                    <div class="box">
                        <div class="box-header with-border">
                            <h3 class="box-title">Update Coupon</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <div class="table">
                                <form action="{{ route('coupon.update') }}" method="post">
                                    @csrf
                                    <input type="hidden" name="id" value="{{$editcoupon->id}}">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <h5>Coupon Name<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="coupon_name" value="{{$editcoupon->coupon_name}}" class="form-control">
                                                    @error('coupon_name')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Discount Amount<span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="text" name="discount_amount" value="{{$editcoupon->discount_amount}}" class="form-control">
                                                    @error('discount_amount')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror

                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <h5>Coupon Validity <span class="text-danger">*</span></h5>
                                                <div class="controls">
                                                    <input type="date" name="coupon_validity" value="{{$editcoupon->coupon_validity}}" class="form-control" min="{{Carbon\Carbon::now()->format('Y-m-d')}}">
                                                    @error('coupon_validity')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-xs-right">
                                        <input type="submit" class="btn btn-rounded btn-info" value="Update Coupon"/>
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
