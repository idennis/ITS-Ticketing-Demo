<!-- Main landing page -->
<!DOCTYPE html>

<!-- Identifies user's location in website -->
<?php
    $currPage = "ticket";
?>

<html lang="en">

<head>

    <!-- Site metadata -->
    <title>Help Ticket - ITS Ticketing Staff | RMIT University </title>

    <!-- Global head items such as jQuery, Bootstrap, CSS, etc -->
    <?php include "./assets/head_items.php" ?>
    <link rel="stylesheet" href="/WDA/WDA-Site/global-assets/css/individual-ticket-style.css">
    <script src="./assets/js/follow-up-script.js"></script>

    <script src="./assets/js/staff-newReply.js"></script>

    <script src="/WDA/WDA-Site/global-assets/js/eventHandler-form.js"></script>
    <script src="./assets/js/staff-ticketStatus-handler.js"></script>
</head>

<body>

    <div class="home-body content">

        <div class="site-wide-container container">

            <!-- Navigation Bar -->
            <?php include "content/navbar.php"; ?>

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
                        <span class="status status-pending" id="user-ticket-status">
                          <!-- <i class="fa fa-circle fa-1" aria-hidden="true"></i> -->
                          <span class="status-text">{{Status}}</span></span>
                    </div>

                    <!--
                    WARNING WARNING WARNING WARNING
                    PLEASE MAKE NECESSARY CHANGES ON::
                    WDA-STAFF/ASSETS/JS/STAFF-TICKETSTATUS-HANDLER.JS

                    READ THE FUNCTIONS AND MAKE CHANGES
                    WHEN IT'S WORKING PLEASE REMOVE THE ORIGINAL TICKET-STATUS DIV
                    
                    -->

                    <!-- Drop down for status begins -->
                    <div class="col-xs-5 col-sm-2 col-md-2 dropdown">
                        <div class="btn-group">
                            <div class="btn dropdown-toggle" id="dropdown-status" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                                Update status
                                <span class="caret"></span>
                            </div>
                            <ul class="dropdown-menu" aria-labelledby="dropdown">
                                <li><a>Pending</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a>In progress</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a>Resolved</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a>Unresolved</a></li>
                            </ul>
                        </div>
                    </div>
                    <!-- Dropdown ends -->

                    <div class="col-xs-3 col-sm-2 col-md-3">
                        <button class="btn btn-closeBtn" data-toggle="modal" data-target="#closeTicket-modal" data-keyboard="true" id="user-closeTicket-btn" onclick="this.blur();"><i class="fa fa-times" id="closeBtn-icon"></i> Close Ticket</button>
                    </div>
                </div>

                <!-- Instantiate Bootstrap's md-10 grid -->
                <div class="row ticket-content-container">
                    <div class="col-md-10">
                        <!-- User ticket contents -->
                        <?php include 'content/individual-ticket.php' ?>


                    <!-- End of col-md-10 -->
                    </div>
                <!-- End of content row -->
                </div>
                <!-- Return home button -->
                <div class="row btn-margin-fix">
                    <div class="col-sm-12 col-md-2 btn-col ">
                        <a href="./tickets.php">
                            <button class="btn btn-secondary follow-up-home-button">Back to Ticket List</button>
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
<?php include_once "content/footer.php"; ?>

</html>
