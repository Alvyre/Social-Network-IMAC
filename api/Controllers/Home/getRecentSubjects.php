<?php
require_once(__DIR__."/../../Models/Subject.php");

$subject = readMostRecent();
header('Content-Type: application/json');
echo json_encode($subject);

?>
