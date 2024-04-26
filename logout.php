// Création du processus de déconnection

<?php

session_start();
session_destroy();

// Redirige a la page de connection

header('Location: login.php');


?>