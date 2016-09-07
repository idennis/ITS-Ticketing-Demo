<!DOCTYPE html>

<!-- Identifies user's location in website -->
<?php
    $currPage = "tickets";
?>

<html lang="en">

<head>

    <!-- Site metadata -->
    <title>Tickets &ndash; ITS Ticketing System | RMIT University </title>

    <!-- Global head items such as jQuery, Bootstrap, CSS, etc -->
    <?php include "../WDA-Staff/assets/head_items.php" ?>

    <!-- Page specific css -->
    <link rel="stylesheet" href="/WDA/WDA-Site/WDA-Staff/assets/css/tickets-style.css">
    <script src="/WDA/WDA-Site/WDA-Staff/assets/js/view-all-tickets.js"></script>

</head>

<body>
    <div class="content">
        <div class="site-wide-container container">

            <!-- Navigation Bar -->
            <?php include_once "../WDA-Staff/content/navbar.php"; ?>

            <div class="hero main-hero">

                <h1 class=ticket-title>
                    Tickets
                </h1>
                <h1 class="h1-subtitle">
                    Did you try turning it off and on again?
                </h1>

            <!-- End of hero div -->
            </div>


            <!-- Instantiate Bootstrap's md-12 grid -->

            <div class="row">
                <div class="col-md-12" id="insert-div">
                    <!-- Tickets table begin -->
                    <div class="ticket-header">
                    <h5 class="ticket-header-text">
                        Tickets
                    </h5>
                    </div>

                    <!-- Table begins -->
                    <table class="table ticket-table" style="border-collapse:collapse;">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Subject</th>
                            <th>Category</th>
                            <th>OS</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                        <tbody id="table-body">
                        </tbody>
                    </table>
                </div>
            </div>

        <!-- End of site-wide container -->
        </div>
    </div>
</body>

<!-- Footer -->
<?php include "../WDA-Staff/content/footer.php"; ?>

</html>
