<?php
include 'connexion.php';

$query = $bdd->prepare("SELECT * FROM users WHERE pseudo = :pseudo")

?>

<!DOCTYPE html>
<html>
  <title>Sign up</title>
  <head>
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">
    <link rel="stylesheet" href="stylecss/index.css">
    <link rel="stylesheet" href="stylecss/log.css">
  </head>
  <body>
    <form id="login" action="traitement.php" method="POST">
      <h1>Inscription</h1>
      <div class="icon">
        <i class="fas fa-user-circle"></i>
      </div>
      <div class="formcontainer">
      <div class="container">
        <label for="uname"><strong>Nom d'utilisateur</strong></label>
        <input type="text" placeholder="Pseudo" name="pseudo" required>
      </div>
      <button type="submit"><strong>S'INSCRIRE</strong></button>
      <div class="container" style="background-color: #eee">
        <label style="padding-left: 15px">
        <input type="checkbox"  checked="checked" name="remember"> Souviens-toi de moi
        </label>
      </div>
    </form>


  </body>
</html>