<?php
require_once 'config/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $emri = $conn->real_escape_string($_POST['emri']);
    $email = $conn->real_escape_string($_POST['email']);
    $subjekti = $conn->real_escape_string($_POST['subjekti']);
    $mesazhi = $conn->real_escape_string($_POST['mesazhi']);
    
    $sql = "INSERT INTO kontaktet (emri, email, subjekti, mesazhi) 
            VALUES ('$emri', '$email', '$subjekti', '$mesazhi')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Mesazhi u dërgua me sukses!";
    } else {
        echo "Gabim: " . $conn->error;
    }
}
?>
