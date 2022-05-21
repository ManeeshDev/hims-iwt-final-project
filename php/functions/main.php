
<?php
// ============================================================
//         Reusable data fetching functions add here 
// ============================================================

include_once(dirname(__FILE__) .  '/../../includes/config.php');

function getClientByUserId($userID) {

    $conn = connect();
    $userId = $conn->real_escape_string(htmlspecialchars($userID));

    $query = "SELECT * FROM `client` WHERE `user_id`='" . $userId . "'";
    $result = readQuery($conn, $query);

    mysqli_close($conn);
    return $result;
}