<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Hide All Errors 
// error_reporting(0);
// ini_set('display_errors', 0);

// Show All Errors 
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


define('APP_NAME', 'HIMS'); 
define('BASE_URL', getBaseUrl());
define('APP_EMAIL', "help@hims.lk");
define('APP_CONTACT_NO', "");

const HOSTNAME  = "localhost";
const USERNAME  = "root";
const PASSWORD  = "";
const DATABASE  = "hims_db";


function connect()
{
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$conn || mysqli_connect_errno()) {
        die("Connection Failed:" . mysqli_connect_error());
        exit();
    }
    return $conn;
}

function readQuery(mysqli $conn, string $query)
{
    $result = mysqli_query($conn, $query) or die('Error: ' . mysqli_error($conn));
    return $result;
}

function getBaseUrl()
{
    $ip_reg = preg_match('/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\z/', $_SERVER['HTTP_HOST']);
    $server_host_name = '';
    if (($_SERVER['HTTP_HOST'] == "localhost" || $ip_reg) && $_SERVER['HTTP_HOST'] != 'hims') $server_host_name = "/hims";
    $base_url  = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]" . $server_host_name;
    return $base_url;
}
