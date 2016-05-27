<?php

//accueil
$app->map(['GET', 'POST'], '/', 'App\Action\HomeAction:getRecentSubjects')
->setName("home");
$app->map(['GET', 'POST'], '/getMostPopular', 'App\Action\HomeAction:getMostPopular')
->setName("home");

//categories
$app->map(['GET', 'POST'], '/category-getall', 'App\Action\CategoryAction:readAll')
	->setName("category-getall");
$app->map(['GET', 'POST'], '/category-get/{idCat}', 'App\Action\CategoryAction:readOne')
	->setName("category-get");
$app->map(['GET', 'POST'], '/category-create/{titleCat}', 'App\Action\CategoryAction:create')
	->setName("category-create");
$app->map(['GET', 'POST'], '/category-update/{idCat}&{titleCat}', 'App\Action\CategoryAction:update')
	->setName("category-update");
$app->map(['GET', 'POST'], '/category-delete/{titleCat}', 'App\Action\CategoryAction:delete')
	->setName("category-delete");
$app->map(['GET', 'POST'], '/category-sub/{idCat}', 'App\Action\CategoryAction:getSubjectsFromCat')
	->setName("category-sub");


//comments
$app->map(['GET', 'POST'], '/comment-getall', 'App\Action\CommentAction:readAll')
->setName("comment-getall");
$app->map(['GET', 'POST'], '/comment-get', 'App\Action\CommentAction:readOne')
->setName("comment-get");
$app->map(['GET', 'POST'],'/comment-create/{contentComment}&{idUser}&{idSubject}', 'App\Action\CommentAction:create')
->setName("comment-create");
$app->map(['GET', 'POST'], '/comment-update/{idComment}', 'App\Action\CommentAction:update')
->setName("comment-update");
$app->map(['GET', 'POST'], '/comment-delete/{idComment}', 'App\Action\CommentAction:delete')
->setName("comment-delete");

//subjects
$app->get('/subject-create/{titleSubject}&{contentSubject}&{idUser}&{idCat}', 'App\Action\SubjectAction:create')
->setName("subject");

$app->get('/subject-getall', 'App\Action\SubjectAction:readAll')
->setName("subject");

$app->get('/subject-get/{idSubject}', 'App\Action\SubjectAction:readOne')
->setName("subject");

$app->get('/subject-update/{idSubject}&{titleSubject}&{contentSubject}','App\Action\SubjectAction:update')
->setName("subject");

$app->get('/subject-delete/{titleSubject}', 'App\Action\SubjectAction:delete')
->setName("subject");


//users
$app->map(['GET', 'POST'], '/user-getall', 'App\Action\UserAction:readAll')
	->setName("user");
$app->map(['GET', 'POST'], '/user-get/{idUser}', 'App\Action\UserAction:readOne')
	->setName("user");
$app->map(['GET', 'POST'], '/user-delete/{pseudoUser}', 'App\Action\UserAction:delete')
	->setName("user");
$app->map(['GET', 'POST'], '/user-create/{pseudoUser}&{statusUser}&{photoUser}&{emailUser}&{sexUser}&{bioUser}&{passUser}', 'App\Action\UserAction:create' )->setName("user");
$app->map(['GET', 'POST'], '/user-update/{idUser}&{pseudoUser}', 'App\Action\UserAction:update')
	->setName("user");
$app->map(['GET', 'POST'], '/user-login/{pseudoUser}&{password}', 'App\Action\UserAction:login')
	->setName("user-login");


//vote

//ici faut mettre 1&0 pour un upvote, 0&1 pour un downvote
$app->map(['GET', 'POST'], '/vote-create/{upVote}&{downVote}&{idSubject}&{idUser}', 'App\Action\VoteAction:create')
->setName("vote-create");

$app->map(['GET', 'POST'], '/vote-getall', 'App\Action\VoteAction:readAll')
->setName("vote-getall");

$app->map(['GET', 'POST'], '/vote-get/{idVote}', 'App\Action\VoteAction:readOne')
->setName("vote-get");

$app->map(['GET', 'POST'], '/vote-update/{idVote}&{upVote}&{downVote}', 'App\Action\VoteAction:update')
->setName("vote-update");

$app->map(['GET', 'POST'], '/vote-delete/{upVote}', 'App\Action\VoteAction:delete')
->setName("vote-delete");

//research
$app->map(['GET', 'POST'], '/search/{tag}&{option1}&{option2}&{option3}', 'App\Action\SearchAction:research')
->setName("search");

?>





