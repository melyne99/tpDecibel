<?php
include 'connexion.php';
include 'navbar.php';
include 'comments.php';

// Récupérer les chansons de la base de données
$sql = "SELECT * FROM Songs";
$result = $bdd->query($sql);

// Créer des tableaux pour stocker les chemins des fichiers audio et des images
$chemins_audio = array();
$images_chansons = array();
$titres_chansons = array(); // Ajouter un tableau pour stocker les titres des chansons

// Vérifier s'il y a des chansons
if ($result->rowCount() > 0) {
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $chemins_audio[] = $row['file_path'];
        $images_chansons[] = $row['image_path'];
        $titres_chansons[] = $row['title']; // Ajouter le titre de la chanson dans le tableau
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
                echo '<li><button onclick="playAudio(' . $i . ')">' . $titres_chansons[$i] . '</button></li>';
            }
            ?>
        </ol>
    </div>

    <button onclick="openCommentModal()">Commenter</button>

<div id="comments-container">
       <!-- Commentaires existants seront affichés ici -->
</div>

    <!-- Boîte de dialogue modale (fermée par défaut) -->
    <form id="commentForm" method="post">
    <input type="hidden" name="song_id" value="ID_DE_LA_CHANSON_EN_COURS">
    <textarea id="commentText" name="comment_text" rows="4" cols="50"></textarea>
    <button type="submit" name="submit">Enregistrer</button>
</form>
    </div>

    <script>
       // Tableau pour stocker les chemins des fichiers audio
let cheminsAudio = <?php echo json_encode($chemins_audio); ?>;
let imagesChansons = <?php echo json_encode($images_chansons); ?>; // Remplacez par le nom de vos images

        // Fonction pour afficher ou masquer la liste déroulante des chansons
        function toggleSongList() {
            let songListContainer = document.getElementById('song-list-container');
            if (songListContainer.style.display === 'block') {
                songListContainer.style.display = 'none';
            } else {
                songListContainer.style.display = 'block';
            }
        }

        // Fonction pour afficher ou masquer la boîte de dialogue
        function toggleCommentModal() {
            let commentModal = document.getElementById('commentModal');
            if (commentModal.style.display === 'block') {
                commentModal.style.display = 'none';
            } else {
                commentModal.style.display = 'block';
            }
        }
    </script>
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Javascript/lecteur.js"></script>
    <script src="Javascript/main.js"></script>
</body>
</html>
