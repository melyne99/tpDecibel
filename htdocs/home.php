<?php
include 'connexion.php';
include 'get_songs.php';
include 'navbar.php';

// Chemin d'accès au fichier JSON
$jsonFilePath = 'Javascript/song.json';

// Lire le contenu du fichier JSON
$jsonContent = file_get_contents($jsonFilePath);

// Convertir le contenu JSON en un tableau PHP
$songs = json_decode($jsonContent, true);

// Vérifier si la conversion a réussi
if ($songs === null) {
    die('Erreur lors de la lecture du fichier JSON.');
}

// Vous pouvez maintenant utiliser le tableau PHP $songs qui contient vos morceaux de musique
// par exemple, vous pouvez parcourir le tableau pour afficher les titres et les artistes :

foreach ($songs as $song) {
    echo 'Titre : ' . $song['title'] . ', Artiste : ' . $song['artist'] . '<br>';
}
?>
?>



<!DOCTYPE html>
<html>
  <title>Hom</title>
  <head>
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss/home.css">
    <script src="Javascript/modernizr-custom.js"></script>
  </head>
  <body>
  <section class="wrapper">

<article class="music-container">

  <div class="controls">
    <input type="radio" name="controls" id="btn-play">
    <label for="btn-play" class="lbl-btn-play"><span></span></label>

    <input type="radio" name="controls" id="btn-pause">
    <label for="btn-pause" class="lbl-btn-pause"><span></span></label>

    <label class="lbl-btn-reset"><span></span></label>
  </div>

  <div class="cover">
    <div class="static-card">
      <img src="http://f1.bcbits.com/img/a1312167393_16.jpg" alt="">
    </div>
    <div class="flip-card">
      <img src="http://f1.bcbits.com/img/a1312167393_16.jpg" alt="">
    </div>
  </div>
</article>

<p class="info">Hover/Click on album cover to show controls</p>

</section>
<script src="modernizr.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="Javascript/lecteur.js"></script>

  </body>
</html>
