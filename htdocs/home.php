<?php
include 'connexion.php';
?>

<!DOCTYPE html>
<html>
  <title>Home</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss/home.css">

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

<script src="lecteur.js"></script>
</body>
</html>