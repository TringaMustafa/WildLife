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
  <title>Lajmet</title>
  <style>
    .no-news-message {
      text-align: center;
      padding: 40px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 2px 4px rgba(0,0,0,0.1);
      margin: 20px;
      color: #666;
      font-size: 18px;
    }
    .back-button {
      display: block;
      text-align: center;
      margin: 20px;
    }
    .back-button a {
      padding: 10px 20px;
      background-color: rgb(184,29,29);
      color: white;
      text-decoration: none;
      border-radius: 5px;
    }
  </style>
</head>

<body>
  <div class="back-button">
    <a href="dashboard.php">Back to Dashboard</a>
  </div>
  <div class="container-lajmi">

    <?php
    try {
      $lajmet = $NewsCRUD->shfaqiLajmet();
      if ($lajmet && !empty($lajmet)) {
        foreach ($lajmet as $lajmi) {
          echo '<div class="lajmi-each">
                    <div><img src="../../img/lajmet/index/' . $lajmi['fotolajmit'] . '" alt="" /></div>
                    <div class="lajmi-text"><h1>' . $lajmi['titulli'] . '</h1></div>
                    <div class="lajmi-text"><p>' . $lajmi['pershkrimi'] . '</p></div>
                    <div><a href="./editoLajmin.php?lajmiID=' . $lajmi['lajmiID'] . '"><button class="button">Edito</button></a></div>
                    <button class="fshij button"><a href="../adminFunksione/fshiLajmin.php?lajmiID=' . $lajmi['lajmiID'] . '">Fshij</a></button>
             
                 </div>';
        }
      } else {
        echo '<div class="no-news-message">
                <h2>No News Articles</h2>
                <p>There are currently no news articles in the system.</p>
                <p>Click <a href="shtoLajmin.php">here</a> to add a new article.</p>
              </div>';
      }
    } catch (Exception $e) {
      echo '<div class="no-news-message">Error loading news: ' . htmlspecialchars($e->getMessage()) . '</div>';
    }
    ?>
  </div>

</body>

</html>