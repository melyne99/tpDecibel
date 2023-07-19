<?php
// Remplacez ces informations par celles de votre base de données
include 'connexion.php';
include 'navbar.php';

// Récupérer les chansons de la base de données
$sql = "SELECT * FROM Songs";
$result = $bdd->query($sql);

// Vérifier s'il y a des chansons
if ($result->rowCount() > 0) {
    echo '<ul>';
    while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
        echo '<li><a href="#" onclick="playAudio(\'' . $row['file_path'] . '\')">' . $row['title'] . '</a></li>';
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
</head>
<body>
    <h1>Mes chansons</h1>
    
    <audio controls id="lecteur-audio">
        Votre navigateur ne prend pas en charge l'élément audio.
    </audio>

    <script>
        // Fonction pour jouer le fichier audio
        function playAudio(chemin) {
            var lecteurAudio = document.getElementById('lecteur-audio');
            lecteurAudio.src = chemin;
            lecteurAudio.play();
        }
    </script>
</body>
</html>
