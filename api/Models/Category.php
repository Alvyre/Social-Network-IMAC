<?php 
/****************************
Fonctions sur les categories
*****************************/

require_once("./Database.php");

// READ

function readAllCategories()
{
  $mysqli = connexionBDD();

  $sql = "SELECT TitleCat FROM category";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

// DELETE

function deleteCategory($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM category WHERE ".$id." = IdCategory";

  $result = $mysqli->query($sql);
}

// CREATE

function createCategory($TitleCat) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO category VALUES ('','".$TitleCat."')";

  $result = $mysqli->query($sql);
}


 ?>