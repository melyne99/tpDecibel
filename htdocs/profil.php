<?php
session_start();
include 'connexion.php';
include 'navbar.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profil Utilisateur</title>
    <link rel="stylesheet" type="text/css" href="stylecss/profils.css">
</head>
<body>
    <div class="container">
        <?php
        // Vérifier si l'utilisateur est connecté et si son pseudo est enregistré en session
        if (isset($_SESSION['user_id'])) {
            $userid = $_SESSION['user_id'];

            // Récupérer le pseudo de l'utilisateur à partir de la base de données
            $query = $bdd->prepare("SELECT * FROM Users WHERE user_id = :userid"); 
            $query->execute([':userid' => $userid]);
            $user = $query->fetch(PDO::FETCH_ASSOC);
        ?>
            <h1>Profil Utilisateur</h1>
            <div class="user-info">
                <p>Pseudo actuel : <?php echo $user['pseudo']; ?></p>

                <h2>Modifier Pseudo</h2>
                <form action="modifier_pseudo.php" method="POST">
                    <input type="text" name="nouveau_pseudo" placeholder="Nouveau pseudo" required>
                    <input type="submit" value="Modifier">
                </form>
            </div>
        <?php
        } else {
            // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
            header('location: connexion.php');
            exit;
        }
        ?>
    </div>
</body>
</html>
