<?php
include_once(dirname(__FILE__) .  '/includes/config.php');
include_once(dirname(__FILE__) .  '/php/functions/validator.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title><?= APP_NAME ?> | Health Insurance Management System</title>
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
    <?php include_once(dirname(__FILE__) .  '/components/navigation-bar.php') ?>
    <!-- ===================================== END NAV-BAR ===================================== -->
    <main>
        <!-- =========== NOTIFICATION CARD =============================== -->
        <?php if (isset($_SESSION['ERRORS'])) : ?>
            <div id="notificationCard" class="notification slide-in">
                <div class="container">
                    <div class="notification-content">
                        <div class="nt-text-content">
                            <?php show_message(); ?>
                        </div>
                    </div>
                    <button class="nt-close-btn" id="notificationCloseBtn">×</button>
                </div>
            </div>
        <?php endif; ?>
        <!-- =========== END NOTIFICATION CARD =============================== -->

        <!-- =========== START BANNER AREA =============================== -->
        <section id="headerBanner">
            <div class="main-banner-area">
                <div class="container-fluid">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <div class="banner-text">
                                <span class="fadeInUp-3s">Investment Retirement Insurance</span>
                                <h1 class="fadeInUp-3s">The Right Protection to Keep You Moving Forward</h1>
                                <p class="fadeInUp-3s">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                                    eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum.</p>
                                <div class="fadeInUp-4s">
                                    <button class="btn primary-btn mr-3">Get Started</button>
                                    <button class="btn secondary-btn">Find An Agent</button>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 pr-0">
                            <div class="banner-img fadeInUp-2s">
                                <img src="./images/home-page-bg.svg" alt="Image" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="shape">
                    <img src="./images/banner-shape.png" alt="Image" />
                </div>
                <div class="banner-shape-right">
                    <img src="./images/banner-shape-right.png" alt="Image" />
                </div>
            </div>
        </section>
        <!-- =========== END BANNER AREA =============================== -->
        <!--    TODO Remove: Temp added div   -->
        <section id="headerBanner">
            <div class="container">
                <div style="height:600px;color:black;text-align:center;padding:30px;margin-top:200px">
                    <button class="btn">
                        <b>+</b> Add Home Content
                    </button>
                </div>
            </div>
        </section>
    </main>
    <!-- ================================ CALL FOOTER HERE ================================ -->
    <?php include_once(dirname(__FILE__) .  '/components/footer.php') ?>
    <!-- ================================   END FOOTER    ================================= -->
    <!-- ====== SCROLL TO TOP BUTTON ====== -->
    <button class="scroll-to-top-btn">
        <i class="arrow up"></i>
    </button>
    <!-- CALL APP JS MODULE -->
    <script src="./js/app.js" type="module"></script>
</body>

</html>