/* View all tickets */

$(document).ready(function() {

    $.ajax({
        type: "POST",
        url: "/WDA/ticket/viewAll",
        contentType: "application/json",
        success:  function(response) {

            tickets = jQuery.parseJSON(response);

            if (tickets.success === false) {
                /* Error handling */
                console.log("Something went wrong...");
            }

            if (tickets.success === true) {
                console.log(tickets);
                tickets.tickets.forEach(function(element){

                    // Build HREF for each row
                    var ticketRowLink = '/WDA/WDA-Site/WDA-Staff/helpTicket.php?ticketId='+element.ticket_id;

                    var tableRowStart = "<tr class='ticketRow' onclick='location.href=\""+ticketRowLink+"\"'>";
                    var tableRowEnd = "</tr>";
                    var ticketId = "<td>" + element.ticket_id + "</td>";
                    var userID = element.submitter_id;
                    var email = element.email;
                    var primaryIssue = element.subject;

                    var subject  = "<td><span class=\"ticket-name\">" + primaryIssue + "<br></span>" +
                                        "<span class=\"small\">" + " #" + userID + " (" + email + ")</span></td>";

                    var ticketStatus = element.status.toLowerCase();
                    if (ticketStatus === "in progress"){
                        var status = "<td class='ticketStatus-td'><span class=\"status status-in-progress\"><i class='fa fa-circle fa-1 fa-statusTag' aria-hidden='true'></i>" + element.status + "</span></td>"; /* By default, pending */
                    }
                    else{
                        var status = "<td class='ticketStatus-td'><span class=\"status status-"+element.status.toLowerCase()+"\"><i class='fa fa-circle fa-1 fa-statusTag' aria-hidden='true'></i>" + element.status + "</span></td>"; /* By default, pending */
                    }
                    var category = "<td>" + element.primary_issue + "</td>";
                    var os = "<td>" + element.os_type + "</td>";

                    var additionalNotes = element.additional_notes;

                    $("#table-body").append(tableRowStart + ticketId + subject + category + os + status + tableRowEnd);

                });

            }

        }
    });

});
