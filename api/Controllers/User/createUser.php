<?php

$inscription = false;
$echec = false;
$PseudoAlreadyExist = false;

if (!empty($_POST)) {
  if (isset($_POST['PseudoUser']) || $_POST['PseudoUser'] == '') {
    $PseudoUser = $_POST['PseudoUser'];
    if (readPseudoUser($PseudoUser)) {
      $PseudoAlreadyExist = true;
    }
  }
  if (isset($_POST['PassUser']) || $_POST['PassUser'] == '') {
    $PassUser = $_POST['PassUser'];
  }
  if (isset($_POST['EmailUser']) || $_POST['EmailUser'] == '') {
    $EmailUser = $_POST['EmailUser'];
  }
  if (isset($_POST['StatusUser']) || $_POST['StatusUser'] == '') {
    $StatusUser = $_POST['StatusUser'];
  }
  if (isset($_POST['SexUser']) || $_POST['SexUser'] == '') {
    $SexUser = $_POST['SexUser'];
  }
  if (isset($_POST['BioUser']) || $_POST['BioUser'] == '') {
     $BioUser = $_POST['BioUser'];
  }
}

$result = createUser($PseudoUser, $PassUser, $StatusUser, $PhotoUser, $EmailUser, $SexUser, $BioUser);

if ($result) {
  $inscription = true;
}

//Renvoie des données
$array = [
  "inscription" => $inscription,
  "PseudoAlreadyExist" => $PseudoAlreadyExist,
];
echo json_encode($array);
?>
