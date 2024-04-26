<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Publication de l'article</title>
</head>

<body>

    <?php
    include_once("../utils/databaseManager.php");
    include_once("../admin/addArticle.php");
    try {
        $pdo = connectDB();
        $stmt = $pdo->prepare("INSERT INTO annonces (title, image, content, author)
                            VALUES (:title, :image, :content, :author)");

        foreach ($annonces as $annonce) {
            $params = [
                ':titre' => $annonce['title'],
                ':imageUrl' => $annonce['imageUrl'],
                ':contenu' => $annonce['contenu'],
                ':auteur' => $annonce['auteur'],
            ];

            $stmt->execute($params);
        }

        echo "Données insérées avec succès dans la base de données.";
    } catch (PDOException $e) {
        echo "Erreur : " . $e->getMessage();
    }



    ?>



</body>

</html>