<?php
session_start();
include 'connexion.php';

if (isset($_POST['pseudo'])) {
    $pseudo = $_POST['pseudo'];

    $query = $bdd->prepare("SELECT * FROM Users WHERE pseudo = :pseudo"); 
    $query->execute([':pseudo' => $pseudo]);
    $user = $query->fetch(PDO::FETCH_ASSOC);

    if (!$user) {
        $insertQuery = $bdd->prepare("INSERT INTO Users (pseudo) VALUES (:pseudo)");
        $insertQuery->execute([':pseudo' => $pseudo]);
        $userid = $bdd->lastInsertId();
    } else {
        $userid = $user['user_id'];
    }

    $_SESSION['user_id'] = $userid;
}
header('location: home.php?userid='.$userid);