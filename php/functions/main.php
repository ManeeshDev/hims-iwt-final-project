
<?php
// ============================================================
//         Reusable data fetching functions add here 
// ============================================================

include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/helper.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');

function getClientByUserId($userID) {

    $conn = connect();
    $userId = $conn->real_escape_string(htmlspecialchars($userID));

    $query = "SELECT * FROM `client` WHERE `user_id`='" . $userId . "'";
    $result = readQuery($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
    return $result[0];
}

function assignAgent() {

    $conn = connect();

    $query = "SELECT * FROM `agent`";
    $result = readQuery($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    // get random agent
    $key = array_rand($result);
    $singleAgent = $result[$key];

    mysqli_close($conn);
    return $singleAgent;
}

function forceLogoutWithMsg() {
    logOut();
    addError("Please login first!", 'danger');
    header('Location: ' . BASE_URL . '/login.php');
    exit();
}
