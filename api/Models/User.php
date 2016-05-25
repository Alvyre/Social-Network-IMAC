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

function createUser($PseudoUser, $PassUser ,$StatusUser, $PhotoUser, $EmailUser, $SexUser, $BioUser) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO user (PseudoUser, PassUser, StatusUser, PhotoUser, EmailUser, SexUser, BioUser) VALUES (?,?,?,?,?,?,?)";

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('sssssss', $PseudoUser, md5($PassUser), $StatusUser, $PhotoUser, $EmailUser, $SexUser, $BioUser);
  $stmt->execute();
  if ($stmt->affected_rows == 1) {
      return true;
  } else {
      return false;
  }
}

// DELETE

function deleteUser($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM user WHERE ".$id." = IdUser";

  $result = $mysqli->query($sql);
}

 ?>
