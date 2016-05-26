<?php 

if (!empty($_POST)) {
  if (isset($_POST['PseudoUser']) || $_POST['PseudoUser'] == '') {
    $PseudoUser = $_POST['PseudoUser'];
  }
  if (isset($_POST['PassUser']) || $_POST['PassUser'] == '') {
    $PassUser = $_POST['PassUser'];
  }
}
if(readPseudoUser($PseudoUser))
  if(readPassUser($PseudoUser) == $PassUser)
    echo "WAOUW ON SE CONNECTE";
  else
    echo "!!!! ERREUR LE MOT DE PASSE EST MAUVAIS !!!!";
else
  echo "!!!! ERREUR LE PSEUDO N'EXISTE PAS !!!!";

?>