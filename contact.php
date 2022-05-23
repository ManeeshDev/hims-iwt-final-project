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
    <title>Contact | Health Insurance Management System</title>
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
    <main>
        <!-- =========== CONTACT-US =============================== -->
        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d63371.82136646649!2d79.90070725539222!3d6.9217921679819385!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae256db1a6771c5%3A0x2c63e344ab9a7536!2sSri%20Lanka%20Institute%20of%20Information%20Technology!5e0!3m2!1sen!2slk!4v1653285445476!5m2!1sen!2slk" width="100%" height="650" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        <div style="margin:20px 200px" class="text-center">
            <h1>Contact Us</h1>
        </div>
        <div class="container rounded bg-white mt-5 mb-5">
            <div class="row">
                <div class="col-6 border-right">
                    <div class="row px-3">
                        <div class="mb-5x">
                            <h4>Get In Touch</h4>
                        </div>
                        <form method="post" enctype="multipart/form-data">
                            <div class="row mt-2">
                                <div class="col-12 py-0">
                                    <label class="labels">Name</label>
                                    <input class="form-control" type="text" name="name" placeholder="Name" required>
                                </div>
                                <div class="col-12 py-0">
                                    <label class="labels">Email</label>
                                    <input class="form-control" type="email" name="email" placeholder="Email" required>
                                </div>
                                <div class="col-12 py-0">
                                    <label class="labels">Phone</label>
                                    <input class="form-control" type="text" name="phone" placeholder="Phone" required>
                                </div>
                                <div class="col-12 py-0">
                                    <label class="labels">Subject</label>
                                    <input class="form-control" type="text" name="subject" placeholder="Subject" required>
                                </div>
                                <div class="col-12 py-0">
                                    <label class="labels">Message</label>
                                    <textarea name="subject" placeholder="Subject" required class="form-control" style="height: 200px;" cols="30" rows="10"></textarea>
                                </div>
                            </div>
                            <div class="mt-5 text-center"> 
                                <button class="btn btn-primary profile-button" >Send</button>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-4">
                    <div class="row px-3">
                        <div class="mb-5x">
                            <h4>Contact Info</h4>
                        </div>
                        <div class="col-12 py-0 mb-25 mt-5">
                            <h5> <span style="font-size:20px"> (+94) 7412345677</span> </h5>
                            24 Hours
                        </div>
                        <div class="col-12 py-0 mb-25">
                            <h5><span style="font-size:20px">info@hims.lk</span></h5>
                            We reply with in 24 hours
                        </div>
                        <div class="col-12 py-0 mb-25">
                            <h5><span style="font-size:20px">Address</span></h5>
                                <span>
                                    SLIIT Malabe Campus, <br> New Kandy Rd, <br> Malabe 10115
                                </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- =========== END CONTACT-US =============================== -->
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