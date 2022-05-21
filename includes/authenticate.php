<?php

include_once(dirname(__FILE__) .  '/../php/functions/validator.php');
include_once(dirname(__FILE__) .  '/../php/functions/helper.php');

if (!isset($_SESSION)) {
    session_start();
}

$user_id = NULL;
$user_type = NULL;

if (isset($_SESSION["id"])) {
    $user_id = $_SESSION["id"];
}
if (isset($_SESSION["user_type"])) {
    $user_type = $_SESSION["user_type"];
}

if (empty($user_id) || empty($user_type)) {
    logOut();
    addError("Please login first!", 'danger');
    header('Location: ' . BASE_URL . '/login.php');
    exit();
}
if (isset($authorized_roles)) {
    if (!in_array($user_type, $authorized_roles)) {
        addError("403: Unauthorized", 'danger');
        header('Location: ' . BASE_URL . '/');
        exit();
    }
}
