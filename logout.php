// Création du processus de déconnection

<?php

session_start();

session_unset();
session_destroy();


// Rediriger vers la page de connexion 
header('Location: index.php');

exit();


?>