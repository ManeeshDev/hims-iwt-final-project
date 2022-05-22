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

        if ($client) {
            createBuyPolicy($client);
        } else {
            header('Location: ' . BASE_URL . '/client.php');
            exit();
        }
    }

}

addError("403: Access denied!", 'danger');
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit(); 