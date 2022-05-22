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
                        <h2>Your Feedback</h2>
                        <h4>Please help us to serve you better by taking a couple of minutes.</h4>
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
                                    <img src="./images/feedback_avatar.png" class="avatar-img-big" alt="profile_img" />
                                </div>
                            </div>
                        </div>
                        <div class="client-form-right">
                            <form action="./php/actions/feedback.php" method="POST" id="buyPolicyForm">
        <div class="content">
            <div class="content-form">
                <section>
                    <i class="fa fa-map-marker fa-2x" aria-hidden="true"></i>
                    <h2>address- you can send feedback</h2>
                    <p>
                        107,mathale Rd,Mathara <br> Regal Ln, <br> 47,Dharmapala Rd,colombo
                    </p>
                </section>

                <section>
                    <i class="fa fa-phone fa-2x" aria-hidden="true"></i>
                    <h2>Phone- you can tell your feedback to us </h2>
                    <p>+94 11 2 441 765(Mathara)</p>
                    <p>+94 13 2 551 785(Colombo)</p>
                </section>

                <section>
                    <i class="fa fa-envelope fa-2x" aria-hidden="true"></i>
                    <h2>E-mail- you can send your feedback as e-mail</h2>
                    <p>---@email.com</p>
                </section>
            </div>
        </div>
                                    <hr>
                                    <div class="form-common">
                                        <span class="form-label">Name <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" name="name" required>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Email <span class="float-r">:</span></span>
                                        <input class="form-control" type="email" name="email" required>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Subject <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" name="subject" required>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Feedback<span class="float-r">:</span></span>
                                        <textarea class="form-control" name="feedback"></textarea>
                                        <input type="hidden" name="action" value="create-feedback">
                                    </div>
                                <div class="form-btn">
                                <button type="submit" value="Submit" name="submitFeedback"  id="submitFeedback" class="btn primary-btn">
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
