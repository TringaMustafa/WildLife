<?php
session_start();
require_once('../CRUD/Modeli.php');

if(isset($_POST['login'])) {
    $modeli = new Modeli();
    $nrleternjoftimit = $_POST['nrleternjoftimit'];
    $password = $_POST['passwordi'];

    $modeli->setNrleternjoftimit($nrleternjoftimit);
    $modeli->setPasswordi($password);

    $user = $modeli->getUserByNrLeternjoftimit();

    if($user) {
        if($password === $user['passwordi']) {
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nrleternjoftimit'] = $user['nrleternjoftimit'];
            $_SESSION['emri'] = $user['emri'];
            $_SESSION['mbiemri'] = $user['mbiemri'];
            $_SESSION['adresa'] = $user['adresa'] ?? '';
            $_SESSION['numri'] = $user['numri'] ?? '';
            $_SESSION['aksesi'] = $user['aksesi'] ?? 0;

            // Redirect based on access level
            if($user['aksesi'] >= 1) {
                $_SESSION['roli'] = 'admin';
                header("Location: ../admin/dashboard.php");
            } else {
                $_SESSION['roli'] = 'user';
                header("Location: ../faqet/profile.php");
            }
            exit();
        } else {
            $_SESSION['PasswordGabim'] = true;
        }
    } else {
        $_SESSION['nrleternjoftimitGabim'] = true;
    }
    header("Location: ../faqet/login.php");
    exit();
}
?>