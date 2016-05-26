<?php 
	require_once(__DIR__."/../../Models/User.php");
	$user = readIdUser();
	header('Content-Type: application/json');
	echo json_encode($user);
?>