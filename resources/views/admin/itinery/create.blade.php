@extends('admin.body.master')
@section('title', 'Itinerary')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">



            <!-- /.box-header -->
            <div class="box-body">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs nav-fill" role="tablist">
                    <li class="nav-item"> <a class="nav-link active" data-toggle="tab" href="#home11"
                            role="tab"><span></span> <span class="hidden-xs-down ml-15">Itinieries</span></a> </li>
                    <li class="nav-item"> <a class="nav-link" data-toggle="tab" href="#profile11"
                            role="tab"><span></span> <span class="hidden-xs-down ml-15">Equipment</span></a>
                    </li>

                </ul>
                <!-- Tab panes -->
                <div class="tab-content tabcontent-border">
                    <div class="tab-pane active" id="home11" role="tabpanel">
                        <div class="p-15 mb-50">
                            <form action="{{ route('itinery.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h6 class="font-weight-bold">Itinerary Section</h6>

                                <div>
                                    <div class="form-group">
                                        <label for="tour">Tours :</label>
                                        <select class="form-control" id="tour" name="tour_id">
                                            <option value="">Select Tour</option>
                                            @foreach ($getalltour as $tour)
                                                <option value="{{ $tour->id }}">{{ $tour->tour_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>

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
                                <div class="" style="margin-left:-9px !important">
                                    <a href="javascript:void(0)" class="btn btn-rounded btn-success pull-left "
                                        id="addMoreitinerary"></span>
                                        Add More</a>


                                    <input id="submit-templateeditor" type="submit"
                                        class="btn btn-rounded btn-info pull-right" value="Add Itineries">
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="tab-pane" id="profile11" role="tabpanel">
                        <div class="p-15 mb-50">
                            <form action="{{ route('equipment.store') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <h6 class="font-weight-bold">Equipments Section</h6>
                                <div>
                                    <div class="form-group">
                                        <label for="tour">Tours :</label>
                                        <select class="form-control" id="tour" name="tour_id">
                                            <option value="">Select Tour</option>
                                            @foreach ($getalltour as $tour)
                                                <option value="{{ $tour->id }}">{{ $tour->tour_name }}</option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                                <div class="row " id="equipment">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="equipmentname">Equipment Name :</label>
                                            <input type="text" class="form-control" id="equipmentname"
                                                name="equipment_name[]">

                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="edescription">Equipment Description :</label>
                                            <textarea id="editor3" name="equipment_description[]" rows="10" cols="80"> </textarea>

                                        </div>
                                    </div>

                                </div>
                                <div class="" style="margin-left:-9px !important">
                                    <a href="javascript:void(0)" id="addequipment"
                                        class="btn btn-rounded btn-success pull-left addMoreequipment"></span>
                                        Add More</a>
                                    <input id="submit-templateeditor" type="submit"
                                        class="btn btn-rounded btn-info pull-right" value="Add Equipment">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.box-body -->
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>

    <script>
        var i = 0;
        var x = 1;


        $("#addequipment").click(function(e) {

            i++;
            var editorId = "editor3" + i;
            $("#equipment").append(
                '<div class="box-body wizard-content"> <section><div class="row equipmentCopy"> <div class="col-md-6">  <div class="form-group"> <label for="firstName5">Equipment Name :</label> <input type="text" class="form-control" id="firstName5" name="equipment_name[]"></div></div><div class="col-md-6"><div class="form-group"><label for="firstName5"> Description :</label> <textarea id="' +
                editorId +
                '"  name="equipment_description[]" rows="10" cols="80"></textarea></div> </div><div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right remove-equipment-field">Remove</a></div> </div> </section></div>'
            );
            CKEDITOR.replace(editorId);
        });

        $(document).on('click', '.remove-equipment-field', function() {
            $(this).parents('.equipmentCopy').remove();
        });


        $("#addMoreitinerary").click(function(e) {

            i++;
            var editorId1 = "editor4" + i;
            $("#itinerary").append(

                '<div class="box-body wizard-content"><section><div class="row itineraryCopy"><div class="col-md-6"><div class="form-group"><label for="firstName5">Day Title :</label><input type="text" class="form-control" id="firstName5" name="day_title[]"></div>  </div><div class="col-md-6"><div class="form-group"><label for="firstName5"> Long Description :</label><textarea id="' +
                editorId1 +
                '" name="long_description[]" rows="10" cols="80"> </textarea></div></div>  <div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right removeitinerary">Remove</a></div></div></section> </div>'
            );
            CKEDITOR.replace(editorId1);

        });

        $(document).on('click', '.removeitinerary', function() {
            $(this).parents('.itineraryCopy').remove();
        });
    </script>
@endsection
