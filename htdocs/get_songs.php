<?php
include 'connexion.php';

$query = $bdd->query("SELECT * FROM Songs");
$songs = $query->fetchAll(PDO::FETCH_ASSOC);

?>
