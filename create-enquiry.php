<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>HIMS | Health Insurance Management System</title>
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
    
        <div class="enquiry-form">
		<h1><b>ENQUIRY FORM</b></h1>
		 <p><b>If you have any queries kindly take a moment to fill up this form,our reprentatives will contact you shortly.<b></p>
		<form action="#" method="post">
			<p><b>Title:</b></p>
			<input type="text" name="title" placeholder="title">
            <p><b>Subject:</b></p>
            <form>
                <select name = "subject">
                    <option value = "PROFILE VARIFICATION">PROFILE VARIFICATION</option>
                    <option value = "TECHNICAL">TECHNICAL</option>
                    <option value = "PAYMENTS">PAYMENTS</option>
                    <option value = "PACKAGES">PACKAGES</option>
                    <option value = "OTHERS">OTHERS</option>
                </select>
            </form>
			<p><b>Description:</b></p>
            <textarea name="discription" placeholder="discription" rows ="10" cols = "90"></textarea>
			<button type="submit">SUBMIT</button>
		</form>
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
