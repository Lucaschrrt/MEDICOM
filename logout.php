<?php
    session_start(); 
    $_SESSION = array(); // Réinitialisation du tableau de session
    session_destroy(); 
    header('Location: index.php');
    exit();
?>