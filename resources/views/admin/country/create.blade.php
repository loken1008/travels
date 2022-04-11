@extends('admin.body.master')
@section('title', 'Country')
@section('content')
<section class="content">

    <!-- Step wizard -->
     <div class="box box-default">
       <div class="box-header with-border">
         <h4 class="box-title">Add Country</h4>
       </div>
       <!-- /.box-header -->
       <div class="box-body wizard-content">
           <form action="#" class="tab-wizard wizard-circle">
               <!-- Step 1 -->
               <h6>Country Information</h6>
               <section>
                   <div class="row">
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="firstName5">First Name :</label>
                               <input type="text" class="form-control" id="firstName5"> </div>
                       </div>
                       <div class="col-md-6">
                           <div class="form-group">
                               <label for="lastName1">Last Name :</label>
                               <input type="text" class="form-control" id="lastName1"> </div>
                       </div>
                   </div>
                  
           </form>
       </div>
       <!-- /.box-body -->
     </div>
     <!-- /.box -->


   </section>

   <textarea id="my-editor" name="content" class="form-control">{!! old('content', 'test editor content') !!}</textarea>
   <script src="//cdn.ckeditor.com/4.6.2/standard/ckeditor.js"></script>
   <script>
     var options = {
       filebrowserImageBrowseUrl: '/laravel-filemanager?type=Images',
       filebrowserImageUploadUrl: '/laravel-filemanager/upload?type=Images&_token=',
       filebrowserBrowseUrl: '/laravel-filemanager?type=Files',
       filebrowserUploadUrl: '/laravel-filemanager/upload?type=Files&_token='
     };
   </script>
<script>
    CKEDITOR.replace('my-editor', options);
    </script>
@endsection