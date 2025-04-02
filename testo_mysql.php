<?php
// Trego të gjitha gabimet
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Shfaq informacionin për PHP
echo "PHP Version: " . phpversion() . "<br>";
echo "Extension Directory: " . ini_get('extension_dir') . "<br>";
echo "Loaded PHP.ini: " . php_ini_loaded_file() . "<br><br>";

// Testo lidhjen me mysqli
$mysqli = new mysqli("localhost", "root", "", "africalwildlife");

if ($mysqli->connect_error) {
    die("Lidhja dështoi: " . $mysqli->connect_error);
} else {
    echo "Lidhja me mysqli u realizua me sukses!";
}
?>
