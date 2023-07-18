<?php
include 'connexion.php';
include 'navbar.php';
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
<section>

<!--

  Hey, you! Go check out this wonderful dribbble by Sebastian Beltz!
  http://dribbble.com/shots/1408634-Music-Player

-->

<div class="music-player">
  <img src="https://images.unsplash.com/photo-1503248947681-3198a7abfcc9?ixlib=rb-0.3.5&q=85&fm=jpg&crop=entropy&cs=srgb&ixid=eyJhcHBfaWQiOjE0NTg5fQ&s=9dea5064c1d0b9f8969216204ba66c73" class="album" />
  <div class="dash">
    <a href="#mute" class="fa fa-volume-up"></a>
    <span class="volume-level">
      <em style="width: 75%"></em>
    </span>
    <a href="#share" class="fa fa-share"></a>
    <a href="#love" class="fa fa-heart"></a>
    <div class="seeker">
      <div class="wheel">
        <div class="progress"></div>
      </div>
    </div>
    <a href="#seek"></a>
    <div class="controls">
      <a href="#back" class="fa fa-fast-backward"></a>
      <a href="#play" class="fa fa-pause"></a>
      <a href="#forward" class="fa fa-fast-forward"></a>
    </div>
    <div class="info">
      <i><span name="current">0:00</span> / <span name="duration">0:00</span></i>
      <label>Marteria - OMG</label>
      <small>Zum Glück in die Zukunft II</small>
    </div>
  </div>
</div>
</section>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="Javascript/lecteur.js"></script>
</body>
</html>