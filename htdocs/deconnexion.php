<?php
session_start();
include 'connexion.php';

if (isset($_POST['logout'])) {
    // Effacer toutes les données de la session
    session_unset();

    // Détruire la session
    session_destroy();

    // Rediriger l'utilisateur vers la page de connexion (ou toute autre page souhaitée après la déconnexion)
    header("Location: index.php");
}
?>