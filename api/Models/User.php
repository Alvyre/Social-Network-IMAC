<?php
/****************************
Fonctions sur les utilisateurs
*****************************/
include_once(__DIR__."/../Database.php");

// READ

function readAllUser()
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM user";
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

  $sql = 'SELECT * FROM user WHERE pseudoUser = "' .$pseudo .'"';

  if (!$result = $mysqli->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
  }

  $r = mysqli_fetch_assoc($result);

  return (!empty($r));
}

function readPassUser($PseudoUser)
{
  $mysqli = connexionBDD();

  $sql = 'SELECT passUser FROM user WHERE pseudoUser = "' .$PseudoUser.'"';

  if (!$result = $mysqli->query($sql)) {
    echo "Sorry, the website is experiencing problems.";
  }

  $r = mysqli_fetch_assoc($result);

  return $r["PassUser"];
}

function readIdUser($id)
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM user WHERE idUser = '".$id."'";

  $result = $mysqli->query($sql);

  $rows = array();
  while($r = mysqli_fetch_assoc($result)) {
    $rows[] = $r;
  }

  return $rows;
}

function readSearchUsers($recherche)
{
  $mysqli = connexionBDD();

  $sql = "SELECT * FROM user WHERE bioUser LIKE '%$recherche%' OR pseudoUser LIKE '%$recherche%' OR statusUser LIKE '%$recherche%'";

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

  $sql = "UPDATE user SET statusUser ='".$StatusUser."' WHERE idUser = ".$id;

  $result = $mysqli->query($sql);
}

function updateUserEmail($id, $EmailUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET emailUser ='".$EmailUser."' WHERE idUser = ".$id;

  $result = $mysqli->query($sql);
}

function updateUserBio($id, $BioUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET bioUser ='".$BioUser."' WHERE idUser = ".$id;

  $result = $mysqli->query($sql);
}

function updateUserPhoto($id, $PhotoUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET photoUser ='".$PhotoUser."' WHERE idUser = ".$id;

  $result = $mysqli->query($sql);
}

// CREATE

function createUser($PseudoUser, $PassUser ,$StatusUser, $PhotoUser, $EmailUser, $SexUser, $BioUser) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO user (pseudoUser, passUser, statusUser, photoUser, emailUser, sexUser, bioUser) VALUES (?,?,?,?,?,?,?)";

  $stmt = $mysqli->prepare($sql);
  $stmt->bind_param('sssssss', $PseudoUser, password_hash($PassUser, PASSWORD_DEFAULT), $StatusUser, $PhotoUser, $EmailUser, $SexUser, $BioUser);
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

  $sql = "DELETE FROM user WHERE ".$id." = idUser";

  $result = $mysqli->query($sql);
}

 ?>
