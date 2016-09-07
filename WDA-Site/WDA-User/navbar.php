<!-- Navbar -->
<nav class="navbar navbar-default" id="nav-menu">
    <div class="navbar-header">
        <a class="navbar-brand" href="./home.php">
            ITS Ticketing
        </a>

        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
    </div>

    <div class="collapse navbar-collapse" id="navbar-collapse">

        <ul class="nav navbar-nav navbar-right">
            <li class="navbar-user-li">
                <a
                    <?php echo ($currPage == '-') ? "class='active'" : ""; ?>
                    href="#">
                    <span class="fa fa-sign-in icon"></span> Login
                </a>
            </li>
            <li class="navbar-faq-li">
                <a
                    <?php echo ($currPage == 'faq') ? "class='active'" : ""; ?>
                    href="./faq.php">
                    <span class="fa fa-question-circle-o icon"></span> FAQ
                </a>
            </li>

        </ul>
    </div>
</nav>
