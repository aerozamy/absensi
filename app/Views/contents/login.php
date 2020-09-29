<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="/assets/css/font-face.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="/assets/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="/assets/vendor/bootstrap-4.5.2/css/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
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
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="/assets/images/icon/logo.png" alt="MA Sunan Ampel Pare">
                            </a>
                        </div>
                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="username" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" placeholder="Password">
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <a href="#">Lupa Password?</a>
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-10" type="submit">MASUK</button>
                            </form>
                            <div class="register-link">
                                <p>
                                    Belum punya akun?
                                    <a href="<?= base_url('/auth/register'); ?>">Daftar disini</a>
                                </p>
                            </div>
                            <hr>
                            <div class="text-center">
                                <h4>SISTEM ABSENSI</h4>
                                <h6>SISTEM INFORMASI MANAJEMEN MADRASAH</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

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