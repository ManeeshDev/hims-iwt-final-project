<?php
include_once(dirname(__FILE__) .  '/includes/config.php');
include_once(dirname(__FILE__) .  '/php/functions/validator.php');
$authorized_roles = ['user'];
include_once(dirname(__FILE__) .  '/includes/authenticate.php');
$id = $_GET['id'];
if ($id) {
    $conn = connect();
    $id = $conn->real_escape_string($id);
    $query = "SELECT * FROM `ticket` WHERE `id`= $id ";
    $ticket = readQuery($conn, $query)->fetch_assoc();
     
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Edit Ticket  | Health Insurance Management System</title>
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
    <?php include_once './components/navigation-bar.php' ?>
    <!-- ===================================== END NAV-BAR ===================================== -->

    <main>
    
        <div class="enquiry-form">
		<center><h1><b>ENQUIRY FORM</b></h1></center>
		 <p><b>If you have any queries kindly take a moment to fill up this form,our reprentatives will contact you shortly.<b></p>
		<form action="./php/actions/enquiry.php" method="post">
        <?php show_message(); ?>
			<p><b>Title:</b></p>
			<input type="text" value="<?= $ticket['title'] ?>" name="title" placeholder="title">
            <p><b>Subject:</b></p>
                <select name = "subject">
                <option value = "">"SELECT SUBJECT"</option>
                    <option value = "PROFILE VARIFICATION" <?= $ticket['subject'] == "PROFILE VARIFICATION" ? 'selected' :'' ?>>PROFILE VARIFICATION</option>
                    <option value = "TECHNICAL" <?= $ticket['subject'] == "TECHNICAL" ? 'selected' :'' ?> >TECHNICAL</option>
                    <option value = "PAYMENTS" <?= $ticket['subject'] == "PAYMENTS" ? 'selected' :'' ?>>PAYMENTS</option>
                    <option value = "PACKAGES" <?= $ticket['subject'] == "PACKAGES" ? 'selected' :'' ?>>PACKAGES</option>
                    <option value = "OTHERS"  <?= $ticket['subject'] == "OTHERS" ? 'selected' :'' ?>>OTHERS</option>
                </select>
			<p><b>Description:</b></p>
            <textarea name="description" placeholder="description" rows ="10" cols = "90"> <?= $ticket['description'] ?></textarea>
            <input type="hidden" name="action" value="edit-enquiry">
            <input type="hidden" name="id" value="<?= $id ?>">
			<button type="submit">SUBMIT</button>
		</form>
	</div>
    </main>

    <!-- ================================ CALL FOOTER HERE ================================ -->
    <?php include_once "./components/footer.php" ?>
    <!-- ================================   END FOOTER    ================================= -->

    <!-- ====== SCROLL TO TOP BUTTON ====== -->
    <button class="scroll-to-top-btn">
        <i class="arrow up"></i>
    </button>

    <!-- CALL APP JS MODULE -->
    <script src="./js/app.js" type="module"></script>
</body>
</html>
