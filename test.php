<?php
require_once 'config/connection.php';
if(!$conn->connect_error) {
    echo "Lidhja me databazën u realizua me sukses!";
}
?>
