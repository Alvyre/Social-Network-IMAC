<?php

  /*******************
  Lecture du fichier de connexion
  à la base de donnée
  ********************/

  // le fichier doit être écrit comme ça :
  // localhost
  // user
  // password
  // Nom

  $monfichier = fopen('connexion.txt', 'r');

  // On fait ici nos opérations sur le fichier...
  $localhost = fgets($monfichier);
  $user = fgets($monfichier);
  $password = fgets($monfichier);
  $BDDname = fgets($monfichier);


  //Connexion à la base de donnée
    $mysqli = new mysqli($localhost, $user, $password, $BDDname);
    if (mysqli_connect_errno()) {
      printf("Connect failed: %s\n", mysqli_connect_error());
      exit();
    }

  // On a fini de l'utiliser, on ferme le fichier
    fclose($monfichier);

  /*******************
  On récupère toutes les catégories
  ********************/
  function getAllCategories()
  {
    $sql = "SELECT TitleCat FROM category";

    $result = $mysqli->query($sql);
    $categories = $result->fetch_assoc();
    echo "<p>{$categories['TitleCat']}</p>";
  }

?>
