<?php
if (!isset($_SESSION)) {
  session_start();
}

require_once('../CRUD/NewsCRUD.php');
$NewsCRUD = new NewsCRUD();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../css/allnews.css">
  <link rel="stylesheet" href="../../css/style.css">
  <title>Wildlife News</title>
</head>
<body>
  <?php include '../includes/navbar.php'; ?>

  <div class="container">
    <h1 class="p-header1">Wildlife News</h1>
    
    <div class="container-lajmi">
      <?php
      $lajmet = $NewsCRUD->shfaqiLajmet();
      if ($lajmet) {
        foreach ($lajmet as $lajmi) {
          echo '<div class="lajmi-each">
                  <div class="lajmi-image">
                    <img src="../../img/lajmet/index/' . htmlspecialchars($lajmi['fotolajmit']) . '" alt="News image" />
                  </div>
                  <div class="lajmi-text">
                    <h2>' . htmlspecialchars($lajmi['titulli']) . '</h2>
                    <p>' . htmlspecialchars($lajmi['pershkrimi']) . '</p>
                    <a href="./lajmi.php?lajmiID=' . htmlspecialchars($lajmi['lajmiID']) . '">
                      <button class="button">Read More</button>
                    </a>
                  </div>
                </div>';
        }
      } else {
        echo '<p class="no-news">No news articles available at the moment.</p>';
      }
      ?>
    </div>
  </div>

  <?php include '../includes/footer.php'; ?>
</body>
</html>