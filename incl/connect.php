<?php


//include creds
require_once 'base.php';

//establish connection
$conn = new mysqli(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

//is connection sucessful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
