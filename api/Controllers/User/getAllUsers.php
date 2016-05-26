<?php 
	require_once(__DIR__."/../../Models/User.php");
	$users = readAllUser();
	header('Content-Type: application/json');
	echo json_encode($users);
?>