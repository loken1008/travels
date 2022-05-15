$('#editor3').onChange(function(){
    debugger
}),
$(document).ready(function () {
    
    $("#tourForm").validate({
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
            altitude: {
                required: true,
            },
            tour_days: {
                required: true,
            },
            accomodation: {
                required: true,
            },
            transport: {
                required: true,
            },
            main_price: {
                required: true,
            },
            mainImage: {
                required: true,
            },
            images: {
                required: true,
            },
            map_url: {
                required: true,
            },
            description: {
                ckrequired: true,
            },
            cost_include: {
                ckrequired: true,
            },
            cost_exclude: {
                ckrequired: true,
            },
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
            altitude: {
                required: "Please enter attitude",
            },
            tour_days: {
                required: "Please enter tour days",
            },
            accomodation: {
                required: "Please enter accomodation",
            },
            transport: {
                required: "Please enter transport",
            },
            main_price: {
                required: "Please enter price",
            },
            mainImage: {
                required: "Please select main image",
            },
            images: {
                required: "Please select images",
            },
            map_url: {
                required: "Please enter map url",
            },
        },
    });
});

$(document).ready(function () {
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
