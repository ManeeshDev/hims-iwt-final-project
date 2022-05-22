<?php

include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/helper.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');


function createBuyPolicy($client)
{
    $conn = connect();

    if (!isset($_SESSION["id"])) {
        forceLogoutWithMsg();
    }

    $clientId = $client["id"];
    $policyId = $_POST['id'];

    $startDate = date("Y-m-d");
    $endDate = date('Y-m-d', strtotime('+' . $_POST['term']));

    $createQuery = "INSERT INTO `buy_policy` (`client_id`, `policy_id`, `start_date`, `end_date`) VALUES ('$clientId', '$policyId', '$startDate', '$endDate')";
    $result = readQuery($conn, $createQuery);

    if ($result) {
        $last_id = $conn->insert_id;
        addError("Your Insurance Plan successfully created.", 'success');
        header('Location: ' . BASE_URL . '/index.php');
        exit();
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

    // dd($result[0]);

    mysqli_close($conn);
    return $result[0];
}
