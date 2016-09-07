
$(document).ready(function(){

    // Hide input error message on default
    // $("#ticket-notfound-error").addClass("hidden");
    $("#ticket-notfound-error").hide();

    // Toggle slide down hero div for pseudo-login
    $(".follow-up-home-button").click(function(){
        $(".follow-up-hero-div").slideToggle("fast", "swing");
        $(this).toggleClass("clicked");
        $(this).toggleClass("active");
    });

    // Validation
    $("#user-login").validate({
        rules: {
            ticketID: {
                required: true
            },
        },
        messages: {
            ticketID: {
                required: "Please enter your Ticket ID."
            }
        }
    });

    // Process form
    $(document).submit("#user-login", function() {

        /* Serialised data */
        var data = $("#user-login").serialize();

        $.ajax({
            type: "POST",
            url: "/WDA/ticket/view",
            contentType: 'application/json',
            data: JSON.stringify({
                "ticketId": $("#ticketId-input").val()
            }),
            success:  function(formData) {
                var ticket = jQuery.parseJSON(formData);
                if (ticket.success === false){
                    $("#ticket-notfound-error").show();
                }
                if (ticket.success === true){
                    window.location = '/WDA/WDA-Site/WDA-User/user-ticket.php?ticketId='
                    + ticket.ticket.ticket_id;
                }
            }
        });
        return false;
    });

});
