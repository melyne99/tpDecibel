<?php
// Remplacez ces informations par celles de votre base de données
include 'connexion.php';
include 'navbar.php';

// Récupérer les chansons de la base de données
$sql = "SELECT * FROM Songs";
$result = $bdd->query($sql);

// Créer des tableaux pour stocker les chemins des fichiers audio et des images
$chemins_audio = array();
$images_chansons = array();

// Vérifier s'il y a des chansons
if ($result->rowCount() > 0) {
    echo '<ul>';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        $chemins_audio[] = $row['file_path'];
        $images_chansons[] = $row['image_path']; // Ajouter le chemin de l'image dans le tableau
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
    <link rel="stylesheet" href="stylecss/home.css">
    <style>

</style>
    
</head>
<body>
    <h1>Mes chansons</h1>

    <div id="song-image-container">
        <img src="" alt="Image de la chanson" id="song-image">
    </div>

    <audio controls id="lecteur-audio">
        Votre navigateur ne prend pas en charge l'élément audio.
    </audio>

    <div id="controls-container">
        <button onclick="previousAudio()">Précédent</button>
        <button onclick="nextAudio()">Suivant</button>
    </div>
    
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
           // Tableau pour stocker les chemins des fichiers audio
           let cheminsAudio = <?php echo json_encode($chemins_audio); ?>;
           let imagesChansons = <?php echo json_encode($images_chansons); ?>; // Remplacez par le nom de vos images

           // Index de la chanson actuellement en cours de lecture
           let currentIndex = 0;

           // Fonction pour jouer le fichier audio
           function playAudio(index) {
               let lecteurAudio = document.getElementById('lecteur-audio');
               let songImage = document.getElementById('song-image');
               lecteurAudio.src = cheminsAudio[index];
               songImage.src = imagesChansons[index]; // Charger l'image correspondante
               lecteurAudio.play();
               currentIndex = index;
           }

           // Fonction pour jouer la chanson suivante
           function nextAudio() {
               currentIndex = (currentIndex + 1) % cheminsAudio.length;
               playAudio(currentIndex);
           }

           // Fonction pour jouer la chanson précédente
           function previousAudio() {
               currentIndex = (currentIndex - 1 + cheminsAudio.length) % cheminsAudio.length;
               playAudio(currentIndex);
           }

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
    <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</body>
</html>
