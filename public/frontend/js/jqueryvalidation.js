$(document).ready(function () {
    $("#bookingForm").validate({
        rules: {
            tour_id: { required: !0 },
            full_name: { required: !0, maxlength: 20 },
            email: { required: !0, email: !0, maxlength: 50 },
            mobile: { required: !0, minlength: 10, maxlength: 10, number: !0 },
            country: { required: !0 },
            number_people: { required: !0, number: !0 },
        },
        messages: {
            tour_id: { required: "Please select tour" },
            first_name: {
                required: "Please enter full name",
                maxlength: "Full name must be less than 20 characters",
            },
            email: {
                required: "Please enter email",
                email: "Please enter valid email",
                maxlength: "Email must be less than 50 characters",
            },
            mobile: {
                required: "Please enter mobile",
                minlength: "Mobile must be 10 digits",
                maxlength: "Mobile must be 10 digits",
                number: "Please enter number",
            },
            country: { required: "Please select country" },
            number_people: {
                required: "Please enter number of people",
                number: "Please enter number",
            },
        },
    }),
        $("#crform").validate({
            rules: {
                first_name: { required: !0, maxlength: 20 },
                last_name: { required: !0, maxlength: 20 },
                email: { required: !0, email: !0, maxlength: 50 },
                password: { required: !0, minlength: 6, maxlength: 20 },
                confirm_password: {
                    required: !0,
                    minlength: 6,
                    maxlength: 20,
                    equalTo: "#password",
                },
                address: { required: !0 },
                mobile: {
                    required: !0,
                    minlength: 10,
                    maxlength: 10,
                    number: !0,
                },
                country: { required: !0 },
            },
            messages: {
                tour_id: { required: "Please select tour" },
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
                address: { required: "Please enter address" },
                mobile: {
                    required: "Please enter mobile",
                    minlength: "Mobile must be 10 digits",
                    maxlength: "Mobile must be 10 digits",
                    number: "Please enter number",
                },
                country: { required: "Please select country" },
            },
        }),
        $("#clform").validate({
            rules: {
                email: { required: !0, email: !0, maxlength: 50 },
                password: { required: !0 },
            },
            messages: {
                email: {
                    required: "Please enter email",
                    email: "Please enter valid email",
                    maxlength: "Email must be less than 50 characters",
                },
                password: { required: "Please enter password" },
            },
        });
});
