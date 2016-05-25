<?php 
/****************************
Fonctions sur les commentaires
*****************************/

require_once("./Database.php");

// READ

function readAllComments()
{
  $mysqli = connexionBDD();

  $sql = "SELECT IdComment FROM 'comment'";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

// CREATE

function createComment($DateComment, $ContentComment, $IdUser) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO comment VALUES ('','".$DateComment."','".$ContentComment."','".$IdUser."')";

  $result = $mysqli->query($sql);
}

// DELETE

function deleteComment($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM comment WHERE ".$id." = IdComment";

  $result = $mysqli->query($sql);
}

 ?>