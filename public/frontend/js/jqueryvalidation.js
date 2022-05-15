
        $(document).ready(function() {
            $("#bookingForm").validate({
                rules: {
                    tour_id: {
                        required: true,
                    },
                    first_name:{
                        required: true,
                        maxlength: 20,
                    },
                    last_name:{
                        required: true,
                        maxlength: 20,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    address:{
                        required: true,
                    },
                    post_code:{
                        required: true,
                    },
                    telephone: {
                        required: true,
                        minlength:5,
                        maxlength:8,
                        number: true
                    },
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },
                   
                    country: {
                        required: true,
                    },
                    number_people: {
                        required: true,
                        number: true
                    },
                    arrival_date: {
                        required: true,
                    },
                    departure_date: {
                        required: true,
                    },
                    message: {
                        required: true,
                    },
                },
                messages: {
                    tour_id: {
                        required: "Please select tour",
                    },
                    first_name: {
                        required: "Please enter first name",
                        maxlength: "First name must be less than 20 characters",
                    },
                    last_name: {
                        required: "Please enter last name",
                        maxlength: "Last name must be less than 20 characters",
                    },
                    email: {
                        required: "Please enter email",
                        email: "Please enter valid email",
                        maxlength: "Email must be less than 50 characters",
                    },
                    address: {
                        required: "Please enter address",
                    },
                    post_code: {
                        required: "Please enter post code",
                    },
                    telephone: {
                        required: "Please enter telephone",
                        minlength: "Telephone must be 5 digits",
                        maxlength: "Telephone must be 8 digits",
                        number: "Please enter number",
                    },
                    mobile: {
                        required: "Please enter mobile",
                        minlength: "Mobile must be 10 digits",
                        maxlength: "Mobile must be 10 digits",
                        number: "Please enter number",
                    },
                    country: {
                        required: "Please select country",
                    },
                    number_people: {
                        required: "Please enter number of people",
                        number: "Please enter number",
                    },
                    arrival_date: {
                        required: "Please enter arrival date",
                    },
                    departure_date: {
                        required: "Please enter departure date",
                    },
                    message: {
                        required: "Please enter message",
                    },

                }
            });


            // registerform
            $("#crform").validate({
                rules: {                 
                    first_name:{
                        required: true,
                        maxlength: 20,
                    },
                    last_name:{
                        required: true,
                        maxlength: 20,
                    },
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20
                    },
                    confirm_password: {
                        required: true,
                        minlength: 6,
                        maxlength: 20,
                        equalTo: "#password"
                    },
                    address:{
                        required: true,
                    },               
                    mobile: {
                        required: true,
                        minlength: 10,
                        maxlength: 10,
                        number: true
                    },             
                    country: {
                        required: true,
                    },
                },
                messages: {
                    tour_id: {
                        required: "Please select tour",
                    },
                    first_name: {
                        required: "Please enter first name",
                        maxlength: "First name must be less than 20 characters",
                    },
                    last_name: {
                        required: "Please enter last name",
                        maxlength: "Last name must be less than 20 characters",
                    },
                    email: {
                        required: "Please enter email",
                        email: "Please enter valid email",
                        maxlength: "Email must be less than 50 characters",
                    },
                    password: {
                        required: "Please enter password",
                        minlength: "Password must be 6 characters",
                        maxlength: "Password must be 20 characters",
                    },
                    confirm_password: {
                        required: "Please enter confirm password",
                        minlength: "Confirm password must be 6 characters",
                        maxlength: "Confirm password must be 20 characters",
                        equalTo: "Password and confirm password must be same",
                    },
                    address: {
                        required: "Please enter address",
                    },
                   
                    mobile: {
                        required: "Please enter mobile",
                        minlength: "Mobile must be 10 digits",
                        maxlength: "Mobile must be 10 digits",
                        number: "Please enter number",
                    },
                    country: {
                        required: "Please select country",
                    },
                }
            });

            // loginform
            $("#clform").validate({
                rules: {
                    email: {
                        required: true,
                        email: true,
                        maxlength: 50
                    },
                    password: {
                        required: true,
                    },
                },
                messages: {
                    email: {
                        required: "Please enter email",
                        email: "Please enter valid email",
                        maxlength: "Email must be less than 50 characters",
                    },
                    password: {
                        required: "Please enter password",
                    },
                }
            });
        });