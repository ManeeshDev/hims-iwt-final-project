<?php

define('APP_NAME', 'HIMS');

const HOSTNAME  = "localhost";
const USERNAME  = "root";
const PASSWORD  = "";
const DATABASE  = "hims_db";


function connect() {
    $conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

    if (!$conn || mysqli_connect_errno()) {
        die("Connection Failed:" . mysqli_connect_error());
        exit();
    }
    return $conn; 
}

function readQuery($conn, $query) { 
    $result = mysqli_query($conn, $query);
    if (!mysqli_query($conn, $query)) {
        die('Error ' . mysqli_error($conn));
    }
    return $result;
}

connect();