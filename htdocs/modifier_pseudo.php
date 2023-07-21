<?php
session_start();
include 'connexion.php';


// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['user_id'])) {
    $userid = $_SESSION['user_id'];

    // Vérifier si le formulaire a été soumis
    if (isset($_POST['nouveau_pseudo'])) {
        $nouveauPseudo = $_POST['nouveau_pseudo'];

        // Mettre à jour le pseudo dans la base de données
        $updateQuery = $bdd->prepare("UPDATE Users SET pseudo = :nouveau_pseudo WHERE user_id = :userid");
        $updateQuery->execute([':nouveau_pseudo' => $nouveauPseudo, ':userid' => $userid]);

        // Mettre à jour le pseudo dans la session
        $_SESSION['pseudo'] = $nouveauPseudo;

        // Rediriger vers la page profil.php après la modification
        header('location: profil.php');
        exit;
    } else {
        // Si le formulaire n'a pas été soumis, rediriger vers la page profil.php
        header('location: profil.php');
        exit;
    }
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header('location: connexion.php');
    exit;
}
?>
