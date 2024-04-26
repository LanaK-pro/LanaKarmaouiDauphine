<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>

    <?php
    // Lien a la base de données 
    require_once("../Exam/utils/databaseManager.php");
    $title = "Dauphine";

    include_once("block/header.php");
    // Verifier si le form a bien été rempli.

    if (
        $_SERVER["REQUEST_METHOD"] === "POST" &&
        isset($_POST["username"], $_POST["password"])
    ) {


        //Tableau pour les erreurs
        $errors = [];

        //Connection avec la base de données 

        $pdo = connectDB();

        // Chercher l'utilisateur 

        $response = $pdo->prepare("SELECT username, password FROM utilisateur WHERE username = :username AND password = :password");
        $response->execute([
            ":username" => $_POST["username"],
            ":password" => $_POST["password"]
        ]);

        //Je recupère le resultat ou l'erreur
        $user = $response->fetch();

        if ($user !== false) {
            //Connexion réussie
            session_start();
            $_SESSION["username"] = $_POST["username"];

            header("Location: http://localhost:8888/php-procedural/exam/");
        } else {
            $errors["global"] = "Identifiants invalides";
        }
    } else {
        $errors["global"] = "Identifiants manquants";
    }



    ?>
    <!--Formulaire de connection--->

    <div class="container">

        <h1 class="text-center m-3"><?php echo ($title) ?></h1>

        <form method="POST" action="login.php">

            <label for="username">Username</label>
            <input type="text" name="username" id="username">
            <label for="password">Password</label>
            <input type="text" name="password" id="password">

            <?php
            if (isset($errors["global"])) {
                echo ("<p class='text-danger'>" .
                    $errors["global"] . "</p>");
            }
            ?>

            <input type="submit" value="Valider" class="btn btn-primary">
        </form>

    </div>













    <?php
    include_once("block/footer.php");
    ?>

</body>

</html>