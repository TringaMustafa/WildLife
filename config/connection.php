<?php
$host = "localhost";
$dbname = "africalwildlife";
$username = "root";
$password = "";

$conn = new mysqli($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Lidhja me databazën dështoi: " . $conn->connect_error);
}

$conn->set_charset("utf8");
?>
