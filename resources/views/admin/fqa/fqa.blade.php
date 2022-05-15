@extends('admin.body.master')
@section('title', 'FQA ')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">


            <div class="col-6">

                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">FQA List</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table-responsive">
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>Sn</th>
                                        <th>Tour Name</th>
                                        <th>Question </th>
                                        <th>Answer</th>
                                        <th>Status</th>
                                        <th>Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($allfqa as $key=> $fqa)
                                        <tr>
                                            <td>{{$key+1}}</td>
                                            <td>{{ $fqa->tour->tour_name }}</td>
                                            <td>{{ $fqa->question }}</td>
                                            <td>{{ Str::limit($fqa->answer,50) }}</td>
                                            <td>  <input type="checkbox" class="fqa-input" data-toggle="toggle"
                                                data-id="{{ $fqa->id }}" {{ $fqa->status ? 'checked' : '' }}
                                                data-on="Enabled" data-off="Disabled" data-onstyle="success"
                                                data-offstyle="danger"></td>
                                            <td>
                                                <a href="{{ route('view.fqa', $fqa->id) }}" class="btn btn-primary"
                                                    style="width:5rem" title="view"><i class="fa fa-eye"></i></a>
                                                  
                                                <a href="{{ route('edit.fqa', $fqa->id) }}" class="btn btn-info mt-2"
                                                    style="width:5rem" title="edit"><i class="fa fa-pencil"></i></a>
                                                <a href="{{ route('delete.fqa', $fqa->id) }}"
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

            <div class="col-6">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Add FQA</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('store.fqa') }}" method="post" id="fqaForm">
                                @csrf
                                <div class="row">
                                    <div class="col-12 input_fields_wrap" id="fqa">
                                        <div>
                                            <div class="form-group">
                                                <label>Tour Name<span class="text-danger">*</span></label>
                                                <div class="controls">
                                                    <select name="tour_id" class="form-control">
                                                        <option value="">Select Tour</option>
                                                        @foreach ($gettour as $tour)
                                                            <option value="{{ $tour->id }}">{{ $tour->tour_name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    @error('tour_id')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label>Question<span class="text-danger">*</span></label>
                                                <div class="controls">
                                                    <input type="text" name="question[]" class=" form-control" id="id_ct0">
                                                    @error('question[]')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <label for="firstName5"> Answer :</label>
                                                <textarea class="form-control" name="answer[]" rows="10" cols="10"></textarea>
                                                @error('answer[]')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <input type="button" class="btn btn-sm btn-primary add_field_button" value="Add More Fields">

                                        </div>
                                    </div>

                                </div>

                                <div class="text-xs-right" style="float:right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Add Fqa" />
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



    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.min.js"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.js"></script>

<script>
    $(function() {
        $('.fqa-input').change(function(e) {
            e.preventDefault();
            var status = $(this).prop('checked') == true ? '1 ': '0';
            var fqa_id = $(this).data('id');
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
                        url: '/fqa/changeStatus',
                        data: {
                            'status': status,
                            'fqa_id': fqa_id
                        },
                        success: function(data) {
                            Swal.fire(
                                'Status!',
                                'Status has been changed.',
                                'success',
                            )
                            window.location.href = '/fqa/view'
                        }
                    });
                } else {
                    window.location.href = '/fqa/view'
                }
            })

        })
    })
</script>


<script>
    $(document).ready(function() {
        $.validator.addMethod("mytst", function (value, element) {
        var flag = true;
                                
        $("[name^=question]").each(function (i, j) {
        $(this).parent('div').find('label.error').remove();
        $(this).parent('div').find('label.error').remove();                        
         if ($.trim($(this).val()) == '') {
            flag = false;
                                            
              $(this).parent('div').append('<label  id="id_ct'+i+'-error" class="error">Question is required.</label>');
                }
                });
                 return flag;
                }, "");
                $.validator.addMethod("ans", function (value, element) {
        var flag = true;
                                
        $("[name^=answer]").each(function (k, l) {
        $(this).parent('div').find('label.error').remove();
        $(this).parent('div').find('label.error').remove();                        
         if ($.trim($(this).val()) == '') {
            flag = false;
                                            
              $(this).parent('div').append('<label  id="id_at'+k+'-error" class="error">Answer is required.</label>');
                }
                });
                 return flag;
                }, "");
                
        $("#fqaForm").validate({
            rules: {
               tour_id:{
                 required:true,  
               },
               "question[]": {
                mytst: true
             
            },
            "answer[]": {
                ans: true
            },
        },
            messages: {
                tour_id: {
                    required: "Select Tour Name",
                },
               
            },
            submitHandler: function () {
        //you can add code here to recombine the variants into one value if you like, before doing a $.post
         form.submit();
        alert('successful submit');
        return false;
    }
});
var max_fields = 10; //maximum input boxes allowed
            var wrapper = $(".input_fields_wrap"); //Fields wrapper
            var add_button = $(".add_field_button"); //Add button ID

            var x = 1; //initlal text box count
            $(add_button).click(function(e) { //on add input button click
                e.preventDefault();
                if (x < max_fields) { //max input box allowed
                    x++; //text box increment
                    $(wrapper).append('<div ><div class="form-group"> <label>Question<span class="text-danger">*</span></label><div class="controls"><input type="text" name="question[]"  id="id_ct' + x + '" class="form-control"> @error('question[]')<span class="text-danger">{{ $message }}</span>@enderror</div></div><div class="form-group"><label for="firstName5"> Answer :</label><textarea id="id_ct' + x + '" class="form-control" name="answer[]" rows="10" cols="10"></textarea> @error('answer[]')<span class="text-danger">{{ $message }}</span>@enderror </div> <a href="#" class="remove_field btn btn-sm btn-danger">Remove</a></div>'); //add input box
                }
            });

            $(wrapper).on("click", ".remove_field", function(e) { //user click on remove text
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })

    });
</script>
@endsection
