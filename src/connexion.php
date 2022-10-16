<?php
require('bdd.php');
if (empty(session_id()) && !headers_sent()) {
    session_start();
}
// When form submitted, check and create user session.
if (isset($_POST['pseudo'])) {
    $pseudo = stripslashes($_REQUEST['pseudo']);    // removes backslashes
    $pseudo = mysqli_real_escape_string($con, $pseudo);
    $mdp = stripslashes($_REQUEST['mdp']);
    $mdp = mysqli_real_escape_string($con, $mdp);
    // Check user is exist in the database
    $query    = "SELECT * FROM `users` WHERE pseudo='$pseudo'
                     AND mdp='" . md5($mdp) . "'";
    $result = mysqli_query($con, $query) or die(mysql_error());
    $rows = mysqli_num_rows($result);
    if ($rows == 1) {
        $_SESSION['pseudo'] = $pseudo;
        header("Location: dashboard.php");
    } else {
        echo "<div class='form'>
                  <h3>Mot de passe ou pseudo incorrect</h3><br/>
                  <p class='link'>Click here to <a href='connexion.php'>Login</a> again.</p>
                  </div>";
    }
} else {
?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8"/>
    <title>Connexion</title>
<!--    <link rel="stylesheet" href="style.css"/> -->
</head>
<body>

    <form class="form" method="post" name="connexion">
        <h1 class="login-title">Login</h1>
        <input type="text" class="login-input" name="pseudo" placeholder="Pseudo" autofocus="true"/>
        <input type="password" class="login-input" name="mdp" placeholder="Mot de passe"/>
        <input type="submit" value="Login" name="submit" class="login-button"/>
        <button><a href="inscription.php">s'inscrire</a></button>
    </form>
    <?php
}
?>
</body>
</html>