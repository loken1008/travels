$(document).ready(function() {
    $.validator.addMethod('ckrequired', function(value, element, params) {
        var idname = jQuery(element).attr('id');
        var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
        return !params || messageLength.length !== 0;
    }, "This field is required");

    // // multiple validation
    // $.validator.addMethod("sd", function(value, element) {
    //     var flag = true;

    //     $("[name^=start_date]").each(function(i, j) {
    //         $(this).parent('div').find('label.error').remove();
    //         $(this).parent('div').find('label.error').remove();
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;

    //             $(this).parent('div').append('<label  id="id_at' + i + '-error" class="error">Start Date is required.</label>');
    //         }
    //     });
    //     return flag;
    // }, "");

    // $.validator.addMethod("ed", function(value, element) {
    //     var flag = true;

    //     $("[name^=end_date]").each(function(k, l) {
    //         $(this).parent('div').find('label.error').remove();
    //         $(this).parent('div').find('label.error').remove();
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;

    //             $(this).parent('div').append('<label  id="id_ed' + k + '-error" class="error">End Date is required.</label>');
    //         }
    //     });
    //     return flag;
    // }, "");


    // $.validator.addMethod("seat", function(value, element) {
    //     var flag = true;

    //     $("[name^=seats_available]").each(function(k, l) {
    //         $(this).parent('div').find('label.error').remove();
    //         $(this).parent('div').find('label.error').remove();
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;

    //             $(this).parent('div').append('<label  id="id_ed' + k + '-error" class="error">Seat Available is required.</label>');
    //         }
    //     });
    //     return flag;
    // }, "");

    // $.validator.addMethod("pri", function(value, element) {
    //     var flag = true;

    //     $("[name^=price]").each(function(k, l) {
    //         $(this).parent('div').find('label.error').remove();
    //         $(this).parent('div').find('label.error').remove();
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;

    //             $(this).parent('div').append('<label  id="id_ed' + k + '-error" class="error">Price is required.</label>');
    //         }
    //     });
    //     return flag;
    // }, "");

    // $.validator.addMethod("eqn", function(value, element) {
    //     var flag = true;

    //     $("[name^=equipment_name]").each(function(k, l) {
    //         $(this).parent('div').find('label.error').remove();
    //         $(this).parent('div').find('label.error').remove();
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;

    //             $(this).parent('div').append('<label  id="id_ed' + k + '-error" class="error">Equipment name is required.</label>');
    //         }
    //     });
    //     return flag;
    // }, "");
    // $.validator.addMethod("eqd", function(value, element) {
    //     var flag = true;

    //     $("[name^=equipment_description]").each(function(k, l) {
    //         $(this).parent('div').find('label.error').remove();
    //         $(this).parent('div').find('label.error').remove();
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;

    //             $(this).parent('div').append('<label  id="id_ed' + k + '-error" class="error">Equipment Description is required.</label>');
    //         }
    //     });
    //     return flag;
    // }, "");

    // $.validator.addMethod("daytitle", function(value, element) {
    //     var flag = true;

    //     $("[name^=day_title]").each(function(k, l) {
    //         $(this).parent('div').find('label.error').remove();
    //         $(this).parent('div').find('label.error').remove();
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;

    //             $(this).parent('div').append('<label  id="id_ed' + k + '-error" class="error">Day Title is required.</label>');
    //         }
    //     });
    //     return flag;
    // }, "");
    // $.validator.addMethod("lgdesc", function(value, element) {
    //     var flag = true;

    //     $("[name^=long_description]").each(function(k, l) {
    //         $(this).parent('div').find('label.error').remove();
    //         $(this).parent('div').find('label.error').remove();
    //         if ($.trim($(this).val()) == '') {
    //             flag = false;

    //             $(this).parent('div').append('<label  id="id_ed' + k + '-error" class="error">Description is required.</label>');
    //         }
    //     });
    //     return flag;
    // }, "");
    $("#tourForm").validate({
        ignore: [],
        rules: {
            country_id: {
                required: true,
            },
            place_id: {
                required: true,
            },
            category_id: {
                required: true,
            },
            tour_name: {
                required: true,
            },
            // altitude: {
            //     required: true,
            // },
            tour_days: {
                required: true,
            },
            // accomodation: {
            //     required: true,
            // },
            // transport: {
            //     required: true,
            // },
            main_price: {
                required: true,
            },
            mainImage: {
                required: true,
            },
            // images: {
            //     required: true,
            // },
            // map_url: {
            //     required: true,
            // },
            description: {
                ckrequired: true,
            },
            // cost_include: {
            //     ckrequired: true,
            // },
            // cost_exclude: {
            //     ckrequired: true,
            // },
            // "start_date[]": {
            //     sd: true,
            // },
            // "end_date[]": {
            //     ed: true,
            // },
            // "seats_available[]": {
            //     seat: true,
            // },
            // "price[]": {
            //     pri: true,
            // },
            // "equipment_name[]": {
            //     eqn: true,
            // },
            // "equipment_description[]": {
            //     eqd: true,
            // },
            // "day_title[]": {
            //     daytitle: true,
            // },
            // "long_description[]": {
            //     lgdesc: true,
            // },

        },

        messages: {
            country_id: {
                required: "Please select country",
            },
            place_id: {
                required: "Please select place",
            },
            category_id: {
                required: "Please select category",
            },
            tour_name: {
                required: "Please enter tour name",
            },
            // altitude: {
            //     required: "Please enter attitude",
            // },
            tour_days: {
                required: "Please enter tour days",
            },
            // accomodation: {
            //     required: "Please enter accomodation",
            // },
            // transport: {
            //     required: "Please enter transport",
            // },
            main_price: {
                required: "Please enter price",
            },
            mainImage: {
                required: "Please select main image",
            },
            // images: {
            //     required: "Please select images",
            // },
            // map_url: {
            //     required: "Please enter map url",
            // },
        },
        submitHandler: function() {
            //you can add code here to recombine the variants into one value if you like, before doing a $.post
            form.submit();
            alert('successful submit');
            return false;
        }
    });
});

$(document).ready(function() {
    $("#bannerForm").validate({
        rules: {
            title: {
                required: true,
            },
            banner_image: {
                required: true,
            },
        },
        messages: {
            title: {
                required: "Please enter banner title",
            },
            banner_image: {
                required: "Please select banner image",
            },
        },
    });
});