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
        <div style="margin:200px">
            <h1>About Us</h1>
        </div>
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