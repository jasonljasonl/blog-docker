<?php
//include auth_session.php file on all user panel pages
include("session.php");
include('navbar.php');
if(!$_SESSION['pseudo']){
    header('Location: connexion.php');
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Page Utilisateur</title>

    <link rel="stylesheet" href="./css/dashboard.css" />
</head>
<body>
<div class="form">
    <h1>Bonjour, <strong><?php echo $_SESSION['pseudo']; ?></strong>!</h1>
    <br>
    <h3>Ceci est le tableau de bord utilisateur.</h3>
    <br>
    <button id='btn-connexion' ><a href="index.php">Voir les posts</a></button>
    <button id='btn-connexion' ><a href="publier-article.php">Publier un post</a></button>
    <button id='btn-connexion' ><a href="deconnexion.php">Se déconnecter</a></button>


</div>
</body>
</html>