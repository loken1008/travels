var i = 0;
var x = 1;

$("#dynamic-ar").click(function() {
    i++;
    $("#dynamicAddRemove").append(
        '<div class="box-body wizard-content"><section><div class="row dateprices" ><div class="col-md-6"><div class="form-group"><label for="firstName5">Start Date :</label><input class="form-control" id="id_ct' +
        i +
        '" name="start_date[]" type="date" ></div></div><div class="col-md-6"><div class="form-group"><label for="firstName5"> End Date :</label><input class="form-control" id="id_ed' +
        i +
        '" name="end_date[]" type="date" ></div> </div><div class="col-md-6"><div class="form-group"><label for="firstName5">Seats Available :</label><input type="text" class="form-control" id="firstName5"name="seats_available[]"></div></div> <div class="col-md-6"><div class="form-group"> <label for="firstName5"> Price :</label><input type="text" class="form-control" id="firstName5"name="price[]"></div></div> <div class="">  <a href="#" class="btn btn-rounded btn-danger pull-right remove-input-field">Remove</a></div></div></section></div>'

    );
});

$(document).on('click', '.remove-input-field', function() {
    $(this).parents('.dateprices').remove();
});


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


$("#add_field_button").click(function(e) {


    x++;
    $("#faq").append(
        '<div class="box-body wizard-content"><section><div class="row faqcopy"> <div class="col-md-6"> <div class="form-group"> <label for="question">Question</label><input type="text" name="question[]"  id="id_ct' +
        x +
        '" class="form-control"> </div></div> <div class="col-md-6"> <div class="form-group"> <label for="answer"> Answer :</label> <textarea id="id_ct' +
        x +
        '" class="form-control" name="answer[]" rows="10" cols="10"></textarea></div> </div><div class=""><a href="#" class="remove_field btn btn-rounded btn-danger pull-right">Remove</a> </div></div>  </section> </div>'
    ); //add input box

});


$(document).on('click', '.remove_field', function() {
    $(this).parents('.faqcopy').remove();
});


//editpart

$("#dynamic-ar").click(function() {
    i++;
    $("#dynamicAddRemove2").append(
        '<div class="box-body wizard-content"><section><div class="row dateprices" ><div class="col-md-6"><div class="form-group"><label for="firstName5">Start Date :</label><input class="form-control" id="id_ct' +
        i +
        '" name="start_date[]" type="date" ></div></div><div class="col-md-6"><div class="form-group"><label for="firstName5"> End Date :</label><input class="form-control" id="id_ed' +
        i +
        '" name="end_date[]" type="date" ></div> </div><div class="col-md-6"><div class="form-group"><label for="firstName5">Seats Available :</label><input type="text" class="form-control" id="firstName5"name="seats_available[]"></div></div> <div class="col-md-6"><div class="form-group"> <label for="firstName5"> Price :</label><input type="text" class="form-control" id="firstName5"name="price[]"></div></div> <div class="">  <a href="#" class="btn btn-rounded btn-danger pull-right remove-input-field">Remove</a></div></div></section></div>'

    );
});
$(document).on('click', '.remove-input-field', function() {
    $(this).parents('.dateprices').remove();
});


$("#equipment-add").click(function(e) {

    i++;
    var editorId = "editor5" + i;
    $("#equipmentAdd").append(
        '<div class="box-body wizard-content"> <section><div class="row editequipmentCopy"> <div class="col-md-12">  <div class="form-group"> <label for="firstName5">Equipment Name :</label> <input type="text" class="form-control" id="firstName5" name="equipment_name[]"></div></div><div class="col-md-12"><div class="form-group"><label for="firstName5"> Description :</label> <textarea id="' +
        editorId +
        '"  name="equipment_description[]" rows="10" cols="80"></textarea></div> </div><div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right remove-equipment-field">Remove</a></div> </div> </section></div>'
    );
    CKEDITOR.replace(editorId);
});

$(document).on('click', '.remove-equipment-field', function() {
    $(this).parents('.editequipmentCopy').remove();
});


$("#add-itineries").click(function(e) {

    i++;
    var editorId1 = "editor6" + i;
    $("#itineraryAdd").append(

        '<div class="box-body wizard-content"><section><div class="row eitineraryCopy"><div class="col-md-12"><div class="form-group"><label for="firstName5">Day Title :</label><input type="text" class="form-control" id="firstName5" name="day_title[]"></div>  </div><div class="col-md-12"><div class="form-group"><label for="firstName5"> Long Description :</label><textarea id="' +
        editorId1 +
        '" name="long_description[]" rows="10" cols="80"> </textarea></div></div>  <div class=""> <a href="javascript:void(0)" class="btn btn-rounded btn-danger pull-right removeitinerary">Remove</a></div></div></section> </div>'
    );
    CKEDITOR.replace(editorId1);

});

$(document).on('click', '.removeitinerary', function() {
    $(this).parents('.eitineraryCopy').remove();
});


$("#faq-add").click(function(e) {


    x++;
    $("#faqAdd").append(
        '<div class="box-body wizard-content"><section><div class="row efaqcopy"> <div class="col-md-12"> <div class="form-group"> <label for="question">Question</label><input type="text" name="question[]"  id="id_ct' +
        x +
        '" class="form-control"> </div></div> <div class="col-md-12"> <div class="form-group"> <label for="answer"> Answer :</label> <textarea id="id_ct' +
        x +
        '" class="form-control" name="answer[]" rows="10" cols="10"></textarea></div> </div><div class=""><a href="#" class="remove_field btn btn-rounded btn-danger pull-right">Remove</a> </div></div>  </section> </div>'
    ); //add input box

});


$(document).on('click', '.remove_field', function() {
    $(this).parents('.efaqcopy').remove();
});

// costincludes
$("#addMoreCostinclude").click(function(e) {


    x++;
    $("#costincludeAdd").append(
        '<div class="ecostncludecopy"> <div class="col-md-12 mt-4"> <div class="form-group"> <input type="text" class="form-control" id ="costinclude" name="cost_include[]" /> </div > </div > <div class= "" >  <a href="#"class="removecostinclude_field btn btn-rounded btn-danger pull-right" style="float:left;margin-bottom:10px"> Remove </a> </div> </div> '
    ); //add input box

});


$(document).on('click', '.removecostinclude_field', function() {
    $(this).parents('.ecostncludecopy').remove();
});

// costexlude
$("#addMoreCostexclude").click(function(e) {


    x++;
    $("#costexcludeAdd").append(
        '<div class="ecostexcludecopy"> <div class="col-md-12 mt-4"> <div class="form-group"> <input type="text" class="form-control" id ="costinclude" name="cost_exclude[]" /> </div > </div > <div class= "" >  <a href="#"class="removecostexclude_field btn btn-rounded btn-danger pull-right" style="float:left;margin-bottom:10px"> Remove </a> </div> </div> '
    ); //add input box

});


$(document).on('click', '.removecostexclude_field', function() {
    $(this).parents('.ecostexcludecopy').remove();
});