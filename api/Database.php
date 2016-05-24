<?php

class Database
{

  /*******************
  Lecture du fichier de connexion
  à la base de donnée
  ********************/

  // le fichier doit être écrit comme ça :
  // localhost
  // user
  // password
  // Nom

  private $monfichier = fopen('connexion.txt', 'r');

  // On fait ici nos opérations sur le fichier...
  private $localhost = fgets($monfichier);
  private $user = fgets($monfichier);
  private $password = fgets($monfichier);
  private $name = fgets($monfichier);

  private $db;

  //Connexion à la base de donnée
  public function __construct()
  {
    $this->db = new mysqli($this->localhost, $this->user, $this->password, $this->name);
  }

  // On a fini de l'utiliser, on ferme le fichier
  fclose($monfichier);

  /*******************
  On récupère toutes les catégories
  ********************/
  public function getAllCategories()
  {
    $sql = "SELECT TitleCat FROM category";

    $stmt = $this->db->prepare($sql);
    $stmt->execute();
    if ($stmt->num_rows == 1) {
      $result = $mysqli->query($sql);


    } else {
      throw new Exception("Utilisateur Inconnu");
    }

    return $result;
  }


}

?>
