<?php
// Remplacez ces informations par celles de votre base de données
include 'connexion.php';
include 'navbar.php';

// Récupérer les chansons de la base de données
$sql = "SELECT * FROM Songs";
$result = $bdd->query($sql);

// Créer un tableau pour stocker les chemins des fichiers audio
$chemins_audio = array();

// Vérifier s'il y a des chansons
if ($result->rowCount() > 0) {
    echo '<ul>';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $chemins_audio[] = $row['file_path'];
        echo '<li><a href="#" onclick="playAudio(' . (count($chemins_audio) - 1) . ')">' . $row['title'] . '</a></li>';
    }
    echo '</ul>';
} else {
    echo "Aucune chanson trouvée dans la base de données.";
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Lecteur audio</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss/dialog.css">
    <link rel="stylesheet" href="stylecss/home.css">
</head>
<body>
    <h1>Mes chansons</h1>

    <button onclick="previousAudio()">Précédent</button>
    <button onclick="nextAudio()">Suivant</button>
    
    <audio controls id="lecteur-audio">
        Votre navigateur ne prend pas en charge l'élément audio.
    </audio>

    <!-- Bouton pour ouvrir la boîte de dialogue -->
    <button onclick="openCommentModal()">Commenter</button>

    <!-- Boîte de dialogue modale -->
    <div id="commentModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="closeCommentModal()">&times;</span>
            <h2>Commenter la chanson</h2>
            <textarea id="commentText" rows="4" cols="50"></textarea>
            <button onclick="saveComment()">Enregistrer</button>
        </div>
    </div>

    <script>
        // ... Votre code JavaScript ici ...

        // Fonction pour ouvrir la boîte de dialogue
        function openCommentModal() {
            var modal = document.getElementById('commentModal');
            modal.style.display = 'block';
        }

        // Fonction pour fermer la boîte de dialogue
        function closeCommentModal() {
            var modal = document.getElementById('commentModal');
            modal.style.display = 'none';
        }

        // Fonction pour enregistrer le commentaire
        function saveComment() {
            var commentText = document.getElementById('commentText').value;
            // Ici, vous pouvez enregistrer le commentaire dans votre base de données ou effectuer toute autre action souhaitée avec le commentaire
            closeCommentModal(); // Ferme la boîte de dialogue après avoir enregistré le commentaire
        }
    </script>
</body>
</html>
