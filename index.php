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
//Message de bienvenue pour tous les utilisateurs connecté
if (isset($_SESSION)) {
    echo ("Vous êtes connecté en tant que" . " " . $_SESSION['username']);
    echo "<br> <a href='logout.php' class='btn btn-danger btn-sm'>Déconnexion</a>
    ";
}
// Je comprends pas pourquoi il se montre toujours alors que lui dit bien de ce montré que quand on est connecté en session


// Lien de deconnexion, et création d'article accessible que lorsque l'utilisateur jose (admin) est connecté
if ($_SESSION['username'] = 'jose') {
    echo "<a href='http://localhost:8888/php-procedural/exam/admin/addArticle.php' type='button' class='btn btn-dark m-5 '>Crée un article</a>
    ";
    echo ("Vous êtes connecté en tant que" . " " . $_SESSION['username']);
    echo "<br> <a href='logout.php' class='btn btn-danger btn-sm'>Déconnexion</a>
    ";
}
?>
<br>







<?php
include_once("block/footer.php");
?>