<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Inscription</title>
    <link rel="stylesheet" href="./css/inscription.css"/>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins&display=swap" rel="stylesheet">
</head>
<body>

<?php
require('bdd.php');
include('./navbar.php');
if (isset($_REQUEST['pseudo'])) {
    // removes backslashes
    $pseudo = stripslashes($_REQUEST['pseudo']);
    //escapes special characters in a string
    $pseudo = mysqli_real_escape_string($con, $pseudo);
    $email    = stripslashes($_REQUEST['email']);
    $email    = mysqli_real_escape_string($con, $email);
    $mdp = stripslashes($_REQUEST['mdp']);
    $mdp = mysqli_real_escape_string($con, $mdp);
    $create_datetime = date("Y-m-d H:i:s");
    $query    = "INSERT into `users` (pseudo, mdp, email, create_datetime)
                     VALUES ('$pseudo', '" . md5($mdp) . "', '$email', '$create_datetime')";
    $result   = mysqli_query($con, $query);
    if ($result) {
        echo "<div class='form'>
                  <h3>Inscription validée</h3><br/>
                  <p class='link'>Se conecter<a href='connexion.php'>Connexion</a></p>
                  </div>";
    } else {
        echo "<div class='form'>
                      <h3>Champ(s) manquant(s)</h3><br/>
                  <p class='link'>Click here to <a href='inscription.php'>registration</a> again.</p>
                  </div>";
    }
} else {
    ?>
    <div id="formulaire-inscription">
        <form class="form" action="" method="post">
            <h1 class="login-title">Inscription</h1>
            <input type="text" class="login-input" name="pseudo" placeholder="Pseudo" required />
            <br>
            <input type="password" class="login-input" name="mdp" placeholder="Mot de passe">
            <br>
            <input type="text" class="login-input" name="email" placeholder="Adresse email">
            <br>
            <button class="btn btn-primary" type="submit" name="submit" value="Inscription">Valider</button>
            <button type="button" class="btn btn-outline-primary" id="btn-connexion"><a href="connexion.php">Se connecter</a></button>
        </form>
    </div>
    <?php
}
?>
</body>
</html>