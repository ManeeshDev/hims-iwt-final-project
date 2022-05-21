<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');
include_once(dirname(__FILE__) .  '/../functions/helper.php');

if (isset($_POST['action']) && $_POST['action'] === "logout") {
    logOut();
    header('Location: ' . BASE_URL);
    exit();
}
addError("403: Access denied!", 'danger');
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit();
