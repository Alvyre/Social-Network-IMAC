<?php 
	require_once(__DIR__."/../../Models/User.php");
	$users = readAllUser();
	echo json_encode($users);
?>