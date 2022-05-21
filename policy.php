<?php include_once(dirname(__FILE__) .  '/includes/config.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title><?= APP_NAME ?> | Health Insurance Policies</title>
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
        <!-- =========== POLICY HEADER =============================== -->
        <section id="policyHeaderSec">
            <div class="container my-5">
                <div class="row justify-center">
                    <div class="policy-header mb-30">
                        <h2>Health Insurance for Individuals</h2>
                        <h6>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Unde voluptatem, 
                            perspiciatis doloremque vitae, molestias architecto dolore sunt labore, 
                            ducimus deleniti tempora ea quaerat quibusdam? Provident alias repellat corporis 
                            nihil quos!</h6>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== POLICY FORM =============================== -->
        <section id="policyFormSec">
            <div class="container my-5">
                <div class="row">
                    <div class="buy-policy-form">
                        <div class="policy-form-l-bg"></div>
                        <div class="buy-policy-form-right">
                            <form action="/php/actions/policyAction.php" method="POST" id="buyPolicyForm">
                                <div class="mb-30">
                                    <h2>Make Your Insurance Plan</h2>
                                </div>
                                <div class="buy-policy-form-common">
                                    <div class="form-common">
                                        <span class="form-label">Title <span class="float-r">:</span></span>
                                        <h4>Health Insurance for Individuals</h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Coverage <span class="float-r">:</span></span>
                                        <h4>100%</h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Age Limit <span class="float-r">:</span></span>
                                        <h4>18 to 60 Years</h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Benefits <span class="float-r">:</span></span>
                                        <h4>These essential health benefits include at least the following items and services, 
                                            These essential health benefits include at least the following items and services</h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Per Month <span class="float-r">:</span></span>
                                        <h4>Rs. 5000.00</h4>
                                    </div>
                                    <div class="form-common">
                                        <span class="form-label">Term <span class="float-r">:</span></span>
                                        <h4>10 Years</h4>
                                    </div>
                                </div>
                                <span class="updated-on-txt float-r">Last Updated On: May 23, 2022</span>
                                <div class="form-btn">
                                    <button type="submit" value="Submit" name="selectNow"  id="selectNow" class="btn primary-btn">Select Now</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- =========== END POLICY FORM =============================== -->
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
