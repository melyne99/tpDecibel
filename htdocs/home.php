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
        echo '<li><a href="#" onclick="playAudio(' . count($chemins_audio) . ')">' . $row['title'] . '</a></li>';
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

    <link rel="stylesheet" href="stylecss/home.css">
</head>
<body>
    <h1>Mes chansons</h1>

    <button onclick="previousAudio()">Précédent</button>
    <button onclick="nextAudio()">Suivant</button>
    
    <audio controls id="lecteur-audio">
        Votre navigateur ne prend pas en charge l'élément audio.
    </audio>

    <script>
        // Tableau pour stocker les chemins des fichiers audio
        let cheminsAudio = <?php echo json_encode($chemins_audio); ?>;

        // Index de la chanson actuellement en cours de lecture
        let currentIndex = 0;

        // Fonction pour jouer le fichier audio
        function playAudio(index) {
            let lecteurAudio = document.getElementById('lecteur-audio');
            lecteurAudio.src = cheminsAudio[index];
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
    </script>
</body>
</html>
