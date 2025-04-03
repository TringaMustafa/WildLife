<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

// Handle message deletion
if(isset($_POST['delete_id'])) {
    try {
        $db = new dbcon();
        $conn = $db->connDB();
        
        $id = filter_var($_POST['delete_id'], FILTER_SANITIZE_NUMBER_INT);
        $sql = "DELETE FROM kontaktet WHERE kontaktID = ?"; // Ndryshuar nga 'id' në 'kontaktID'
        $stmt = $conn->prepare($sql);
        
        if($stmt->execute([$id])) {
            $_SESSION['message_deleted'] = true;
            header("Location: messages.php");
            exit();
        }
    } catch(PDOException $e) {
        $_SESSION['error'] = "Error deleting message: " . $e->getMessage();
    }
}

// Fetch messages
try {
    $db = new dbcon();
    $conn = $db->connDB();
    $sql = "SELECT * FROM kontaktet ORDER BY data_krijimit DESC";
    $stmt = $conn->query($sql);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch(PDOException $e) {
    $_SESSION['error'] = "Error fetching messages: " . $e->getMessage();
    $messages = [];
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Messages</title>
    <style>
        .message-container {
            max-width: 1200px;
            margin: 20px auto;
            padding: 20px;
        }
        .message-card {
            background: white;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .message-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 15px;
        }
        .message-info h3 {
            margin: 0;
            color: #333;
        }
        .message-date {
            color: #666;
            font-size: 0.9em;
        }
        .delete-btn {
            background: #dc3545;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 4px;
            cursor: pointer;
        }
        .delete-btn:hover {
            background: #c82333;
        }
        .message-content {
            color: #444;
            line-height: 1.6;
        }
        .goBack {
            display: inline-block;
            margin: 20px;
            padding: 10px 20px;
            background-color: #333;
            color: white;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="message-container">
        <a href="dashboard.php" class="goBack">Back to Dashboard</a>
        <h1>Contact Messages</h1>
        
        <?php 
        if(isset($_SESSION['error'])) {
            echo "<p style='color: red;'>{$_SESSION['error']}</p>";
            unset($_SESSION['error']);
        }
        if(isset($_SESSION['message_deleted'])) {
            echo "<p style='color: green;'>Message deleted successfully!</p>";
            unset($_SESSION['message_deleted']);
        }
        
        if(!empty($messages)): 
            foreach($messages as $message): ?>
                <div class="message-card">
                    <div class="message-header">
                        <div class="message-info">
                            <h3><?= htmlspecialchars($message['emri']) ?></h3>
                            <p><?= htmlspecialchars($message['email']) ?></p>
                        </div>
                        <form method="POST" action="messages.php"> <!-- Zëvendësuar $_SERVER['PHP_SELF'] -->
                            <input type="hidden" name="delete_id" value="<?= $message['kontaktID'] ?>"> 
                            <button type="submit" class="delete-btn" onclick="return confirm('Are you sure you want to delete this message?')">
                                Delete Message
                            </button>
                        </form>
                    </div>
                    <div class="message-content">
                        <?= nl2br(htmlspecialchars($message['mesazhi'])) ?>
                    </div>
                    <div class="message-date">
                        Sent on: <?= $message['data_krijimit'] ?>
                    </div>
                </div>
            <?php endforeach;
        else: ?>
            <p>No messages found.</p>
        <?php endif; ?>
    </div>
</body>
</html>
