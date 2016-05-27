<?php 
	require_once(__DIR__."/../../Models/User.php");
	$user = readIdUser($_POST["id"]);
	header('Content-Type: application/json');
	echo json_encode($user);
?>