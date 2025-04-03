<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

if(isset($_POST['submit'])) {
    try {
        $db = new dbcon();
        $conn = $db->connDB();
        
        $name = htmlspecialchars($_POST['name']);
        $email = htmlspecialchars($_POST['email']);
        $message = htmlspecialchars($_POST['message']);
        
        $sql = "INSERT INTO kontaktet (emri, email, mesazhi) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->execute([$name, $email, $message]);
        
        $_SESSION['message_sent'] = true;
        echo "<script>
            window.location.href='../faqet/contact-us.php';
        </script>";
        exit();
    } catch(PDOException $e) {
        $_SESSION['message_error'] = true;
        echo "<script>
            window.location.href='../faqet/contact-us.php';
        </script>";
        exit();
    }
}
?>
