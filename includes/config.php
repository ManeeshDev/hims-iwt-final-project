<?php

define('APP_NAME', 'HIMS');

const HOSTNAME  = "localhost";
const USERNAME  = "root";
const PASSWORD  = "";
const DATABASE  = "hims_db";

$conn = mysqli_connect(HOSTNAME, USERNAME, PASSWORD, DATABASE);

if (!$conn) {
    die("Connection Failed:" . mysqli_connect_error());
}
