<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="icon" href="../img/icon.png" type="image/icon">
    <link rel="stylesheet" href="../../css/login.css">
    <link rel="stylesheet" href="../../css/style.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>
<body class="login-body">
    <section class="login">
        <div class="login-box">
            <div class="login-box-inside">
                <h2>Log In</h2>
                <form name="LoginForm" onsubmit="return validimiLogIn();" action='../funksione/loginUser.php' method="POST">
                <?php
                if (isset($_SESSION['PasswordGabim'])) {
                    echo '<div class="error-message">Passwordi është gabim!</div>';
                }
                if (isset($_SESSION['nrleternjoftimitGabim'])) {
                    echo '<div class="error-message">Ky përdorues nuk ekziston!</div>';
                }
                ?>
                <input type="text" name="nrleternjoftimit" class="field" placeholder="Your Id" required>
                <input type="password" name="passwordi" class="field" placeholder="Your Password" required>
                <div class="role-selector">
                    <input type="checkbox" name="isAdmin" id="isAdmin">
                    <label for="isAdmin">Login as Admin</label>
                </div>
                <div class="reg">
                    <p>Don't have an account? <a href="signup.php">Sign Up</a></p>
                    <input class="button" onclick="validimiLogIn();" type="submit" name="login">
                </div>
                
                </form>
            </div>
        </div>
    </section>
</body>
</html>

<?php
if(isset($_POST['login'])) {
    $username = $_POST['nrleternjoftimit'];
    $password = $_POST['passwordi'];
    
    // Example validation logic
    $userExists = true; // Replace with actual validation logic
    
    if($userExists) {
        $_SESSION['username'] = $username;
        $_SESSION['roli'] = isset($_POST['isAdmin']) ? 'admin' : 'user';
        
        if($_SESSION['roli'] === 'admin') {
            header("Location: ../admin/dashboard.php");
        } else {
            header("Location: index.php");
        }
        exit();
    }
}

unset($_SESSION['nrleternjoftimitGabim']);
unset($_SESSION['PasswordGabim']);
?>