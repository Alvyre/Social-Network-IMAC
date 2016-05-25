<?php

include 'Models/User.php';

$fonction = $_GET['fonction'];

switch ($fonction) {
  case 'login':
  login();
  break;
  case 'createUser':
  createUser();
  break;

  default:
  echo "probleme";
  break;
}


function createUser(){
  if (!empty($_POST)) {
    if (!isset($_POST['PseudoUser']) || $_POST['PseudoUser'] == '') {
      $PseudoUser = real_escape_string($_POST['PseudoUser']);
    }
    if (!isset($_POST['PassUser']) || $_POST['PassUser'] == '') {
      $PassUser = real_escape_string($_POST['PassUser']);
    }
    if (!isset($_POST['EmailUser']) || $_POST['EmailUser'] == '') {
      $EmailUser = real_escape_string($_POST['EmailUser']);
    }
    if (!isset($_POST['StatusUser']) || $_POST['StatusUser'] == '') {
      $StatusUser = real_escape_string($_POST['StatusUser']);
    }
    if (!isset($_POST['SexUser']) || $_POST['SexUser'] == '') {
      $SexUser = real_escape_string($_POST['SexUser']);
    }
    if (!isset($_POST['BioUser']) || $_POST['BioUser'] == '') {
      $BioUser = real_escape_string($_POST['BioUser']);
    }
  }
}

function login(){
  if (!empty($_POST)) {
    if (!isset($_POST['PseudoUser']) || $_POST['PseudoUser'] == '') {
      $PseudoUser = real_escape_string($_POST['PseudoUser']);
    }
    if (!isset($_POST['PassUser']) || $_POST['PassUser'] == '') {
      $PassUser = real_escape_string($_POST['PassUser']);
    }
  }
}
?>
