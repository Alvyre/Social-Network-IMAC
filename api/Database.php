<?php
include 'Config.php';

/****************************
Connexion à la base de donnée
*****************************/
function connexionBDD()
{
  //Connexion à la base de donnée
  $mysqli = new mysqli(HOST, USER, PSWD, BDD);

  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
  $mysqli->set_charset("utf8");

  return $mysqli;
}

?>
