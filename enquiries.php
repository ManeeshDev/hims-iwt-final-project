<?php
include_once(dirname(__FILE__) .  '/includes/config.php');
include_once(dirname(__FILE__) .  '/php/functions/validator.php');
$authorized_roles = ['user'];
include_once(dirname(__FILE__) .  '/includes/authenticate.php');

$user_id = $_SESSION['id'];
$conn = connect();
$query = "SELECT * FROM ticket WHERE user_id = $user_id";
$result = mysqli_query($conn, $query);
$tickets = [];
while ($row = $result->fetch_array()) {
    $tickets[] = $row;
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
    <?php include_once './components/navigation-bar.php' ?>
    <!-- ===================================== END NAV-BAR ===================================== -->

    <main>
        <h1 class="text-center">My enquiries</h1>
        <?php show_message(); ?>
        <div class="d-flex justify-center">
            <table class="enquires">
                <tr>
                    <th>Title</th>
                    <th>Subject</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                <?php foreach ($tickets as $ticket) : ?>
                    <tr>
                        <td><?= $ticket['title'] ?></td>
                        <td><?= $ticket['subject'] ?></td>
                        <td><?= $ticket['description'] ?></td>
                        <td>
                            <center>
                                <hr>
                                <a href="edit-enquiry.php?id=<?= $ticket['id'] ?>">Edit</a>
                                <a href="php/actions/enquiry.php?id=<?= $ticket['id'] ?>&action=delete-enquiry">Delete</a>
                            </center>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </table>
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