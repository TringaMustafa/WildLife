<?php
if (!isset($_SESSION)) {
    session_start();
}

if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    header("Location: ../faqet/login.php");
    $_SESSION['skeAksesAdmin'] = true;
    exit();
}
?>
