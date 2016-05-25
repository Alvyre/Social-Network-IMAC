<?php

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

  }

}

function login(){

}
?>
