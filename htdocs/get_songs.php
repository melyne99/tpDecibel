<?php
include 'connexion.php';

$query = $bdd->query("SELECT * FROM Songs");
$morceaux = $query->fetchAll(PDO::FETCH_ASSOC);

?>
