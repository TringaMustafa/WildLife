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
        if($password === $user['passwordi']) { // Changed to direct comparison if passwords aren't hashed
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['emri'];
            $_SESSION['roli'] = $user['roli']; // Get role from database instead of checkbox

            if($_SESSION['roli'] === 'admin') {
                header("Location: ../admin/dashboard.php");
            } else {
                header("Location: ../faqet/index.php");
            }
            exit();
        } else {
            $_SESSION['PasswordGabim'] = true;
            header("Location: ../faqet/login.php");
            exit();
        }
    } else {
        $_SESSION['nrleternjoftimitGabim'] = true;
        header("Location: ../faqet/login.php");
        exit();
    }
}
?>