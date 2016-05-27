<?php 
	require_once(__DIR__."/../../Models/Comment.php");
	createComment($_POST["date"], $_POST["content"], $_POST["id"]);
?>