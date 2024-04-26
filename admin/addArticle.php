<!DOCTYPE html>
<html lang="fr">

<head>
    <?php $title = "Création d'article";
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>
    <?php
    include_once("../block/header.php");

    echo ("<h1 class='text-center'>" . $title . "</h1>");

    ?>

    <form action="publishArticle.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="input1" class="form-label">Titre</label>
            <input type="text" class="form-control" id="input1" name="titre" required>
        </div>
        <div class="mb-3">
            <label for="input2" class="form-label">Image</label>
            <input type="text" class="form-control" id="input2" name="imageUrl" required>
        </div>
        <div class="mb-3">
            <label for="input3" class="form-label">Contenu</label>
            <input type="text" class="form-control" id="input3" name="contenu" required>
        </div>
        <div class="mb-3">
            <label for="input4" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="input4" name="auteur" required>
        </div>
        <button type="submit" class="btn btn-primary">Publication</button>
    </form>
    </div>


</body>

</html>