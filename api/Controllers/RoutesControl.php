<?php 
	include_once("../Models/Category.php");
	include_once("../Models/Comment.php");
	include_once("../Models/Subject.php");
	include_once("../Models/User.php");
	include_once("../Models/Vote.php");

function donneesBDD($url) {
	$path = parse_url($url, PHP_URL_PATH);
	$segments = explode('/', rtrim($path, '/'));

	switch ($segments[3]) {
		case "Category":
			switch ($segments[4]) {
				case "Category-getAll":
					$categories = readAllCategories();
					json_encode($categories);
					header("content-type: application/json");
					return $categories;
				break;
				
				case "Category-get":
					if(is_numeric($segments[5])) {
						$category = readIdCategories($segments[5]);
					}else {
						$category = readTitleCategories($segments[5]);
					}
					json_encode($category);
					header("content-type: application/json");
					return $category;

				break;

				default:
					switch ($segments[5]) {
						case "Subject-getAll" :
							$category = readTitleCategories($segments[4]);
							$sujets = readAllSubjectsCategory($category[0]["IdCat"]); 
							//$votes
							json_encode($sujets);
							header("content-type: application/json");
							foreach ($sujets as $key => $value) {
								echo $value['TitleSubject'];
							}
							return $sujets;
						break;
						case "Subject-get" : 
							$sujet = readIdSubjects($segments[6]);
							$commentaires = readSubjectsComments($segments[6]);
							json_encode($sujet);
							header("content-type: application/json");
							return $sujet;
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
						$user = readIdUser($segments[5]);
					} else {
						$user = readPseudoUser($segments[5]);
					}
					json_encode($user);
					header("content-type: application/json");
					return $user;
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
}

donneesBDD("http://localhost/Social-Network-IMAC/Category/Enseignement/Subject-getAll");
?>