// This javascript file retrieves json data from DB
// and populate the page with data
var ticket, comments, ticketStatusClass;
$(document).ready(function(){

  $(function() {
    $('.btn-closeBtn').hover(function() {
      $('#closeBtn-icon').css('color', 'white');
    }, function() {
      // on mouseout, reset the background colour
      $('#closeBtn-icon').css('color', '');
    });
  });

    $(".ticket-notFound-message").hide();
    var sPageURL = decodeURIComponent(window.location.search.substring(1)),
    sURLVariables = sPageURL.split('?');

    if (sURLVariables.length > 1){
        console.warn("Too many variables");
    }
    else{
        var ticketID = sURLVariables[0].split('=')[1];
    }

    $.ajax({
        type: "POST",
        url: "/WDA/ticket/ticketUser",
        contentType: 'application/json',
        data: JSON.stringify({
            "ticketId": ticketID.toString()
        }),
        success:  function(formData) {

            ticket = jQuery.parseJSON(formData);
            if (ticket.success === false){
                console.log("ticket not found");
                $(".user-ticket-ticketTitle").text("Ticket does not exist.");
                $(".user-ticket-ticketId").hide();
                $(".ticket-notFound-message").show();
                $(".status").hide();
                $(".btn-closeBtn").hide();
                $(".ticket-content-container").hide();
            }
            if (ticket.success === true){
              console.log(ticket);
                $(".user-ticket-ticketTitle").text(ticket.ticket.subject);
                $(".user-ticket-ticketId").text("Ticket ID: #"+ticket.ticket.ticket_id);


                $(".user-ticket-fullName").text(ticket.user.first_name+" "+ticket.user.last_name);
                $(".user-ticket-issueCategory").text(ticket.ticket.primary_issue);
                $(".user-ticket-osType").text(ticket.ticket.os_type);
                $(".user-ticket-email").text(ticket.user.email);
                var additionalNotes = ticket.ticket.additional_notes.replace(/(\r\n|\n|\r)/g,"<br />");
                $(".user-ticket-originalMessage").html(additionalNotes);

                // Set ticket status
                replaceTicketStatus(ticket.ticket.status);
                getAllReplies();
            }
        }
    });
    return false;



});


function replaceTicketStatus($ticketStatus){
  $ticketStatus = $ticketStatus.toLowerCase();


    if ($ticketStatus == "pending"){
      var ticketStatusClass = "pending";
      $("#add-comment-form").show();
    }
    if ($ticketStatus == "in progress"){
      var ticketStatusClass = "in-progress";
      $("#add-comment-form").show();
    }
    if ($ticketStatus == "resolved"){
      var ticketStatusClass = "resolved";
      $("#add-comment-form").hide();
    }
    if ($ticketStatus == "unresolved"){
      var ticketStatusClass = "unresolved";
      $("#add-comment-form").hide();
    }

  console.log(ticketStatusClass);
  $('.status').replaceWith("<span class='status "+"status-"+ticketStatusClass+" user-ticket-status'><i class='fa fa-circle fa-1 fa-statusTag' aria-hidden='true'></i>"+$ticketStatus+"</span>");
}
