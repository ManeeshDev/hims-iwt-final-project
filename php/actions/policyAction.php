<?php

include_once(dirname(__FILE__) .  '/../functions/policyAndClient.php');
include_once(dirname(__FILE__) .  '/../functions/main.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['selectNow'])) {
        $userId = 2;
        $client = getClientByUserId($userId);
        if ($client) {
            echo "add new policy to buy-policy table";
        // add new policy to buy-policy table
        } else {
            header("Location: /../../client.php");
            exit();
        }
    }

}