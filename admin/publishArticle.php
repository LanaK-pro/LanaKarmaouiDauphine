    <!DOCTYPE html>
    <html lang="fr">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Publication de l'article</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    </head>

    <body>

        <?php
        include_once("../utils/databaseManager.php");

        $pdo = connectDB();
        // Va lancer la procedure juste si le formulaire est rempli
        if (isset($_POST['titre']) && isset($_POST['auteur']) && isset($_POST['imageUrl']) && isset($_POST['contenu'])) {



            // Requête SQL pour insérer les données

            try {
                $stmt = $pdo->prepare("INSERT INTO annonce (titre, auteur, imageUrl, contenu, datePublication) VALUES (:titre, :auteur, :imageUrl, :contenu, :date)");

                $params = [

                    ':titre' => $_POST['titre'],
                    ':auteur' => $_POST['auteur'],
                    ':imageUrl' => $_POST['imageUrl'],
                    ':contenu' => $_POST['contenu'],
                    ':date' => date("Y-m-d H:i:s")
                ];
                $stmt->execute($params);

                echo "Article publiée";
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        } else {
            echo "Article non publié, veuillez remplir les infos";
        }

        ?>



    </body>

    </html>