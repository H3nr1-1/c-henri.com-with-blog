$(document).ready(function(){
    $("#businessForm").validate({
        rules: {
            Name: {
                required: true,
                minlength: 2
            },
            Email: {
                required: true,
                email: true
            },
            WebsiteType: {
                required: true
            },
            Comment: {
                required: true
            }
        },
        messages: {
            Name: {
                required: "Please enter your name",
                minlength: "Name should be at least 2 characters long"
            },
            Email: {
                required: "Please enter your email address",
                email: "Please enter a valid email address in name@domain.com format"
            },          
            WebsiteType: "Please select the type of website you want",
            Comment: "Please provide a description of what you are looking for"
        },
        errorElement: "small",
        errorClass: "error-text2",
        errorPlacement: function(error, element) {
            // Append the error message directly after the form input field
            error.insertAfter(element);
        }
    });
});