<?php

function logOut()
{
    if (!isset($_SESSION)) {
        session_start();
    }

    unset($_SESSION["id"]);
    unset($_SESSION["name"]);
    unset($_SESSION["email"]);
    unset($_SESSION["user_type"]);
    unset($_SESSION["login"]);
    unset($_SESSION["ERRORS"]);
    return;
}

function dd($data)
{
    echo '<pre>';
    var_dump($data);
    echo '</pre>';
    exit();
}
