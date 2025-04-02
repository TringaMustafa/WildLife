<?php
// Formulari për kontakt
?>
<form action="processo_kontakt.php" method="POST">
    <input type="text" name="emri" required placeholder="Emri juaj">
    <input type="email" name="email" required placeholder="Email-i juaj">
    <input type="text" name="subjekti" placeholder="Subjekti">
    <textarea name="mesazhi" required placeholder="Mesazhi juaj"></textarea>
    <button type="submit">Dërgo</button>
</form>