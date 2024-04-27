<?php
function connectDB(): PDO
{

    try {

        // Connexion a la base de données. 

        $host = "localhost";
        $databaseName = "dauphineexam";
        $user = "root";
        $password = "root";

        $pdo = new PDO("mysql:host=" . $host . ";port=8889;dbname=" . $databaseName . ";charset=utf8", $user, $password);

        configPdo($pdo);

        return $pdo;
    } catch (Exception $e) {

        //Si erreur de connexion
        echo ("Erreur à la connexion: " .  $e->getMessage());

        exit();
    }
}

function configPdo(PDO $pdo): void
{
    // Recevoir les erreurs PDO ( coté SQL )
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // Choisir les indices dans les fetchs
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
}

// fonction pour trouver les trois derniers articles sur l'index

function findAllArticlesIndex(PDO $pdo): array
{
    $reponse = $pdo->query('SELECT * FROM annonce ORDER BY datePublication DESC LIMIT 3');
    // Plusieurs resultat fetchAll
    return $reponse->fetchAll();
}

//Pour montré tous les articles 

function findAllArticles(PDO $pdo): array
{
    $reponse = $pdo->query('SELECT * FROM annonce ORDER BY datePublication DESC');
    // Plusieurs resultat fetchAll
    return $reponse->fetchAll();
}
