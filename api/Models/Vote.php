<?php 
/****************************
Fonctions sur les votes
*****************************/

include_once(__DIR__."/../Database.php");
// READ

function readAllVotes()
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM vote";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

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