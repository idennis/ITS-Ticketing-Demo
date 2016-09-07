<!DOCTYPE html>

<!-- Identifies user's location in website -->
<?php
    $currPage = "report-issue";
?>

<html lang="en">

<head>

    <!-- Site metadata -->
    <title>Report an Issue &ndash; ITS Ticketing System | RMIT University </title>

    <!-- Global head items such as jQuery, Bootstrap, CSS, etc -->
    <?php include "./assets/head_items.php" ?>
    <link rel="stylesheet" href="./assets/css/report-issue-style.css">
    <link rel="stylesheet" href="/WDA/WDA-Site/global-assets/css/individual-ticket-style.css">
    <script src="./assets/js/report-issue-validation.js"></script>
    <script src="./assets/js/eventHandler-form.js"></script>
    <script src="./assets/js/new-ticket-form-script.js"></script>
</head>

<body>
    <div class="content">
        <div class="site-wide-container container">

            <!-- Navigation Bar -->
            <?php include_once "navbar.php"; ?>

            <div class="hero main-hero">

                <h1 class="hero-title">
                    Report an Issue
                </h1>
                <h1 class="h1-subtitle">
                    We got yo back.
                </h1>
                <p><span class="hero-description">
                    Please fill out the form below, and we will endeavour to answer your enquiry within 48 hours.
                    </span>
                </p>

            </div><!-- End of hero div -->


            <!-- Instantiate Bootstrap's col-sm-4 grid -->
            <div class="row">
                    <!-- Form begins -->
                <form id="report-issue" name="reportIssueForm" class="result" method="post" autocomplete="off" novalidate="novalidate">

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="firstname">First Name</label>*
                            <input type="text" class="form-control" id="firstname" name="firstname" placeholder="Enter your first name">
                        </div>
                    </div>

                    <div class="col-sm-4">
                        <div class="form-group">
                            <label for="lastname">Last Name</label>*
                            <input type="text" class="form-control" id="lastname" name="lastname" placeholder="Enter your last name">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="email">Email Address</label>*
                            <input type="email" class="form-control" id="email" name="email" placeholder="Enter your email address">
                        </div>
                    </div>

                    <div class="col-sm-8">
                        <div class="form-group">
                            <label for="enquiry">Type of Enquiry</label>*
                            <select name="enquiry" class="form-control" id="enquiry">
                                <option disabled selected value=""> -- Select an option -- </option>
                                <option>Blackboard</option>
                                <option>General IT Enquiry</option>
                                <option>Google Mail</option>
                                <option>myRMIT</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="os">Operating System</label>
                            <select name="os" class="form-control" id="os">
                            <option disabled selected value=""> -- Select an option -- </option>
                                <option>Windows</option>
                                <option>macOS</option>
                                <option>Linux</option>
                                <option>Ubuntu</option>
                                <option>Other</option>
                            </select>
                        </div>

                        <div class="form-group text-description">
                            <legend>Issue Description*</legend>
                            <p>
                                Please provide more details of your issue in the text box below.
                                Details such as computer names, website paths, account numbers,
                                and error numbers will help us to resolve your issue more efficiently.
                            </p>

                            <!-- Ticket Subject -->
                            <div class="form-group">
                                <label for="subject">Subject</label>*
                                <input type="text" class="form-control" id="subject" name="subject" placeholder="Enter your issue subject">
                            </div>

                            <!-- Description -->
                            <label for="subject">Description</label>*
                            <textarea class="form-control" id="description" name="description" rows="5" placeholder="Provide more details here..."></textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Submit</button>

                    </div><!-- End col-sm-8 -->

                </form><!-- End form -->

            </div><!-- help -->

                    <!-- Submitted information from user -->
            <div id="submitted">
                <div class="col-md-10" style="padding-left:0">

                        <div class="panel-group">
                            <div class="panel panel-default">

                                <div class="panel-body">

                                    <!-- Ticket ID -->
                                    <div class="row individual-ticket-info-row receipt-ticketIdRow">
                                        <p class="col-md-12 ticket-info-header-text">
                                            Ticket ID
                                        </p>
                                        <p class="col-md-12 user-ticket-ticketId">
                                            <!-- Ticket ID -->
                                        </p>
                                        <!-- End of ticket id info row -->

                                    </div>

                                    <!-- Name -->
                                    <div class="row individual-ticket-info-row receipt-ticketNameRow">
                                        <p class="col-md-12 ticket-info-header-text">
                                            Full Name
                                        </p>
                                        <p class="col-md-12 user-ticket-fullName">
                                            <!-- FULL NAME -->
                                        </p>
                                        <!-- End of info row 1 -->
                                    </div>

                                    <!-- Email -->
                                    <div class="row individual-ticket-info-row">
                                        <p class="col-md-12 ticket-info-header-text">
                                                Email
                                            </p>
                                            <p class="col-md-12 user-ticket-email">
                                                <!-- EMAIL -->
                                        </p>
                                    </div>

                                    <!-- Enquiry and OS -->
                                    <div class="row individual-ticket-info-row">
                                        <!-- Enquiry -->
                                        <div class="col-md-4">
                                            <p class="ticket-info-header-text">
                                            Enquiry
                                            </p>
                                            <p class="user-ticket-enquiryIssue">
                                                <!-- ENQUIRY -->
                                            </p>
                                        </div>

                                        <!-- OS -->
                                        <div class="col-md-4">
                                            <p class="ticket-info-header-text">
                                            OS
                                            </p>
                                            <p class="user-ticket-osType">
                                                <!-- OS -->
                                            </p>
                                        </div>
                                    </div>

                                    <!-- Subject and Message -->
                                    <div class="row individual-ticket-info-row">
                                        <p class="col-md-12 ticket-info-header-text">
                                            Subject
                                        </p>
                                        <p class="col-md-12 user-ticket-subject">
                                            <!-- SUBJECT -->
                                        </p><br>
                                        <p class="col-md-12 ticket-info-header-text">
                                            Message
                                        </p>
                                        <p class="col-md-12 user-ticket-additionalNotes">
                                            <!-- ADDITIONAL NOTES -->
                                        </p>
                                    </div> <!-- End subject and message -->

                                </div> <!-- End panel body -->

                            </div> <!-- End panel -->
                        </div><!-- End panel group -->

                        </div>

                    </div> <!-- End submitted information div -->

            </div><!-- End col-md-10 -->

        </div> <!-- End of site-wide container -->
    </div>
</body>

<!-- Footer -->
<?php include "footer.php"; ?>

</html>
