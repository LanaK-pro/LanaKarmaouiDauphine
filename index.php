<?php
$title = "Dauphine";

include_once("block/header.php");

// Procédure de hashage du password pour l'utilisateur jose, je vais montré le password hashé, crée l'utilisateur avec.
$passHash = password_hash("bove123", PASSWORD_DEFAULT);
//echo ($passHash);
//var_dump(password_verify("bove123", $passHash));
?>

<div class="container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

</div>

<h1>Bienvenue</h1>

<?php

if (session_start()) {
    echo ("Vous êtes connecté en tant que" . " " . $_SESSION['username']);
}

?>
<br>
<a href="http://localhost:8888/php-procedural/exam/admin/addArticle.php" type="button" class="btn btn-dark m-5 ">Crée un article</a>





<?php
include_once("block/footer.php");
?>