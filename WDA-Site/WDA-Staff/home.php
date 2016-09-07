<!-- Main landing page -->
<!DOCTYPE html>

<!-- Identifies user's location in website -->
<?php
    $currPage = "home";
?>

<html lang="en">

<head>

    <!-- Site metadata -->
    <title>ITS Ticketing Staff | RMIT University </title>

    <!-- Global head items such as jQuery, Bootstrap, CSS, etc -->
    <?php include "./assets/head_items.php" ?>

</head>

<body>
    <div class="home-body content">

        <div class="site-wide-container container">

            <!-- Navigation Bar -->
            <?php include "content/navbar.php"; ?>

            <div class="hero main-hero">

                <h1>
                    Get their issues fixed.
                </h1>
                <h1 class="h1-subtitle">
                    Did you try turning it off and on again?
                </h1>

                <p class="hero-description">
                    This ticketing support site allows you to respond to RMIT University students and staff’s tech questions.
                </br></br>
                    ITS Ticketing System allows RMIT students and staff members to
                    report any IT-related issues and get help and support from our team.
                </p>

                <div class="row btn-margin-fix">
                    <div class="col-sm-12 col-md-2 btn-col">
                        <a href="tickets.php"><button class="btn btn-primary ticketsList-home-button">Start Now</button></a>
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
