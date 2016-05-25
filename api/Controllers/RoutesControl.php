<?php 
	include_once("../Models/Category.php");
	include_once("../Models/Comment.php");
	include_once("../Models/Subject.php");
	include_once("../Models/User.php");
	include_once("../Models/Vote.php");

	$url = "http://localhost/Social-Network-IMAC/User/User-get/4";
	$path = parse_url($url, PHP_URL_PATH);
	$segments = explode('/', rtrim($path, '/'));

	switch ($segments[3]) {
		case "Category":
			switch ($segments[4]) {
				case "Category-getAll":
					$retour = readAllCategories();
					json_encode($retour);
				break;
				
				case "Category-get":
					if(is_numeric($segments[5])) {
						$retour = readIdCategories($segments[5]);
					}else {
						$retour = readTitleCategories($segments[5]);
					}
					json_encode($retour);

				break;

				default:
					switch ($segments[5]) {
						case "Subject-getAll" :
							$category = readTitleCategories($segments[4]);
							$sujets = readAllSubjectsCategory($category[0]["IdCat"]); 
							//$votes
							json_encode($retour);
						break;
						case "Subject-get" : 
							$sujet = readIdSubjects($segments[6]);
							$commentaires = readSubjectsComments($segments[6]);
							json_encode($sujet);
						break;
						case "Subject-create" :
							//createSubject();
						break;
						case "Subject-delete" :
							deleteSubject($segments[6]);
						break;
					}
				break;
			}
		break;

		case "User":
			switch ($segments[4]) {
				/*case "User-create":
					createUser();
				break;*/
				
				case "User-get":
					if(is_numeric($segments[5])) {
						$retour = readIdUser($segments[5]);
					} else {
						$retour = readPseudoUser($segments[5]);
					}
					json_encode($retour);
				break;

				/*case "User-update":
					$retour = updateUser();
				break;*/

				case "User-delete":
					deleteUser($segments[5]);
				break;
			}
		break;
	}
?>