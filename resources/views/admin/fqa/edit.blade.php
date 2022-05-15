@extends('admin.body.master')
@section('title', 'Update FQA ')
@section('content')


    <!-- Main content -->
    <section class="content">
        <div class="row">

            <div class="col-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Update FQA</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="table">
                            <form action="{{ route('update.fqa', $editfqa->id) }}" method="post" id="editFqa">
                                @csrf
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form-group">
                                            <label>Tour Name<span class="text-danger">*</span></label>
                                            <div class="controls">
                                                <select name="tour_id" class="form-control">
                                                    <option value="">Select Tour</option>
                                                    @foreach ($gettour as $tour)
                                                        <option value="{{ $tour->id }}"
                                                            {{ $tour->id == $editfqa->tour_id ? 'selected' : '' }}>
                                                            {{ $tour->tour_name }}
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
                                                <input type="text" name="question" class="form-control"
                                                    value="{{ $editfqa->question }}">
                                                @error('question')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>



                                        <div class="form-group">
                                            <label for="firstName5"> Answer :</label>
                                            <textarea class="form-control" name="answer" rows="10" cols="10"
                                                value="{{ $editfqa->answer }}">{{ $editfqa->answer }}</textarea>
                                            @error('answer')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="text-xs-right" style="float:right">
                                    <input type="submit" class="btn btn-rounded btn-info" value="Update Fqa" />
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
    <script>
        $(document).ready(function() {
            $("#editFqa").validate({
                rules: {
                    tour_id: {
                        required: true,
                    },
                    "question": {
                        required: true

                    },
                    "answer": {
                        required: true
                    },
                },
                messages: {
                    tour_id: {
                        required: "Select Tour Name",
                    },
                    "question": {
                        required: "Enter Question",
                    },
                    "answer": {
                        required: "Enter Answer",
                    },

                },
            });

        });
    </script>
@endsection
