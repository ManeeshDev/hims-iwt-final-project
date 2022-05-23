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
    <title>About | Health Insurance Management System</title>
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
        <!-- =========== ABOUT-US =============================== -->
        <section>
            <div class="about-section">
                <div class="inner-container">
                    <h1>About Us</h1>
                    <p class="text">
                    We are your partner in total health and wellness, 24/7. <br><br>
                    At Hims, we're more than a health insurance company. We are your partner in total health and wellness. And we’re here for you 24/7 – caring for your body and mind. <br><br>

                    As a global health service company, Hims's mission is to improve the health, well-being, and peace of mind of those we serve by making health care simple, affordable, and predictable. <br><br>

                    <span> We make it easy to get care – letting you choose how, when, and where you want it.</span> <br>
                    <span>We make health care more affordable by partnering with providers who provide quality, cost-effective care.</span> <br>
                    <span> Our goal is to provide you with comprehensive health care coverage with “no surprises.” </span> <br> <br>

                    Our values are the core of our culture. Our values guide how all 74,000 of us around the world work together, serve our customers, patients, clients, communities, and deliver on our mission.
                    </p>
                    <div class="we-are">
                        <div class="elements">
                            <div class="we-are-img">
                                <img src="./images/about/ab-1.png" alt="we-are-img">
                            </div>
                            <span>We care deeply about our customers, patients, and coworkers</span>
                        </div>
                        <div class="elements">
                            <div class="we-are-img">
                                <img src="./images/about/ab-2.png" alt="we-are-img">
                            </div>
                            <span>We partner, collaborate, and keep our promises</span>
                        </div>
                        <div class="elements">
                            <div class="we-are-img">
                                <img src="./images/about/ab-3.png" alt="we-are-img">
                            </div>
                           <span>We innovate and adapt</span>
                        </div>
                        <div class="elements">
                            <div class="we-are-img">
                                <img src="./images/about/ab-4.png" alt="we-are-img">
                            </div>
                            <span>We act with speed and purpose</span>
                        </div>
                        <div class="elements">
                            <div class="we-are-img">
                                <img src="./images/about/ab-5.png" alt="we-are-img">
                            </div>
                            <span>We create a better future–together</span>
                        </div>
                    </div>
            </div>
        </div>
        </section>
        <!-- =========== END ABOUT-US =============================== -->

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