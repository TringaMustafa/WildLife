<?php
require_once('../adminFunksione/kontrolloAksesin.php');
require_once('../CRUD/kategoriaCRUD.php');

$kategoria = new kategoriaCRUD();

if (isset($_POST['shtoKategorin'])) {
    $_SESSION['emriKategorise'] = $_POST['emriKategoris'];
    $_SESSION['pershkrimiKategorise'] = $_POST['pershkrimiKategoris'];
    $kategoria->insertoKategorinLajmit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menaxho Kategorite</title>
    <style>
        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .form-input {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
            border: 1px solid #ddd;
        }
        .button {
            background: rgb(184,29,29);
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        .kategori-list {
            margin-top: 30px;
        }
        .kategori-item {
            background: white;
            padding: 15px;
            margin: 10px 0;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .back-button {
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
    <div class="container">
        <a href="dashboard.php" class="back-button">Back to Dashboard</a>
        <h1>Menaxho Kategorite</h1>
        
        <form method="POST" action="">
            <div class="form-group">
                <label>Emri i Kategorise:</label>
                <input type="text" name="emriKategoris" class="form-input" required>
            </div>
            <div class="form-group">
                <label>Pershkrimi i Kategorise:</label>
                <textarea name="pershkrimiKategoris" class="form-input" rows="4" required 
                    placeholder="Pershkruani per çka perdoret kjo kategori dhe cilat lloje te lajmeve i perkasin..."></textarea>
            </div>
            <button type="submit" name="shtoKategorin" class="button">Shto Kategorine</button>
        </form>

        <div class="kategori-list">
            <h2>Kategorite Ekzistuese</h2>
            <?php
            $kategorite = $kategoria->shfaqKategorin();
            if ($kategorite) {
                foreach ($kategorite as $kat) {
                    echo '<div class="kategori-item">
                            <h3>' . htmlspecialchars($kat['emriKategoris']) . '</h3>
                            <p>' . htmlspecialchars($kat['pershkrimiKategoris']) . '</p>
                          </div>';
                }
            } else {
                echo '<p>Nuk ka kategori te regjistruara.</p>';
            }
            ?>
        </div>
    </div>
</body>
</html>
