<?php

include_once(dirname(__FILE__) .  '/../functions/policy.php');
include_once(dirname(__FILE__) .  '/../functions/main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['selectNow'])) {

        if (!isset($_SESSION["id"])) {
            forceLogoutWithMsg();
        }

        $userId = $_SESSION["id"];
        $client = getClientByUserId($userId);
        $policyId = $_POST['id'];
        $policyTerm = $_POST['term'];

        if ($client && !empty($client)) {

            $alreadySelectedPolicy = getBuyPolicyByKey($client['id'], $policyId);
            if ($alreadySelectedPolicy && !empty($alreadySelectedPolicy)) {
                addError("You already have selected this policy", 'danger');
                header('Location: ' . BASE_URL . '/index.php');
                exit();
            }

            $buyPolicy = createBuyPolicy($client, $policyId, $policyTerm);
            if ($buyPolicy) {
                addError($buyPolicy['message'], $buyPolicy['status']);
                header('Location: ' . BASE_URL . '/index.php');
                exit();
            }
        } else {
            header('Location: ' . BASE_URL . '/client.php?pId=' . $policyId . '&pTerm=' . $policyTerm . '');
            exit();
        }
    }

    if (isset($_POST['findAnAgent'])) {
        header('Location: ' . BASE_URL . '/client.php?for=findAnAgent');
        exit();
    }

}

addError("403: Access denied!", 'danger');
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit(); 