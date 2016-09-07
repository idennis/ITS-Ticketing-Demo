/* new-ticket-form-script.js */

$(document).ready(function() {

	$("#submitted").hide();

	/* Process the form */
	$(document).submit("#report-issue", function() {

			/* Serialised data */
			var data = $("#report-issue").serialize();

			$.ajax({
				type: "POST",
        		url: "/WDA/ticket/new",
        		contentType: 'application/json',
				data: JSON.stringify({
					"user": {
						"firstName": $("#firstname").val(),
						"lastName": $("#lastname").val(),
						"email": $("#email").val()
					},
					"ticket": {
						"osType": $("#os").val(),
						"primaryIssue": $("#enquiry").val(),
			            "subject": $("#subject").val(),
						"additionalNotes": $("#description").val()
					}
				}),
				success: function(formData) {
					$("#report-issue").fadeOut(500).hide(function() {
						$("#submitted").fadeIn(500).show(function() {


							var ticket = jQuery.parseJSON(formData);

							var ticketId = ticket.ticketId;
							var name = $("#firstname").val() + " " + $("#lastname").val();
							var email = $("#email").val();
							var enquiry = $("#enquiry").val();
							var os = $("#os").val();
							var subject = $("#subject").val();
							var additionalNotes = $("#description").val();

							$(".hero-description").fadeOut();

							$(".user-ticket-ticketId").append(ticketId);
							$(".user-ticket-fullName").append(name);
							$(".user-ticket-email").append(email);
							$(".user-ticket-enquiryIssue").append(enquiry);
							$(".user-ticket-osType").append(os);
							$(".user-ticket-subject").append(subject);
							$(".user-ticket-additionalNotes").append(additionalNotes.replace(/(\r\n|\n|\r)/g,"<br />"));

							$(".hero-title").text("Ticket submitted");
              				$(".h1-subtitle").text("Your ticket has been successfully submitted to us.");

						});
					});
				}
			});
			return false;
		});
});
