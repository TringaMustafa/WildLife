<?php
session_start();

if (!isset($_SESSION['roli']) || $_SESSION['roli'] !== 'admin') {
    header("Location: ../admin/dashboard.php");
    $_SESSION['skeAksesAdmin'] = true;
    exit();
}
?>
