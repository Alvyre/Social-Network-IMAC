<?php 
/****************************
Fonctions sur les categories
*****************************/

include_once("../Database.php");
//require_once("./Config.php");

// READ

function readAllCategories()
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM category";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

function readTitleCategories($title)
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM category WHERE TitleCat = '".$title."'";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }
  return $rows;
}

function readIdCategories($id)
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM category WHERE IdCat = '".$id."'";

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

  $sql = "DELETE FROM category WHERE ".$id." = IdCat";

  $result = $mysqli->query($sql);
}

// CREATE

function createCategory($TitleCat) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO category VALUES ('','".$TitleCat."')";

  $result = $mysqli->query($sql);
}


 ?>