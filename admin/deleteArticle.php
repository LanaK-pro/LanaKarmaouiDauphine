<!DOCTYPE html>
<html lang="fr">

<head>
    <?php $title = "Modification d'article";
    include_once("../block/header.php");
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $title; ?></title>
</head>

<body>

    <?php
    // site non accessible en methode GET pour des raisons de sécurité
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        header("Location: http://localhost:8888/php-procedural/exam/");
    }
    include_once("../utils/databaseManager.php");

    $pdo = connectDB();

    // Va lancer la procedure juste si le formulaire est rempli
    if (isset($_POST['id'])) {



        // Requête SQL pour insérer les données

        try {
            $stmt = $pdo->prepare("DELETE FROM annonce WHERE (id= :id)");

            $params = [
                ':id' => $_POST['id']
            ];
            $stmt->execute($params);

            echo "Article supprimé, retour a <a href='http://localhost:8888/php-procedural/exam/index.php'>l'index</a> ? ";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo "Article non supprimé";
    }

    ?>

    <form action="deleteArticle.php" method="post">
        <label for="number">ID de l'article a supprimé</label>
        <input type="number" id="number" name="id" min="0" required>
        <br>
        <button class='btn btn-danger my-2 ' type="submit">Supprimé</button>
    </form>



</body>

</html>