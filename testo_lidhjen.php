<?php
if (extension_loaded('mysqli')) {
    echo "Extencioni mysqli është aktiv!<br>";
} else {
    echo "GABIM: Extencioni mysqli nuk është aktiv.<br>";
}

if (extension_loaded('pdo_mysql')) {
    echo "Extencioni PDO MySQL është aktiv!<br>";
} else {
    echo "GABIM: Extencioni PDO MySQL nuk është aktiv.<br>";
}

// Testo lidhjen me databazë
try {
    $conn = new PDO("mysql:host=localhost;dbname=africalwildlife", "root", "");
    echo "Lidhja me databazën u krye me sukses!";
} catch(PDOException $e) {
    echo "Gabim në lidhjen me databazë: " . $e->getMessage();
}
?>
