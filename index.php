<?php
$title = "Dauphine";

include_once("block/header.php");

include_once("../Exam/utils/databaseManager.php");


// Procédure de hashage du password pour l'utilisateur jose, je vais montré le password hashé, crée l'utilisateur avec.
$passHash = password_hash("bove123", PASSWORD_DEFAULT);
//echo ($passHash);
//var_dump(password_verify("bove123", $passHash));
?>

<div class="container">

    <h1 class="text-center"><?php echo ($title ?? "Default Title") ?></h1>

</div>

<h2>Bienvenue</h2>

<?php

$title = "derniers articles";
$pdo = connectDB();
$annonces = findAllArticles($pdo);


//Message de bienvenue pour tous les utilisateurs non connecté
if (!isset($_SESSION['username'])) {
    echo ("<a href='login.php'>Connectez-vous</a>");
}
// Je comprends pas pourquoi il se montre toujours alors que lui dit bien de ce montré que quand on est connecté en session


// Lien de deconnexion, et création d'article accessible que lorsque l'utilisateur jose (admin) est connecté
// Accées aux page de suppression et publication d'article uniquement accessible avec la session Jose, et en methode POST
if ($_SESSION['username'] = 'jose') {
    echo ("<h2>Vous êtes connecté en tant que" . " " . $_SESSION['username'] . "</h2>");
    echo "<form action='http://localhost:8888/php-procedural/exam/admin/addArticle.php' method='post'>
    <input type='hidden' name='data' value='your_data'>
     <button  class='btn btn-primary my-3 ' type='submit'>Crée un article</button>
    </form>";
    echo "<form action='http://localhost:8888/php-procedural/exam/admin/modifyArticleForm.php' method='post'>
        <input type='hidden' name='data' value='your_data'>
         <button  class='btn btn-secondary my-3 ' type='submit'>Modifié un article</button>
        </form>";
    echo "<form action='http://localhost:8888/php-procedural/exam/admin/deleteArticle.php' method='post'>
        <input type='hidden' name='data' value='your_data'>
         <button  class='btn btn-danger my-3 ' type='submit'>Supprimé un article</button>
        </form>";
    echo "<form action='http://localhost:8888/php-procedural/exam/logout.php' method='post'>
        <input type='hidden' name='data' value='your_data'>
         <button  class='btn btn-secondary my-3 ' type='submit'>Déconnexion</button>
        </form>";
}
?>

<div class="container">

    <h1 class="text-center m-4 "><?php echo ($title ?? "Default Title") ?></h1>

    <div class="d-flex justify-content-evenly align-items-center flex-wrap gap-3">

        <?php
        foreach ($annonces as $annonce) {
        ?>
            <div class="card col-3" style="width: 18rem;">
                <img src="<?php echo ($annonce["imageUrl"]) ?>" class="card-img-top" alt="image titre">
                <div class="card-body">
                    <h5 class="card-title"><?php echo ($annonce["titre"]) ?></h5>
                    <p class="card-text"><?php echo ($annonce["contenu"]) ?></p>
                    <p><?php echo ($annonce["auteur"]) ?></p>
                    <p class='text-end'><?php echo ($annonce["datePublication"]) ?></p>
                    <p class='text-end'><?php echo ($annonce["id"]) ?></p>
                </div>
            </div>
        <?php
        }
        ?>
    </div>

</div>





<br>







<?php
include_once("block/footer.php");
?>