<?php

function connexionBDD()
{
  /*******************************
  Lecture du fichier de connexion
  à la base de donnée
  ********************************/

  // le fichier doit être écrit comme ça :
  // localhost
  // user
  // password
  // Nom

  // $monfichier = fopen('connexion.txt', 'r');
  //
  // // On fait ici nos opérations sur le fichier...
  // $localhost = fgets($monfichier);
  // $user = fgets($monfichier);
  // $password = fgets($monfichier);
  // $BDDname = fgets($monfichier);


  //Connexion à la base de donnée
  $mysqli = new mysqli('localhost', 'root', '', 'Ladyz_BDD');

  if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
  }

  // // On a fini de l'utiliser, on ferme le fichier
  // fclose($monfichier);

  return $mysqli;
}

/*********************************
On récupère toutes les catégories
**********************************/
function readAllCategories()
{
  $mysqli = connexionBDD();

  $sql = "SELECT TitleCat FROM category";

  $result = $mysqli->query($sql);

  return $result;
}

function deleteCategory($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM category WHERE ".$id." = IdCategory";

  $result = $mysqli->query($sql);

  return $result;
}

function deleteComment($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM comment WHERE ".$id." = IdComment";

  $result = $mysqli->query($sql);

  return $result;
}

function deleteVote($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM vote WHERE ".$id." = IdVote";

  $result = $mysqli->query($sql);

  return $result;
}

function deleteUser($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM user WHERE ".$id." = IdUser";

  $result = $mysqli->query($sql);

  return $result;
}

function deleteSubject($id) {
  $mysqli = connexionBDD();

  $sql = "DELETE FROM subject WHERE ".$id." = IdSubject";

  $result = $mysqli->query($sql);

  return $result;
}

function createCategory($TitleCat) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO category VALUES ('','".$TitleCat."')";

  $result = $mysqli->query($sql);

  return $result;
}

function createComment($DateComment, $ContentComment, $IdUser) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO comment VALUES ('""','".$DateComment."','".$ContentComment."','".$IdUser."')";

  $result = $mysqli->query($sql);

  return $result;
}

function createVote($UpVote, $DownVote, $IdUser, $IdComment) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO vote VALUES ('""','".$UpVote."','".$DownVote."','".$IdUser."','".$IdComment."')";

  $result = $mysqli->query($sql);

  return $result;
}

function createUser($PSeudoUser, $StatusUser, $PhotoUser, $EmailUser, $SexUser, $BioUser, $AdminUser) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO vote VALUES ('""','".$PSeudoUser."','".$StatusUser."','".$PhotoUser."','".$EmailUser.",'".$SexUser.",'".$BioUser.",'".$AdminUser."')";

  $result = $mysqli->query($sql);

  return $result;
}

function createSubject($TitleSubject, $ContentSubject, $DateSubject, $IdVote, $IdUser, $IdCat) {
  $mysqli = connexionBDD();

  $sql = "INSERT INTO vote VALUES ('""','".$TitleSubject."','".$ContentSubject."','".$DateSubject."','".$IdVote.",'".$IdUser.",'".$IdCat."')";

  $result = $mysqli->query($sql);

  return $result;
}

function updateUserStatus($id, $StatusUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET StatusUser='".$StatusUser."' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);

  return $result;
}

function updateUserEmail($id, $EmailUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET EmailUser='".$EmailUser."' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);

  return $result;
}

function updateUserBio($id, $BioUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET BioUser='".$BioUser."' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);

  return $result;
}

function updateUserPhoto($id, $PhotoUser) {
  $mysqli = connexionBDD();

  $sql = "UPDATE user SET PhotoUser='".$PhotoUser."' WHERE IdUser = ".$id;

  $result = $mysqli->query($sql);

  return $result;
}

	//COMMENT
function readAllComments()
{
  $mysqli = connexionBDD();

  $sql = "SELECT IdComment FROM 'comment'";

  $result = $mysqli->query($sql);
  return $result;
}

	//USER
function readAllPseudos()
{
  $mysqli = connexionBDD();

  $sql = "SELECT PSeudoUser FROM 'user'";

  $result = $mysqli->query($sql);
  return $result;
}


?>
