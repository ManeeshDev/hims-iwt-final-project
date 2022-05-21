<?php include_once(dirname(__FILE__) .  '/includes/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title><?= APP_NAME ?> | Complete Client Profile</title>
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
        <!-- =========== CLIENT HEADER =============================== -->
        <section id="clientHeaderSec">
            <div class="container my-5">
                <div class="row justify-center">
                    <div class="client-header">
                        <h2>Complete Your Client Profile</h2>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== CLIENT FORM   =============================== -->
        <section id="clientFormSec">
            <div class="container my-5">
                <div class="row">
                    <div class="client-form">
                        <div class="client-user-img">
                            <div class="avatar-form-left">
                                <div class="outer-avatar">
                                    <img src="./images/user-avatar.svg" class="avatar-img-big" alt="profile_img" />
                                </div>
                            </div>
                        </div>
                        <div class="client-form-right">
                            <form action="#" method="POST" id="buyPolicyForm">
                                <div class="mb-30">
                                    <h2>Hello Maneesh!</h2>
                                </div>
                                <div class="client-form-common">
                                    <div class="form-common">
                                        <span class="form-label">Email <span class="float-r">:</span></span>
                                        <h4>example@gmail.com</h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Nic <span class="float-r">:</span></span>
                                        <h4>981443225V</h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Phone <span class="float-r">:</span></span>
                                        <h4>+94 766171525</h4>
                                    </div>
                                    <hr>
                                    <div class="form-common">
                                        <span class="form-label">Date of Birth <span class="float-r">:</span></span>
                                        <input class="form-control" type="date" required>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Marital State <span class="float-r">:</span></span>
                                        <select class="form-control" required>
                                            <option value="" selected="true" disabled="disabled">Select marital state</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="divorced">Divorced</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Gender <span class="float-r">:</span></span>
                                        <select class="form-control" required>
                                            <option value="" selected="true" disabled="disabled">Select gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Address</span>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label pl-15">State <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" placeholder="Enter your state">
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label pl-15">City <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" placeholder="Enter your city">
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label pl-15">Street <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" placeholder="Enter your street">
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label pl-15">Postal Code <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" placeholder="Enter your postal code">
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <button type="submit" value="Submit" name="submitProfile"  id="submitProfile" class="btn primary-btn">
                                        Submit Profile
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== END CLIENT FORM =============================== -->
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
