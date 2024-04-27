<!DOCTYPE html>
<html lang="fr">
<html>

<head>
    <?php
    // site non accessible en methode GET pour des raisons de sécurité
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: http://localhost:8888/php-procedural/exam/");
    }

    $title = "Modification d'article";
    include_once("../block/header.php");

    include_once("../utils/databaseManager.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>

    <form action="modifyArticle.php" method="post" enctype="multipart/form-data">
        <div class="mb-3">
            <label for="input0" class="form-label">Id de l'article a modifié</label>
            <input type="number" min=0 class="form-control" id="input0" name="id" required>
        </div>
        <div class="mb-3">
            <label for="input1" class="form-label">Titre</label>
            <input type="text" class="form-control" id="input1" name="titre" required>
        </div>
        <div class="mb-3">
            <label for="input2" class="form-label">Image</label>
            <input type="file" class="form-control" id="input2" name="imageUrl">
        </div>
        <div class="mb-3">
            <label for="input2" class="form-label">Url pour une image</label>
            <input type="text" class="form-control" id="input3" name="imageUrl">
        </div>
        <div class="mb-3">
            <label for="input3" class="form-label">Contenu</label>
            <input type="text" class="form-control" id="input4" name="contenu" required>
        </div>
        <div class="mb-3">
            <label for="input4" class="form-label">Auteur</label>
            <input type="text" class="form-control" id="input" name="auteur" required>
        </div>
        <button type="submit" class="btn btn-primary">Modification</button>
    </form>



</body>

</html>