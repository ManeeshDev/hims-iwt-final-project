// feedback.php
<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');

$conn = connect();
$sql = "INSERT INTO forum ( `uname`, `mobile`, `email`, `comments`) VALUES ('" . $_POST['uname'] . "','" . $_POST['mobile'] . "', '" . $_POST['email'] . "','" . $_POST['comments'] . "')";

if (!mysqli_query($conn, $sql)) {
    die('Error in posting values:' . mysqli_error($conn));
}
 
addError("Forum is stored in to the table successfully", 'success');
header('Location: ' . $_SERVER['HTTP_REFERER']);
mysqli_close($conn)
?>