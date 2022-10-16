<?php
include('session.php');
include('bdd.php');
include('navbar.php');
if(!$_SESSION['pseudo']){
    header('Location: connexion.php');
}

if (isset($_POST['envoi'])) {
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $sql = "INSERT INTO articles (titre,contenu)
VALUES ('$titre', '$contenu')";

    if ($con->query($sql) === TRUE) {
        echo "Article envoyé";
    } else {
        echo "Error: " . $sql . "<br>" . $con->error;
    }
}

?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="./css/publier-article.css">
    <title>Publier un article</title>
</head>
<body>

    <h1>Publier un post</h1>
    <form action="" method="POST" id="formulaire-article">
        <h3>Titre</h3>
        <input type="text" name="titre"><br>
        <h3 style="margin-top: 32px;">Description</h3>
        <textarea name="contenu" cols="30" rows="10"></textarea>
        <br>
        <br>
        <button type="submit" name="envoi">
        Envoyer
        </button>
    </form>
</body>
</html>
