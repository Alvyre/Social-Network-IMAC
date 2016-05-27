<?php 
	require_once(__DIR__."/../../Models/Comment.php");
	updateComment($_POST["date"], $_POST["content"], $_POST["id"]);
?>