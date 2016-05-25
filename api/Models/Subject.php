<?php 
/****************************
Fonctions sur les sujets
*****************************/

require_once("./Database.php");

// READ

// DELETE

function deleteSubject($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM subject WHERE ".$id." = IdSubject";

  $result = $mysqli->query($sql);
}

// CREATE

function createSubject($TitleSubject, $ContentSubject, $DateSubject, $IdVote, $IdUser, $IdCat) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO vote VALUES ('','".$TitleSubject."','".$ContentSubject."','".$DateSubject."','".$IdVote.",'".$IdUser.",'".$IdCat."')";

  $result = $mysqli->query($sql);
}

?>