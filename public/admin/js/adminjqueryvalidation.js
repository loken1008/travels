$(document).ready(function() {
    $.validator.addMethod('ckrequired', function(value, element, params) {
        var idname = jQuery(element).attr('id');
        var messageLength = jQuery.trim(CKEDITOR.instances[idname].getData());
        return !params || messageLength.length !== 0;
    }, "This field is required");

    $("#tourForm").validate({
        ignore: [],
        rules: {
            country_id: {
                required: true,
            },
            category_id: {
                required: true,
            },
            tour_name: {
                required: true,
            },
            tour_days: {
                required: true,
            },
            main_price: {
                required: true,
            },
            mainImage: {
                required: true,
            },
            short_description: {
                required: true,
            },
            description: {
                ckrequired: true,
            },
        },

        messages: {
            country_id: {
                required: "Please select country",
            },
            
            category_id: {
                required: "Please select category",
            },
            tour_name: {
                required: "Please enter tour name",
            },
            
            tour_days: {
                required: "Please enter tour days",
            },
           
            main_price: {
                required: "Please enter price",
            },
            mainImage: {
                required: "Please select main image",
            },
            short_description: {
                required: "Please enter short description",
            },
            
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