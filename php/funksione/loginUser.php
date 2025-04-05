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
            // Store user data in session
            $_SESSION['logged_in'] = true;
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['nrleternjoftimit'] = $user['nrleternjoftimit'];
            $_SESSION['emri'] = $user['emri'];
            $_SESSION['mbiemri'] = $user['mbiemri'];
            $_SESSION['adresa'] = $user['adresa'] ?? '';
            $_SESSION['numri'] = $user['numri'] ?? '';
            $_SESSION['roli'] = $user['roli'] ?? 'user';
            $_SESSION['aksesi'] = $user['aksesi'] ?? 0;

            // Redirect based on user role
            if($user['aksesi'] >= 1) {  // Admin users have aksesi >= 1
                header("Location: ../admin/dashboard.php");
            } else {
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