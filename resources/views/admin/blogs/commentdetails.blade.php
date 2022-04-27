@extends('admin.body.master')
@section('title', 'Comments Details')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">View Comments Details</h4>
                
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">

                <section>
                    <div class="row">
                       
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="firstName5" style="color:white;font-size:14px">Blog Title :</label>
                                <h5>@if(!empty( $detailscomment->blogs->blog_title)){{ $detailscomment->blogs->blog_title }}@endif</h5>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5 h2 " style="color:white;font-size:14px"> Name :</label>
                                <span>@if(!empty( $detailscomment->blogs->blog_title)){{ $detailscomment->name }}@endif</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="firstName5 h2 " style="color:white;font-size:14px"> Email :</label>
                                <span>@if(!empty($detailscomment->email)){{ $detailscomment->email }}@endif</span>
                            </div>
                        </div>
                       
                        <div class="col-md-12">
                            <div class="form-group">
                               
                                <p class="text-justify" style="background: white;
                                padding: 20px;
                                width: 623px;
                                border-radius: 10px;color:black">@if(!empty($detailscomment->comment)){{$detailscomment->comment}}@endif</p>
                                @if(!empty($detailscomment->comment))
                                @foreach($detailscomment->replies as $reply)
                                reply:<div class="col-md-12 mt-4" style="background: rgb(220, 220, 220);
                                padding: 20px;
                                width: 623px;
                                border-radius: 10px;margin-left:2rem;color:black">
                                    <div class="form-group">
                                        <p class="text-justify">{!! $reply->comment !!}</p>
                                    </div>
                                </div>
                                @endforeach 
                                @endif
                            </div>
                          
                        </div>

                        
                       
                       
                       
                    </div>
                   
                    <hr>
                 
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>

@endsection
