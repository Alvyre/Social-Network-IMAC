<?php
	$PseudoUser = $_POST['PseudoUser'];
	$PassUser = $_POST['PassUser'];
	$statusUser = $_POST['statusUser'];
	$photoUser = $_POST['photoUser'];
	$emailUser = $_POST['emailUser'];
	$sexUser = $_POST['sexUser'];
	$bioUser = $_POST['bioUser'];

	header('Location: ../../../public/user-create/'.$PseudoUser.'&'.$statusUser.'&'.$photoUser.'&'.$emailUser.'&'.$sexUser.'&'.$bioUser.'&'.$PassUser);
?>