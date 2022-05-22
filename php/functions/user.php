<?php
include_once(dirname(__FILE__) .  '/../../includes/config.php');
include_once(dirname(__FILE__) .  '/../functions/validator.php');

function getUser($id)
{
    if ($id) {
        $conn = connect();
        $id = $conn->real_escape_string($id);
        $query = "SELECT * FROM `users` WHERE `id`= $id ";
        $result = readQuery($conn, $query)->fetch_assoc();
        return $result;
    } else {
        return null;
    }
}

function getUserContacts($user_id)
{
    $contacts = [];
    if ($user_id) {
        $conn = connect();
        $user_id = $conn->real_escape_string($user_id);
        $query = "SELECT * FROM `user_contact` WHERE `user_id`= $user_id ";
        $result = mysqli_query($conn, $query);
        while ($row = $result->fetch_array()) {
            $contacts[] = $row;
        }
    }
    return $contacts;
}

function checkEmail($email, $user_id)
{
    $conn = connect();
    $email = $conn->real_escape_string($email);
    $user_id = $conn->real_escape_string($user_id);
    $query = "SELECT `email` FROM `users` WHERE `email`= '$email' AND `id` <> $user_id ";
    $result = readQuery($conn, $query);
    $num_rows = $result->num_rows;
    if ($num_rows > 0) {
        $result = $result->fetch_array();
        return $result;
    } else {
        return FALSE;
    }
}

function checkNic($nic, $user_id)
{
    $conn = connect();
    $nic = $conn->real_escape_string($nic);
    $user_id = $conn->real_escape_string($user_id);
    $query = "SELECT `email` FROM `users` WHERE `nic` = '$nic' AND `id` <> $user_id ";
    $result = readQuery($conn, $query);
    $num_rows = $result->num_rows;
    if ($num_rows > 0) {
        $result = $result->fetch_array();
        return $result;
    } else {
        return FALSE;
    }
}

function DeleteUserContacts($user_id, $phone_number)
{
    $conn = connect();
    $query = "DELETE FROM `user_contact` WHERE `user_id` = $user_id AND phone_number = '$phone_number'";
    return readQuery($conn, $query);
}

function DeleteAllUserContacts($user_id)
{
    $conn = connect();
    $user_id = $conn->real_escape_string($user_id);
    if ($user_id) {
        $query = "DELETE FROM `user_contact` WHERE `user_id` = $user_id";
        return readQuery($conn, $query);
    }
    return;
}
