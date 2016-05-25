<?php 
	include("../Models/Category.php");
	include("../Models/Comment.php");
	include("../Models/Subject.php");
	include("../Models/User.php");
	include("../Models/Vote.php");

	$url = "http://localhost/Social-Network-IMAC/User/User-delete/5";
	$path = parse_url($url, PHP_URL_PATH);
	$segments = explode('/', rtrim($path, '/'));

	switch ($segments[4]) {
		case "Category":
			switch ($segments[5]) {
				case "Category-getAll":
					$retour = readAllCategories();
					json_encode($retour);
				break;
				
				case "Category-get":
					if(is_numeric($segments[6])) {
						$retour = readIdCategories($segments[6]);
					}else {
						$retour = readTitleCategories($segments[6]);
					}
					json_encode($retour);

				break;

				default:
					switch ($segments[6]) {
						case "Subject-getAll" :
							$category = readTitleCategories($segments[5]);
							$retour = readAllSubjectsCategory($category[0]["IdCat"]);
							json_encode($retour);
						break;
						case "Subject-get" : 
							$retour = readIdSubjects($segments[7]);
							json_encode($retour);
						break;
						case "Subject-create" :
							//createSubject();
						break;
						case "Subject-delete" :
							deleteSubject($segments[7]);
						break;
					}
				break;
			}
		break;

		case "User":
			switch ($segments[5]) {
				/*case "User-create":
					createUser();
				break;*/
				
				case "User-get":
					if(is_numeric($segments[6])) {
						$retour = readIdUser($segments[6]);
					} else {
						$retour = readPseudoUser($segments[6]);
					}
					json_encode($retour);
				break;

				/*case "User-update":
					$retour = updateUser();
				break;*/

				case "User-delete":
					deleteUser($segments[6]);
				break;
			}
		break;
	}
?>