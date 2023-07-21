<?php
include 'connexion.php';
include 'navbar.php';
include 'comments.php';

// Récupérer les chansons de la base de données
$sql = "SELECT * FROM Songs";
$result = $bdd->query($sql);

// Créer des tableaux pour stocker les informations des chansons
$chemins_audio = array();
$images_chansons = array();
$titres_chansons = array();
$chanson_ids = array(); // Nouveau tableau pour stocker les IDs des chansons

// Vérifier s'il y a des chansons
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $chemins_audio[] = $row['file_path'];
        $images_chansons[] = $row['image_path'];
        $titres_chansons[] = $row['title'];
        $chanson_ids[] = $row['song_id']; // Récupérer l'ID de la chanson depuis la base de données
    }
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
    <link rel="stylesheet" href="stylecss/style.css"> <!-- Assurez-vous que le chemin du fichier CSS est correct -->
</head>
<body>
    <h1>Mes chansons</h1>

    <!-- Afficher l'image seulement si une chanson est sélectionnée -->
    <?php if (!empty($images_chansons)): ?>
        <div id="song-image-container">
            <img src="<?php echo $images_chansons[0]; ?>" alt="Image de la chanson" id="song-image">
        </div>
    <?php endif; ?>

    <div id="lecteur-audio-container">
        <audio controls id="lecteur-audio">
            Votre navigateur ne prend pas en charge l'élément audio.
        </audio>
    </div>

    <div id="controls-container">
        <button onclick="previousAudio()"><i class="fas fa-step-backward"></i></button>
        <button onclick="nextAudio()"><i class="fas fa-step-forward"></i></button>
    </div>

    <!-- Bouton pour ouvrir la liste déroulante -->
    <button id="song-list-btn" onclick="toggleSongList()">Voir la liste des chansons</button>

    <!-- Conteneur pour la liste déroulante (masqué par défaut) -->
    <div id="song-list-container" style="display: none;">
        <ol>
            <?php
            for ($i = 0; $i < count($titres_chansons); $i++) {
                echo '<li>';
                echo '<button onclick="playAudio(' . $i . ')">' . $titres_chansons[$i] . '</button>';
                echo '<button onclick="likeSong(' . $chanson_ids[$i] . ')">J\'aime</button>'; // Bouton pour aimer la chanson
                echo '</li>';
            }
            ?>
        </ol>
    </div>

    <button onclick="openCommentModal()">Commenter</button>

    <div id="comments-container">
       <!-- Commentaires existants seront affichés ici -->
    </div>

    <!-- Boîte de dialogue modale pour les commentaires (fermée par défaut) -->
    <div id="commentModal" style="display: none;">
        <form id="commentForm" method="post">
            <input type="hidden" name="song_id" value="" id="commentSongId">
            <textarea id="commentText" name="comment_text" rows="4" cols="50"></textarea>
            <button type="submit" name="submit">Enregistrer</button>
        </form>
    </div>

    <script>
        // Tableaux pour stocker les informations des chansons
        let cheminsAudio = <?php echo json_encode($chemins_audio); ?>;
        let imagesChansons = <?php echo json_encode($images_chansons); ?>; // Remplacez par le nom de vos images
        let titresChansons = <?php echo json_encode($titres_chansons); ?>;
        let chansonIds = <?php echo json_encode($chanson_ids); ?>;

        // Fonction pour afficher ou masquer la liste déroulante des chansons
        function toggleSongList() {
            let songListContainer = document.getElementById('song-list-container');
            if (songListContainer.style.display === 'block') {
                songListContainer.style.display = 'none';
            } else {
                songListContainer.style.display = 'block';
            }
        }

        // Fonction pour aimer une chanson
        function likeSong(songId) {
            // Vous pouvez effectuer ici une requête AJAX pour enregistrer que l'utilisateur aime la chanson avec l'ID songId
            alert('Chanson aimée !');
        }

        // Fonction pour afficher ou masquer la boîte de dialogue pour les commentaires
        function toggleCommentModal(songId) {
            let commentModal = document.getElementById('commentModal');
            let commentSongId = document.getElementById('commentSongId');

            if (commentModal.style.display === 'block') {
                commentModal.style.display = 'none';
            } else {
                commentModal.style.display = 'block';
            }

            commentSongId.value = songId;
        }
    </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Javascript/lecteur.js"></script>
    <script src="Javascript/main.js"></script>
</body>
</html>
