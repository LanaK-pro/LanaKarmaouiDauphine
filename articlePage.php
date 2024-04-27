<!DOCTYPE html>
<html lang="fr">

<head>
    <?php $title = "Tous les articles";
    include_once("block/header.php");
    include_once("../Exam/utils/databaseManager.php");
    $pdo = connectDB();
    $annonces = findAllArticles($pdo);
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>


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











</body>