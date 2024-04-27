<!DOCTYPE html>
<html lang="fr">

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

    <?php


    $pdo = connectDB();


    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $auteur = $_POST['auteur'];
    $imageUrl = $_POST['imageUrl'];
    $contenu = $_POST['contenu'];


    // Va lancer la procedure juste si l'id du formulaire est rempli
    if (isset($_POST['id'])) {



        // Requête SQL pour insérer les données

        try {
            $stmt = $pdo->prepare("UPDATE annonce SET titre=:titre, auteur=:auteur, imageUrl=:imageUrl, contenu=:contenu, datePublication=:date WHERE (id= :id)");

            $params = [
                ':id' => $_POST['id'],
                ':titre' => $_POST['titre'],
                ':auteur' => $_POST['auteur'],
                ':imageUrl' => $_POST['imageUrl'],
                ':contenu' => $_POST['contenu'],
                ':date' => date("Y-m-d H:i:s")
            ];
            $stmt->execute($params);

            echo "Article publiée, retour a <a href='http://localhost:8888/php-procedural/exam/index.php'>l'index</a> ? ";
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    } else {
        echo "Article non modifié, veuillez remplir les infos";
    }

    ?>


</body>


</html>