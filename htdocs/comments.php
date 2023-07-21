<?php
include 'connexion.php';

// Vérifier si le formulaire a été soumis
if (isset($_POST['submit'])) {
    // Assurez-vous que les variables sont bien définies avant de les utiliser
    if (isset($_SESSION['user_id'], $_POST['song_id'], $_POST['comment_text'])) {
        // Récupérer l'ID de l'utilisateur et l'ID de la chanson en cours d'écoute
        $userid = $_SESSION['user_id'];
        $song_id = $_POST['song_id'];
        $comment_text = $_POST['comment_text'];

        // Préparer la requête SQL pour insérer le commentaire dans la table
        $sql = "INSERT INTO Comments (song_id, user_id, comment_text, timestamp) VALUES (?, ?, ?, NOW())";
        $stmt = $bdd->prepare($sql);
        $stmt->execute([$song_id, $user_id, $comment_text]);

        // Récupérer le commentaire nouvellement inséré pour l'afficher en temps réel
        $last_comment_sql = "SELECT * FROM Comments WHERE comment_id = LAST_INSERT_ID()";
        $last_comment_stmt = $bdd->query($last_comment_sql);
        $last_comment = $last_comment_stmt->fetch(PDO::FETCH_ASSOC);
        var_dump($last_comment);

        // Afficher le commentaire en temps réel
        echo '<div class="comment-bubble">' . $last_comment['comment_text'] . '</div>';
    }
}
?>