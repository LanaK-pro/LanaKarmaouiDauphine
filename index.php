<?php
$title = "Dauphine";

include_once("block/header.php");

// Procédure de hashage du password pour l'utilisateur jose, je vais montré le password hashé, crée l'utilisateur avec.
$passHash = password_hash("jose", PASSWORD_DEFAULT);
echo ($passHash);
var_dump(password_verify("jose", $passHash));
?>

<div class="container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

</div>

<h1>Bienvenue</h1>






<?php
include_once("block/footer.php");
?>