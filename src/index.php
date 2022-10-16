<?php
include('session.php');
include('bdd.php');
include('navbar.php');
if(!$_SESSION['pseudo']){
    header('Location: connexion.php');
}
?>

<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blog Docker</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="./css/index.css"/>
</head>
<body>

<h1 style="text-align: center;margin-top:50px ">Les posts</h1>
<?php


$sql = mysqli_query($con, "SELECT * FROM articles") or die('Erreur de la requête SQL');

while ($data = mysqli_fetch_array($sql)) {
?>
<div class="articles-blog">

    <h1><?= $data['titre']; ?></h1>
    <p><?= $data['contenu']; ?></p>

    <?php

        ?>
    <form method="POST" action="supprimer-article.php">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <input type="submit" name="delete" value="Supprimer">
    </form>
    <form method="POST" action="modifier-article.php">
        <input type="hidden" name="id" value="<?php echo $data['id']; ?>">
        <input type="submit" name="modifier" value="modifier">
    </form>

</div>

<?php


}
?>




</body>
</html>
