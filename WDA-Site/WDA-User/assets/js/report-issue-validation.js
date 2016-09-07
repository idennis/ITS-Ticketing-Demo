/* Form validation */

$(document).ready(function() {

    $("#report-issue").validate({
        rules: {
            firstname: {
                required: true
            },
            lastname: {
                required: true
            },
            email: {
                required: true,
                email: true
            },
            enquiry: {
                required: true
            },
            subject: {
                required: true
            },
            description: {
                required: true
            }
        },
        messages: {
            firstname: {
                required: "Please enter your first name."
            },
            lastname: {
                required: "Please enter your last name."
            },
            email: {
                required: "Please enter your email.",
                email: "Please enter a valid email address."
            },
            enquiry: {
                required: "Please choose an enquiry type from the drop down menu."
            },
            subject: {
                required: "Please provide a concise title for your issue."
            },
            description: {
                required: "Please provide a description of your issue."
            }
        }
    })
});
