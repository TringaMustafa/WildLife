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
            // Store complete user data in session
            $_SESSION = [
                'logged_in' => true,
                'user_id' => $user['id'],
                'nrleternjoftimit' => $user['nrleternjoftimit'],
                'emri' => $user['emri'],
                'mbiemri' => $user['mbiemri'],
                'adresa' => $user['adresa'] ?? '',
                'numri' => $user['numri'] ?? '',
                'roli' => $user['roli'] ?? 'user',
                'aksesi' => $user['aksesi'] ?? 0
            ];

            if($user['roli'] === 'admin') {
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