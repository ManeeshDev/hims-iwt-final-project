<?php

include_once(dirname(__FILE__) .  '/../functions/policyAndClient.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if (isset($_POST['selectNow'])) {
        $validatedClient = validateUser(1);
    }

}