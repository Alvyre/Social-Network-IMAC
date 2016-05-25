<?php
/****************************
Fonctions sur les utilisateurs
*****************************/

require_once("./Database.php");

// READ

function readAllUser()
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM 'user'";
  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

function readPseudoUser($pseudo)
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM 'user' WHERE PSeudoUser = ".$pseudo;

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

function readIdUser($id)
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM 'user' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

// UPDATE

function updateUserStatus($id, $StatusUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET StatusUser='".$StatusUser."' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);
}

function updateUserEmail($id, $EmailUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET EmailUser='".$EmailUser."' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);
}

function updateUserBio($id, $BioUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET BioUser='".$BioUser."' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);
}

function updateUserPhoto($id, $PhotoUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET PhotoUser='".$PhotoUser."' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);
}

// CREATE

function createUser($PseudoUser, $StatusUser, $PhotoUser, $EmailUser, $SexUser, $BioUser, $AdminUser) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO vote VALUES (','".$PseudoUser."','".$StatusUser."','".$PhotoUser."','".$EmailUser.",'".$SexUser.",'".$BioUser.",'".$AdminUser."')";

  $result = $mysqli->query($sql);
}

// DELETE

function deleteUser($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM user WHERE ".$id." = IdUser";

  $result = $mysqli->query($sql);
}

 ?>
