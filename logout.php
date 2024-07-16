<?php
    session_start(); // Démarrage de la session
    $_SESSION = array(); // Réinitialisation du tableau de session
    session_destroy(); // Destruction de la session
    header('Location: index.php'); // Redirection vers la page de connexion
    exit();
?>