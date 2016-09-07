$(document).ready(function(){

    $("#confirm-CloseTicket-btn").click(function(){

        $.ajax({
            type: "POST",
            url: "/WDA/ticket/close",
            contentType: 'application/json',
            data: JSON.stringify({
                "ticketId": ticket.ticket.ticket_id.toString()
            }),
            success:  function(formData) {
                response = jQuery.parseJSON(formData);

                if (response.success === false){
                    console.log("Ticket not found");
                }
                if (response.success === true){
                    console.log("CLOSED");
                    $('#closeTicket-modal').modal('toggle');

                    ticket.ticket.status = "Resolved";
                    replaceTicketStatus(ticket.ticket.status);
                }

            }
        });
        return false;

    });

});
