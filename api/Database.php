<?php
include("Config.php");

/****************************
Connexion à la base de donnée
*****************************/
function connexionBDD()
{

  //Lecture du fichier de connexion à la base de donnée

  // le fichier doit être écrit comme ça :
  // localhost
  // user
  // password
  // Nom

  // $monfichier = fopen('connexion.txt', 'r');
  //
  // // On fait ici nos opérations sur le fichier...
  // $localhost = fgets($monfichier);
  // $user = fgets($monfichier);
  // $password = fgets($monfichier);
  // $BDDname = fgets($monfichier);


  //Connexion à la base de donnée
  $mysqli = new mysqli($connexion[0], $connexion[1], $connexion[2], $connexion[3]);

  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }
  $mysqli->set_charset("utf8");

  // // On a fini de l'utiliser, on ferme le fichier
  // fclose($monfichier);

  return $mysqli;
}


connexionBDD();
?>
