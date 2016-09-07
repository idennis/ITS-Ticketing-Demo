<!-- FAQ -->
<!DOCTYPE html>

<!-- Identifies user's location in website -->
<?php
    $currPage = "faq";
?>

<html lang="en">

<head>

    <!-- Site metadata -->
    <title>FAQ &ndash; ITS Ticketing System | RMIT University </title>

    <!-- Global head items such as jQuery, Bootstrap, CSS, etc -->
    <?php include "./assets/head_items.php" ?>
    <link rel="stylesheet" href="./assets/css/faq-style.css">

</head>

<body>
    <div class="content">
        <div class="site-wide-container container">

            <!-- Navigation Bar -->
            <?php include_once "navbar.php"; ?>

            <div class="hero main-hero">

                <h1 class=faq-title>
                    Frequently Asked Questions
                </h1>
                <h1 class="h1-subtitle">
                    All your basics covered.
                </h1>

            <!-- End of hero div -->
            </div>


            <!-- Instantiate Bootstrap's md-10 grid -->
            <div class="row">
                <div class="col-md-10">

                    <!-- FAQ contents -->
                    <?php include "./assets/content/faq-student-content.php" ?>
                    <?php include "./assets/content/faq-staff-content.php" ?>

                    <!-- Submit a ticket hero banner -->
                    <div class="col-md-12 faq-ticket-hero">
                        <div class="col-md-5 faq-ticket-text">
                            Didn't find what you were looking for?
                        </div>
                        <div class="col-md-4 faq-ticket-button">
                            <a href="report-issue.php"><button class="btn btn-primary">Submit a Ticket</button></a>
                        </div>

                    </div>
                </div>
            </div>


        <!-- End of site-wide container -->
        </div>
    </div>
</body>

<!-- Footer -->
<?php include "footer.php"; ?>

</html>
