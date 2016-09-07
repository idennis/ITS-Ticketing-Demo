$(document).ready(function(){

    // Validation
    $("#add-comment-form").validate({
        rules: {
            newMessage: {
                required: true,
                minlength: 10
            },
        },
        messages: {
            newMessage: {
                required: "You can't leave the reply blank."
            }
        }
    });


    // Process form
    $(document).submit("#add-comment-form", function(e) {
        e.preventDefault();


        /* Serialised data */
        var data = $(this).serialize();

        $.ajax({
            type: "POST",
            url: "/WDA/comment/staff",
            contentType: 'application/json',
            data: JSON.stringify({
                "comment":{
                    "ticketId": ticket.ticket.ticket_id,
                    "comment": $("#newMessage").val()
                }

            }),
            success:  function(formData) {
                var comment = jQuery.parseJSON(formData);
                if (comment.success === false){
                    console.log("Error submitting comment");
                }
                if (comment.success === true){
                    showLatestReply();
                    $("#newMessage").val('');
                }
            }
        });
        return false;
    });

});


function getAllReplies(){
    $.ajax({
        type: "POST",
        url: "/WDA/comment/viewall",
        contentType: 'application/json',
        data: JSON.stringify({
            "ticketId": ticket.ticket.ticket_id
        }),
        success:  function(formData) {
            comments = jQuery.parseJSON(formData);
            if (comments.success === false){
                console.log("Error showing comment");
            }
            if (comments.success === true){
                displayAllReplies();
            }
        }
    });
    return false;
}


function displayAllReplies(){

    $newHtmlRowHead = '<legend class="reply-separator"></legend><div class=" col-md-12 new-reply-container"><p class="ticket-info-header-text reply-header">';
    $newHtmlRowHeadITS = '<legend class="reply-separator"></legend><div class=" col-md-12 new-reply-container"><p class="ticket-info-header-text reply-header reply-header-its">';
    $newHtmlRowName = ' added:'+'</p><p class="new-reply-text">';
    $newHtmlRowTail = '</p></div>';
    $.each(comments.comments, function(i, item){

    if (item.is_its == 1){
        $(".reply-main-container").append(
            $newHtmlRowHeadITS+item.email+$newHtmlRowName+item.comment_text.replace(/(\r\n|\n|\r)/g,"<br />")+$newHtmlRowTail
        );
    }
    else{
        $(".reply-main-container").append(
            $newHtmlRowHead+item.email+$newHtmlRowName+item.comment_text.replace(/(\r\n|\n|\r)/g,"<br />")+$newHtmlRowTail
        );
    }

    });
}


function showLatestReply(){
    $.ajax({
        type: "POST",
        url: "/WDA/comment/viewall",
        contentType: 'application/json',
        data: JSON.stringify({
            "ticketId": ticket.ticket.ticket_id
        }),
        success:  function(formData) {
            comments = jQuery.parseJSON(formData);
            if (comments.success === false){
                console.log("Error showing comment");
            }
            if (comments.success === true){
                var totalComments = comments.comments.length;
                console.log(comments);


                $newHtmlRowHead = '<legend class="reply-separator"></legend><div class="new-reply-container col-md-12"><i class="fa fa-circle fa-1 new-reply-bullet"></i><p class="ticket-info-header-text reply-header reply-header-its">';
                $newHtmlRowName = ' added:'+'</p><p class="new-reply-text">';
                $newHtmlRowTail = '</p></div>';

                $latestReplyDiv = $newHtmlRowHead+comments.comments[totalComments-1].email+$newHtmlRowName+comments.comments[totalComments-1].comment_text.replace(/(\r\n|\n|\r)/g,"<br />")+$newHtmlRowTail;
                $($latestReplyDiv).hide().appendTo(".reply-main-container").fadeIn();

                $('.new-reply-container:last').css('border-top','2px solid #2C35E4');
                $('.new-reply-container:last-child p').css('padding-left','20px');

                $('.new-reply-container:last')
                .delay(1200)
                .queue(function (next) {
                    $(this).css({
                        'border-top': 'none',
                    });
                    $('.new-reply-bullet').css({
                        'opacity': '0',
                    });
                    $('.new-reply-container:last-child p').css('padding-left','15px');
                    next();
                })
                .delay(1)
                .queue(function (next){
                    $('.new-reply-bullet').css({
                        'display': 'none',
                    });
                });


            }
        }
    });
    return false;

}
