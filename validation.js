$(document).ready(function() {
  $("#contactForm").validate({
      rules: {
          name: {
              required: true,
              minlength: 2,
          },
          email: {
              required: true,
              email: true,
          },
          message: "required" 
      },
      messages: {
          name: {
              required:  "Please specify your name",
              minlength: "Name should be at least 2 characters long",
          },
          email: {
              required: "Please enter your Email",
              email: "Your email address must be in the format of name@domain.com",
          },
          message: "Please leave a message so I can get back to you." // Error message for the "message" field
      },
      errorElement: "small",
      errorClass: "error-text",
      errorPlacement: function(error, element) {
          // Append the error message directly after the form input field
          error.insertAfter(element);
      }
  });
});