<?php 
/****************************
Fonctions sur les votes
*****************************/

require_once("./Database.php");

// READ



// CREATE

function createVote($UpVote, $DownVote, $IdUser, $IdComment) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO vote VALUES ('','".$UpVote."','".$DownVote."','".$IdUser."','".$IdComment."')";

  $result = $mysqli->query($sql);
}

// DELETE

function deleteVote($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM vote WHERE ".$id." = IdVote";

  $result = $mysqli->query($sql);
}

?>