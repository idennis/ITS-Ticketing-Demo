<!-- Main landing page -->
<!DOCTYPE html>

<!-- Identifies user's location in website -->
<?php
    $currPage = "home";
?>

<html lang="en">

<head>

    <!-- Site metadata -->
    <title>ITS Ticketing System | RMIT University </title>

    <!-- Global head items such as jQuery, Bootstrap, CSS, etc -->
    <?php include "./assets/head_items.php" ?>
    <link rel="stylesheet" href="./assets/css/home-style.css">
    <script src="./assets/js/home-follow-up-script.js"></script>
</head>

<body>
    <div class="home-body content">

        <div class="site-wide-container container">

            <!-- Navigation Bar -->
            <?php include "navbar.php"; ?>

            <div class="hero main-hero">

                <h1>
                    ITS Ticketing System
                </h1>
                <h1 class="h1-subtitle">
                    Tech questions answered, quick.
                </h1>

                <p class="hero-description">
                    Information Technology Services (ITS) provides RMIT University
                    with information and communication technology in support of
                    RMIT's research, learning teaching and administrative activities.
                </br></br>
                    ITS Ticketing System allows RMIT students and staff members to
                    report any IT-related issues and get help and support from our team.
                </p>

                <div class="row btn-margin-fix">
                    <div class="col-sm-12 col-md-2 btn-col">
                        <a href="report-issue.php"><button class="btn btn-primary">Report an Issue</button></a>

                    </div>
                    <div class="col-sm-12 col-md-2 btn-col">
                            <button class="btn btn-secondary follow-up-home-button">Follow Up on Ticket</button>
                    </div>
                </div>

            <!-- End of hero div -->
            </div>

        <!-- End of site-wide container -->
        </div>

        <!-- Modal login hero div -->
        <div class="follow-up-hero-div">
            <div class="container text-container">
                <h2>Follow Up on Your Ticket</h2>
                <p>
                    Enter your support ticket ID to check on the latest updates
                    and replies from our ITS support team. You can also reply to
                    add on more information so we can help you further.
                </p>

                <form class="home-follow-up-form" id="user-login" name="userLoginForm" method="post" action="" autocomplete="off" novalidate="novalidate">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label for="ticketID">Ticket ID</label>*
                                <input type="text" class="form-control" id="ticketId-input" name="ticketID" placeholder="Enter your Ticket ID">
                                <label id="ticket-notfound-error" for="ticketID">
                                    Ticket not found.
                                </label>
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Check your Ticket</button>

                </form>
        
            <!-- End of container div -->
            </div>
        <!-- End of follow up div -->
        </div>

    </div>
</body>

<!-- Footer -->
<?php include_once "./footer.php"; ?>

</html>
