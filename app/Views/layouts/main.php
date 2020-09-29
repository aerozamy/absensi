<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>ABSENSI</title>

    <!-- Fontfaces CSS-->
    <link href="/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/assets/vendor/bootstrap-4.5.2/css/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <?= $this->renderSection('head'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="/assets/css/theme.css" rel="stylesheet" media="all">
    <script>
        var base = "<?= base_url() ?>"
    </script>

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar2">
            <div class="logo">
                <a href="#">
                    <img src="/assets/images/icon/logo-white.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar2__content js-scrollbar1">
                <nav class="navbar-sidebar2">
                    <ul class="list-unstyled navbar__list">
                        <?= $this->include('layouts/nav'); ?>
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container2">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop2">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap2">
                            <div class="logo d-block d-lg-none">
                                <a href="#">
                                    <img src="/assets/images/icon/logo-white.png" alt="CoolAdmin" />
                                </a>
                            </div>
                            <div class="header-button2">
                                <div class="header-button-item mr-0 js-sidebar-btn d-none d-sm-block d-md-none">
                                    <i class="zmdi zmdi-menu"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <aside class="menu-sidebar2 js-right-sidebar d-block d-lg-none">
                <div class="logo">
                    <a href="#">
                        <img src="/assets/images/icon/logo-white.png" alt="Cool Admin" />
                    </a>
                </div>
                <div class="menu-sidebar2__content js-scrollbar2">
                    <nav class="navbar-sidebar2">
                        <ul class="list-unstyled navbar__list">
                            <?= $this->include('layouts/nav'); ?>
                        </ul>
                    </nav>
                </div>
            </aside>
            <!-- END HEADER DESKTOP-->

            <!-- CONTENT -->
            <?= $this->renderSection('content'); ?>
            <!-- END CONTENT-->

        </div>
        <!-- END PAGE CONTAINER -->

    </div>

    <!-- Jquery JS-->
    <script src="/assets/vendor/jquery-3.5.1.min.js"></script>

    <!-- Bootstrap JS-->
    <script src="/assets/vendor/bootstrap-4.5.2/popper.min.js"></script>
    <script src="/assets/vendor/bootstrap-4.5.2/js/bootstrap.min.js"></script>
    <!-- Vendor JS       -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <?= $this->renderSection('js'); ?>
    <script src="/assets/vendor/slick/slick.min.js"></script>
    <script src="/assets/vendor/wow/wow.min.js"></script>
    <script src="/assets/vendor/animsition/animsition.min.js"></script>
    <script src="/assets/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js"></script>
    <script src="/assets/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="/assets/vendor/counter-up/jquery.counterup.min.js"></script>
    <script src="/assets/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="/assets/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="/assets/vendor/select2/select2.min.js"></script>

    <!-- Custom JS-->
    <script src="/assets/js/main.js"></script>
    <script src="/assets/js/moment.js"></script>
    <script src="/assets/js/custom.js"></script>
    <script src="/assets/js/apis.js"></script>

</body>

</html>
<!-- end document-->