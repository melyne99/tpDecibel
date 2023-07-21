<?php
session_start();
include 'home.php';
include 'connexion.php';

// Vérifier si la requête est de type POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer l'ID de la chanson aimée depuis la requête POST
    $songId = $_POST['song_id'];

    // Vous pouvez également récupérer l'ID de l'utilisateur actuellement connecté ici
    // Remplacez '1' par l'ID de l'utilisateur connecté (vous pouvez obtenir cette information à partir de votre système d'authentification)
    $userId = 1;

    // Vérifier que les champs ne sont pas vides
    if (!empty($songId) && !empty($userId)) {
        // Vérifier si l'utilisateur a déjà aimé cette chanson
        $sqlCheckLike = "SELECT id FROM UserLikes WHERE user_id = :userId AND song_id = :songId";
        $stmtCheckLike = $bdd->prepare($sqlCheckLike);
        $stmtCheckLike->bindParam(':userId', $userId, PDO::PARAM_INT);
        $stmtCheckLike->bindParam(':songId', $songId, PDO::PARAM_INT);
        $stmtCheckLike->execute();

        if ($stmtCheckLike->rowCount() == 0) {
            // Effectuer une requête préparée pour insérer l'action "J'aime" dans la base de données
            $sqlLike = "INSERT INTO UserLikes (user_id, song_id) VALUES (:userId, :songId)";
            $stmtLike = $bdd->prepare($sqlLike);
            $stmtLike->bindParam(':userId', $userId, PDO::PARAM_INT);
            $stmtLike->bindParam(':songId', $songId, PDO::PARAM_INT);
            $stmtLike->execute();

            // Répondre à la requête AJAX avec un message de succès (optionnel)
            echo json_encode(['message' => 'Chanson aimée avec succès!']);
        } else {
            // Répondre à la requête AJAX avec un message d'erreur (optionnel)
            echo json_encode(['error' => 'Vous avez déjà aimé cette chanson.']);
        }
    } else {
        // Répondre à la requête AJAX avec un message d'erreur (optionnel)
        echo json_encode(['error' => 'Données manquantes.']);
    }
} else {
    // Répondre à la requête AJAX avec un message d'erreur (optionnel)
    echo json_encode(['error' => 'Méthode de requête incorrecte.']);
}
?>
