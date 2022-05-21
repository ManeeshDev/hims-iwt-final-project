<?php
include_once(dirname(__FILE__) .  '/includes/config.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Login | Health Insurance Management System</title>
    <!-- Favicon -->
    <link href="./images/favicon.ico" rel="icon" />
    <!-- CALL APP STYLE SHEET -->
    <link href="./css/app.css" rel="stylesheet" />
</head>

<body class="mobile-view loading">
    <!-- =========== PAGE PRE-LOADER =============================== -->
    <div class="pre-loader" id="preLoader">
        <div class="pre-loader-gif"></div>
    </div>
    <!-- ================================== CALL NAV-BAR HERE ================================== -->
    <?php include_once './navigation-bar.php' ?>
    <!-- ===================================== END NAV-BAR ===================================== -->
    <main>
        <div class="limiter">
            <div class="container-login">
                <div class="wrap-login pl-55 pr-55 pt-65 pb-50">
                    <form class="login-form validate-form" action="php/actions/login.php" method="post">
                        <span class="login-form-title pb-33">
                            Account Login
                        </span>
                        <div class="wrap-input validate-input mb-5">
                            <input class="input" type="email" name="email" placeholder="Email">
                        </div>
                        <div class="wrap-input validate-input">
                            <input class="input" type="password" name="password" placeholder="Password">
                        </div>
                        <div class="container-login-form-btn mt-20">
                            <input type="hidden" name="action" value="login">
                            <button class="login-form-btn">Sign in</button>
                        </div>
                        <div class="text-center pt-45 pb-4">
                            <span class="txt1">Forgot</span>
                            <a href="forget-password.php" class="txt2 hov1"> Password?</a>
                        </div>
                        <div class="text-center">
                            <span class="txt1"> Create an account? </span>
                            <a href="sign-up.php" class="txt2 hov1"> Sign up </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
    <!-- ================================ CALL FOOTER HERE ================================ -->
    <?php include_once "./footer.php" ?>
    <!-- ================================   END FOOTER    ================================= -->
    <!-- ====== SCROLL TO TOP BUTTON ====== -->
    <button class="scroll-to-top-btn">
        <i class="arrow up"></i>
    </button>
    <!-- CALL APP JS MODULE -->
    <script src="./js/app.js" type="module"></script>
</body>

</html>