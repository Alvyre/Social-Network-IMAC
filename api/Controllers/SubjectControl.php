<?php

include '../Models/Subject.php';

$fonction = $_GET['fonction'];

function createSubject()
{
  if (!empty($_POST)) {
    if (isset($_POST['TitleSubject']) || $_POST['TitleSubject'] == '') {
      $TitleSubject = $_POST['TitleSubject'];
    }
    if (isset($_POST['ContentSubject']) || $_POST['ContentSubject'] == '') {
      $ContentSubject = $_POST['ContentSubject'];
    }
  /*  $idUser = */
  }
}

function voteSubject(){
	// ajouter le user dans Vote Subject
	// ajouter l'id de l'utilisateur qui vote (vérifier qu'il n'a pas encore voté)
	// 
}

?>
