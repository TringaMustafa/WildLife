<?php
if (!isset($_SESSION)) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="../../css/contactus.css">
    <link rel="stylesheet" href="../../css/style.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <title>Contact Us</title>
</head>
<body>
    <?php include '../includes/navbar.php'; ?>
    
    <?php
    if (isset($_SESSION['message_sent'])) {
        echo "<script>alert('Message sent successfully!');</script>";
        unset($_SESSION['message_sent']);
    }
    if (isset($_SESSION['message_error'])) {
        echo "<script>alert('Error sending message. Please try again.');</script>";
        unset($_SESSION['message_error']);
    }
    ?>
    
    <section class="contact">
        <div class="container">
            <h2>Contact Us</h2>
            <div class="contact-wrapper">
                <div class="contact-form">
                    <h3>Send us a message</h3>
                    <form action="../funksione/process_contact.php" method="POST">
                        <div class="form-group">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" placeholder="Your Email" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" placeholder="Your message" required></textarea>
                        </div>
                        <button type="submit" name="submit">Send Message</button>
                    </form>
                </div>
                <div class="contact-info">
                    <h3>Contact Information</h3>
                    <p><i class="fas fa-phone"></i>+383 44 111 222</p>
                    <p><i class="fas fa-envelope"></i>info@gmail.com</p>
                    <p><i class="fas fa-map-marker-alt"></i>123 street, Prishtin, Kosova</p>
                </div>
            </div>
        </div>
    </section>
    
    <?php include '../includes/footer.php'; ?>
</body>
</html>