<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Forum | Health Insurance Management System</title>
    <!-- Favicon -->
    <link href="./images/favicon.ico" rel="icon" />
    <!-- CALL APP STYLE SHEET -->
    <link href="./css/app.css" rel="stylesheet" />
    <link href="./css/profile.css" rel="stylesheet" />
</head>

<body class="mobile-view loading">
    <!-- =========== PAGE PRE-LOADER =============================== -->
    <div class="pre-loader" id="preLoader">
        <div class="pre-loader-gif"></div>
    </div>
    <!-- ================================== CALL NAV-BAR HERE ================================== -->
    <?php include_once(dirname(__FILE__) .  '/components/navigation-bar.php') ?>
    <!-- ===================================== END NAV-BAR ===================================== -->
    <main class="profile" style="margin-top: 50px;">
        <div class="row justify-center">
            <div class="col-5 border">
                <div class="row px-3">
                    <div class="d-block w-100 mb-5x">
                        <h4 class="text-center">Create Forum</h4>
                    </div>
                    <?php show_message(); ?>
                    <form action="php/actions/forum.php" method="POST">

                        <div class="col-12 py-0">
                            <label class="labels"> Username: </label>
                            <input type="text" name="uname" class="form-control" required>
                        </div>
                        <div class="col-12 py-0">
                            <label class="labels">UserMobileNumber: </label>
                            <input type="text" name="mobile" class="form-control" required>
                        </div>
                        <div class="col-12 py-0">
                            <label class="labels"> UserEmail-Id: </label>
                            <input type="text" name="email" class="form-control" required>
                        </div>
                        <div class="col-12 pt-0">
                            <label class="labels"> YourFeedback/Comment: </label>
                            <textarea name="comments" rows="15" col="50" class="form-control" required> </textarea>
                        </div>
                        <div class="mt-5 text-center">
                            <button class="btn btn-primary profile-button" type="submit">submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <center><img src="./images/HIMS.jpg"></center>
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