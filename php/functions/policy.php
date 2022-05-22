<?php

include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/helper.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');


function createBuyPolicy($client, $policyID, $policyTerm)
{
    $conn = connect();

    if (!isset($_SESSION["id"])) {
        forceLogoutWithMsg();
    }

    $clientId = $client["id"];
    $policyId = $policyID;
    $term = $policyTerm;

    $startDate = date("Y-m-d");
    $endDate = date('Y-m-d', strtotime('+' . $term));

    $createQuery = "INSERT INTO `buy_policy` (`client_id`, `policy_id`, `start_date`, `end_date`) VALUES ('$clientId', '$policyId', '$startDate', '$endDate')";
    $result = readQuery($conn, $createQuery);

    if ($result) {
        $last_id = $conn->insert_id;
        $buyPolicy = ['result' => $result, 'message' => 'Your Insurance Plan successfully created', 'status' => 'success'];
        return $buyPolicy;
    } else {
        addError(mysqli_error($conn), 'danger');
    }
}

function getAllPolicies()
{

    $conn = connect();

    $query = "SELECT * FROM `policy`";
    $result = readQuery($conn, $query);

    $policies = [];
    if (mysqli_num_rows($result) == 0) {
        return $policies;
    }
    $policies = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
    return $policies;
}

function getPolicyById($pId = 1)
{

    $conn = connect();

    $policyId = $conn->real_escape_string(htmlspecialchars($pId));

    $query = "SELECT * FROM `policy` WHERE `id`='" . $policyId . "'";
    $result = readQuery($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
    return $result[0];
}

function getBuyPolicyByKey($clientId, $policyId)
{

    $conn = connect();

    $clientId = $conn->real_escape_string(htmlspecialchars($clientId));
    $policyId = $conn->real_escape_string(htmlspecialchars($policyId));

    $query = "SELECT * FROM `buy_policy` WHERE `client_id` = '$clientId' AND `policy_id` ='" . $policyId . "'";

    $result = readQuery($conn, $query);

    if (mysqli_num_rows($result) == 0) {
        return false;
    }
    $result = mysqli_fetch_all($result, MYSQLI_ASSOC);

    mysqli_close($conn);
    return $result[0];
}