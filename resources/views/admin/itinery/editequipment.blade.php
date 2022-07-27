@extends('admin.body.master')
@section('title', 'Tour')
@section('content')
    <section class="content">

        <!-- Step wizard -->
        <div class="box box-default">
            <div class="box-header with-border">
                <h4 class="box-title">Update Tour Place</h4>
                <a class="btn btn-primary " href="{{ route('tour.viewdetails', $editequipment->id) }}" style="width:5rem"
                    title="edit"><i class="fa fa-eye"></i></a>
            </div>
            <!-- /.box-header -->
            <div class="box-body wizard-content">
                <form action="{{ route('equipment.update', $editequipment->id) }}" method="post"
                    class="tab-wizard wizard-circle" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" value="{{ $editequipment->id }}">
                    <section>
                        <div class="row">



                            {{-- equipment --}}
                            @foreach ($editequipment->equipment as $key => $equipment)
                                <input type="hidden" name="equipmentid[]" value="{{ $equipment->id }}">

                                <h6 class="font-weight-bold">Equipments {{ $key + 1 }} Section</h6>
                                <div class="row " id="equipment">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName5">Equipment Name :</label>
                                            <input type="text" class="form-control" id="firstName5"
                                                name="equipment_name[]" value="{{ $equipment->equipment_name }}">


                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstName5"> Description :</label>
                                            <textarea id="editor5" class="editor5" name="equipment_description[]" rows="10" cols="80"
                                                value="{{ $equipment->equipment_description }}">
                                        {{ $equipment->equipment_description }}
                                    </textarea>

                                        </div>
                                    </div>
                                </div>
                                <a href="{{ route('equipment.delete', $equipment->id) }}" class="btn btn-warning mt-1"
                                    style="width:5rem;" id="delete" title="trash"><i class="fa fa-trash"></i></a>
                            @endforeach
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
                                <input id="submit-templateeditor" type="submit" class="btn btn-rounded btn-info pull-right"
                                    value="Update Equipment">
                            </div>

                        </div>


                </form>

            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->


    </section>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="{{ asset('assets/vendor_components/ckeditor/ckeditor.js') }}"></script>






    <script type='text/javascript'>
        CKEDITOR.replaceAll();
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
