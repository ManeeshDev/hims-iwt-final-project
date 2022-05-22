// feedback.php
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no" />
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="">
    <title>Profile | Health Insurance Management System</title>
    <!-- Favicon -->
    <link href="./images/favicon.ico" rel="icon" />
    <!-- CALL APP STYLE SHEET -->
    <link href="./css/app.css" rel="stylesheet" />
    <link href="./css/profile.css" rel="stylesheet" />
</head>
<?php
&con = mysql_connect("localhost","root","");
	if (!&con)
	{ 
	die('could not connect: '.mysql_error());
	}
	
my sql_select_db ("demo",$con);
$sql="INSERT INTO feedback VALUES
('$_POST[uname]','$_POST [mobile]',
'$_POST[email]','$_POST[comments]')";
	
	if (!mysql_queary($sql,$con))
	{
	die ('Error in posting values:' . mysql_error());
	}
	
	echo "feedback is stored in to the table successfully";
		mysql_close($con)
?>
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
