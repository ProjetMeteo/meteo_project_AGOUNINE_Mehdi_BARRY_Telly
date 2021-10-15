<?php 
// on détruit la session à la déconnexion et rien n'est enregistré via les cookies, ville favorites en bdd.
session_start();
session_destroy(); 
header('location:index.php');