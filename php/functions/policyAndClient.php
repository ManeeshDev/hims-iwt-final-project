<?php

include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/main.php');


function validateUser($userId) {
    echo "Your validated Fucked up....";
    print_r(getClientByUserId($userId));
}