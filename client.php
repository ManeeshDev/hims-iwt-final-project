<?php
    include_once(dirname(__FILE__) .  '/includes/config.php');
    include_once(dirname(__FILE__) .  '/includes/authenticate.php');
    include_once(dirname(__FILE__) .  '/php/functions/validator.php');
    include_once(dirname(__FILE__) .  '/php/functions/main.php');
    include_once(dirname(__FILE__) .  '/php/functions/policy.php');

    $ownUser = getOwnUser();
    $email = $ownUser && !empty($ownUser) ? $ownUser["email"] : '';
    $name = $ownUser && !empty($ownUser) ? $ownUser["name"] : '';
    $nic = $ownUser && !empty($ownUser) ? $ownUser["nic"] : '';
    $phone = $ownUser && !empty($ownUser) ? $ownUser["phone_number"] : '';

    $policyId = isset($_GET['pId']) ? $_GET['pId'] : '';
    $policyTerm = isset($_GET['pTerm']) ? $_GET['pTerm'] : '';
?>
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

<body class="mobile-view loading body-bg-l-ocean">

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
                            <form action="/php/actions/client.php" method="POST" id="clientForm">
                                <div class="mb-30">
                                    <h2>Hello <?= $name ?>!</h2>
                                </div>
                                <div class="client-form-common">
                                    <div class="form-common">
                                        <span class="form-label">Email <span class="float-r">:</span></span>
                                        <h4><?= $email ?></h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Nic <span class="float-r">:</span></span>
                                        <h4><?= $nic ?></h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Phone <span class="float-r">:</span></span>
                                        <h4><?= $phone ?></h4>
                                    </div>
                                    <hr>
                                    <div class="form-common">
                                        <span class="form-label">Date of Birth <span class="float-r">:</span></span>
                                        <input class="form-control" type="date" name="dob" required>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Marital State <span class="float-r">:</span></span>
                                        <select class="form-control" name="marital-state" required>
                                            <option value="" selected="true" disabled="disabled">Select marital state</option>
                                            <option value="single">Single</option>
                                            <option value="married">Married</option>
                                            <option value="divorced">Divorced</option>
                                        </select>
                                        <span class="select-arrow"></span>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Gender <span class="float-r">:</span></span>
                                        <select class="form-control" name="gender" required>
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
                                        <input class="form-control" type="text" name="state" placeholder="Enter your state" required>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label pl-15">City <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" name="city" placeholder="Enter your city" required>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label pl-15">Street <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" name="street" placeholder="Enter your street" required>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label pl-15">Postal Code <span class="float-r">:</span></span>
                                        <input class="form-control" type="text" name="postal-code" placeholder="Enter your postal code" required>
                                    </div>
                                </div>
                                <div class="form-btn">
                                    <input type="hidden" name="policy-id" value="<?= $policyId ?>"/>
                                    <input type="hidden" name="policy-term" value="<?= $policyTerm ?>"/>
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
