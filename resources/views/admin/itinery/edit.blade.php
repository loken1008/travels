@extends('admin.body.master')
@section('title', 'Tour')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Update Tour Place</h4>
                <a class="btn btn-primary " href="{{ route('tour.viewdetails', $edititinery->id) }}" style="width:5rem"
                    title="edit"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{ route('itinery.update', $edititinery->id) }}" method="post"
                    class="tab-wizard wizard-circle" enctype="multipart/form-data" id="edittourForm">
                    @csrf
<input type="hidden" value="{{ $edititinery->id}}" name="tour_id">
                    <section>
                        <div class="row">
                            {{-- itineries --}}
                            @foreach ($edititinery->itinerary as $key => $itineries)
                                <input type="hidden" name="itineraryid[]" value="{{ $itineries->id }}">

                                <h6 class="font-weight-bold">Itinerary {{ $key + 1 }} Section</h6>
                                <div class="row" >
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName5">Day Title :</label>
                                            <input type="text" class="form-control" id="firstName5" name="day_title[]"
                                                value="{{ $itineries->day_title }}">


                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName6"> Long Description :</label>
                                            <textarea id="editor6" name="long_description[]" rows="10" cols="80"
                                                value="{{ $itineries->long_description }}">
                                        {{ $itineries->long_description }}
                                    </textarea>


                                        </div>
                                        <a href="{{ route('itinery.delete', $itineries->id) }}"
                                            class="btn btn-warning mt-1" style="width:5rem;" id="delete"
                                            title="trash"><i class="fa fa-trash"></i></a>
                                    </div>

                                </div>
                            @endforeach
                            <div class="row" id="itinerary">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="daytitle">Day Title :</label>
                                        <input type="text" class="form-control" id="daytitle" name="day_title[]">

                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="longdescription"> Itineries Description :<span
                                                class="text-danger">*</span></label>
                                        <textarea id="editor4" name="long_description[]" rows="10" cols="80"> </textarea>

                                    </div>
                                </div>

                            </div>
                            <div class="" style="margin-left:9px !important">
                                <a href="javascript:void(0)" class="btn btn-rounded btn-success pull-left "
                                    id="addMoreitinerary"></span>
                                    Add More</a>


                                <input id="submit-templateeditor" type="submit" class="btn btn-rounded btn-info pull-right"
                                    value="Update Itineries">
                            </div>
                        </div>
                    </section>
                </form>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>

    <script>
        var i = 0;
        var x = 1;

        $("#addMoreitinerary").click(function(e) {

            i++;
            var editorId1 = "editor4" + i;
            $("#itinerary").append(

                '<div class="box-body wizard-content"><section><div class="row itineraryCopy"><div class="col-md-6"><div class="form-group"><label for="firstName5">Day Title :</label><input type="text" class="form-control" id="firstName5" name="day_title[]"></div>  </div><div class="col-md-6"><div class="form-group"><label for="firstName5"> Long Description :</label><textarea id="' +
                editorId1 +
                '" name="long_description[]" rows="10" cols="80"> </textarea></div></div>  <div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right ml-4 removeitinerary">Remove</a></div></div></section> </div>'
            );
            CKEDITOR.replace(editorId1);

        });

        $(document).on('click', '.removeitinerary', function() {
            $(this).parents('.itineraryCopy').remove();
        });
    </script>


    <script>
        CKEDITOR.replaceAll();
    </script>
@endsection
