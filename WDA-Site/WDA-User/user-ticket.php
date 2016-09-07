<!-- Main landing page -->
<!DOCTYPE html>

<!-- Identifies user's location in website -->
<?php
    $currPage = "ticket";
?>

<html lang="en">

<head>

    <!-- Site metadata -->
    <title>Your Ticket - ITS Ticketing System | RMIT University </title>

    <!-- Global head items such as jQuery, Bootstrap, CSS, etc -->
    <?php include "./assets/head_items.php" ?>

    <link rel="stylesheet" href="/WDA/WDA-Site/global-assets/css/individual-ticket-style.css">
    <link rel="stylesheet" href="./assets/css/closeTicket-style.css">
    <script src="./assets/js/follow-up-script.js"></script>
    <script src="./assets/js/user-newReply.js"></script>
    <script src="./assets/js/eventHandler-form.js"></script>
    <script src="./assets/js/ticketStatus-handler.js"></script>
</head>

<body>
    <?php include "assets/content/closeTicket-modal.php"; ?>
    <div class="home-body content">

        <div class="site-wide-container container">




            <!-- Navigation Bar -->
            <?php include "navbar.php"; ?>

            <div class="hero main-hero">

                <h2 class="user-ticket-ticketTitle">
                    {{Ticket Title}}
                </h2>

                <div class="row">
                    <h4 class="col-sm-12 ticket-notFound-message">
                        You're not supposed to be here :(
                    </h4>
                    <div class="col-sm-3 col-md-2">
                        <h4 class="user-ticket-ticketId">
                            {{Ticket ID: #12345}}
                        </h4>
                    </div>
                    <!-- Ticket status -->
                    <div class="col-xs-5 col-sm-2 col-md-2">
                        <span class="status" id="user-ticket-status">
                          <i class="fa fa-circle fa-1" aria-hidden="true"></i>
                          {{Status}}</span>
                    </div>
                    <div class="col-xs-3 col-sm-2 col-md-3">
                        <button class="btn btn-closeBtn" data-toggle="modal" data-target="#closeTicket-modal" data-keyboard="true" id="user-closeTicket-btn" onclick="this.blur();"><i class="fa fa-times" id="closeBtn-icon"></i> Close Ticket</button>
                    </div>
                </div>

                <!-- Instantiate Bootstrap's md-10 grid -->
                <div class="row ticket-content-container">
                    <div class="col-md-10">
                        <!-- User ticket contents -->
                        <?php include './assets/content/individual-ticket.php' ?>


                    <!-- End of col-md-10 -->
                    </div>
                <!-- End of content row -->
                </div>
                <!-- Return home button -->
                <div class="row btn-margin-fix">
                    <div class="col-sm-12 col-md-2 btn-col ">
                        <a href="./home.php">
                            <button class="btn btn-secondary follow-up-home-button">Return Home</button>
                        </a>
                    </div>
                </div>
            <!-- End of hero div -->
            </div>

        <!-- End of site-wide container -->
        </div>



    </div>
</body>

<!-- Footer -->
<?php include_once "footer.php"; ?>

</html>
