<?php
if (!isset($_SESSION)) {
    session_start();
}

// Check if user is logged in and ID number is set
if (!isset($_SESSION['logged_in']) || !isset($_SESSION['nrleternjoftimit'])) {
    header("Location: login.php");
    exit();
}

require_once('../CRUD/Modeli.php');
$model = new Modeli();

// Initialize default values if session variables are not set
$_SESSION['emri'] = $_SESSION['emri'] ?? '';
$_SESSION['mbiemri'] = $_SESSION['mbiemri'] ?? '';
$_SESSION['adresa'] = $_SESSION['adresa'] ?? '';
$_SESSION['numri'] = $_SESSION['numri'] ?? '';

// Get fresh user data from database
if (isset($_SESSION['nrleternjoftimit'])) {
    $model->setNrleternjoftimit($_SESSION['nrleternjoftimit']);
    $userData = $model->getUserByNrLeternjoftimit();
    
    if ($userData) {
        // Update session with fresh data
        $_SESSION['emri'] = $userData['emri'] ?? '';
        $_SESSION['mbiemri'] = $userData['mbiemri'] ?? '';
        $_SESSION['adresa'] = $userData['adresa'] ?? '';
        $_SESSION['numri'] = $userData['numri'] ?? '';
    }
}

// Handle profile update
if (isset($_POST['update_profile'])) {
    $emri = trim($_POST['emri']);
    $mbiemri = trim($_POST['mbiemri']);
    $adresa = trim($_POST['adresa']);
    $numri = trim($_POST['numri']);
    
    if (empty($emri) || empty($mbiemri)) {
        $error_message = "Name and Last Name are required!";
    } else {
        if ($model->updateUserProfile($_SESSION['nrleternjoftimit'], $emri, $mbiemri, $adresa, $numri)) {
            $_SESSION['emri'] = $emri;
            $_SESSION['mbiemri'] = $mbiemri;
            $_SESSION['adresa'] = $adresa;
            $_SESSION['numri'] = $numri;
            $success_message = "Profile updated successfully!";
        } else {
            $error_message = "Error updating profile!";
        }
    }
}

// Handle account deletion
if (isset($_POST['delete_account'])) {
    if ($model->fshijPerdoruesin($_SESSION['user_id'])) {
        session_destroy();
        header("Location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>My Profile - African Wildlife</title>
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" href="../../css/profile.css">
    <script src="https://kit.fontawesome.com/7be85ed243.js"></script>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    
    <div class="container profile-container">
        <div class="profile-card">
            <div class="profile-header">
                <i class="fa-solid fa-user-circle profile-icon"></i>
                <h2>My Profile</h2>
            </div>
            
            <?php if (isset($success_message)): ?>
                <div class="success-message"><?php echo $success_message; ?></div>
            <?php endif; ?>
            
            <?php if (isset($error_message)): ?>
                <div class="error-message"><?php echo $error_message; ?></div>
            <?php endif; ?>
            
            <form method="POST" class="profile-form">
                <div class="form-group">
                    <label>ID Number:</label>
                    <input type="text" value="<?php echo $_SESSION['nrleternjoftimit'] ?? ''; ?>" readonly>
                </div>
                
                <div class="form-group">
                    <label>First Name:</label>
                    <input type="text" name="emri" value="<?php echo $_SESSION['emri'] ?? ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Last Name:</label>
                    <input type="text" name="mbiemri" value="<?php echo $_SESSION['mbiemri'] ?? ''; ?>" required>
                </div>
                
                <div class="form-group">
                    <label>Address:</label>
                    <input type="text" name="adresa" value="<?php echo $_SESSION['adresa'] ?? ''; ?>">
                </div>
                
                <div class="form-group">
                    <label>Phone Number:</label>
                    <input type="text" name="numri" value="<?php echo $_SESSION['numri'] ?? ''; ?>">
                </div>
                
                <div class="button-group">
                    <button type="submit" name="update_profile" class="update-btn">Update Profile</button>
                    <button type="submit" name="delete_account" class="delete-btn" 
                            onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.')">
                        Delete Account
                    </button>
                </div>
            </form>
        </div>
    </div>
    
    <?php include '../includes/footer.php'; ?>
</body>
</html>
