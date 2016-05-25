<?php 
/****************************
Fonctions sur les sujets
*****************************/

require_once("./Database.php");

// READ

function readAllSubjects()
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM 'subject'";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

function readMostRecent()
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM 'subject' ORDER BY DateSubject LIMIT 5";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

function readMostCommented()
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM subject, (SELECT IdSubject, COUNT(IdSubject) as nbCom from comment group by IdSubject) AS tempTable WHERE subject.IdSubject = tempTable.IdSubject ORDER BY tempTable.nbCom DESC LIMIT 5";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

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