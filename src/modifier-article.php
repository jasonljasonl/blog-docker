<?php
include('bdd.php');
include('session.php');
include('navbar.php');
if(!$_SESSION['pseudo']){
    header('Location: connexion.php');
}

if(isset($_POST['modifier'])){
    $getid = $_POST['id'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];

    $sql = ("UPDATE articles SET titre='$titre', contenu='$contenu' WHERE id=?");
}





?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="./css/navbar.css">
    <title>Publier un article</title>

</head>
<body>
<form action="" method="POST">
    <input type="text" name="titre">
    <textarea name="contenu" cols="30" rows="10"></textarea>
    <input type="submit" name="modifier">
</form>
</body>
</html>

