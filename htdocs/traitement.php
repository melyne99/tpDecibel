<?php
session_start();
include 'connexion.php';
if (isset($_POST['peusdo'])) {

    $pseudo = $_POST['peusdo'];
    $query = $bdd->prepare("SELECT * FROM Users WHERE pseudo")
}