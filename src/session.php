<?php
session_start();
if(!isset($_SESSION["pseudo"])) {
    header("Location: connexion.php");
    exit();
}
?>