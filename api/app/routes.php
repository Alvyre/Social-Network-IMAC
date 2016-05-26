<?php

//accueil
$app->get('/', 'App\Action\HomeAction:getRecentSubjects')
->setName("home");
$app->get('/getMostPopular', 'App\Action\HomeAction:getMostPopular')
->setName("home");

//categories
$app->get('/category-getall', 'App\Action\CategoryAction:readAll')
	->setName("category-getall");
$app->get('/category-get/{idCat}', 'App\Action\CategoryAction:readOne')
	->setName("category-get");
$app->get('/category-create/{titleCat}', 'App\Action\CategoryAction:create')
	->setName("category-create");
$app->get('/category-update/{idCat}&{titleCat}', 'App\Action\CategoryAction:update')
	->setName("category-update");
$app->get('/category-delete/{titleCat}', 'App\Action\CategoryAction:delete')
	->setName("category-delete");
$app->get('/category-sub/{idCat}', 'App\Action\CategoryAction:getSubjectsFromCat')
	->setName("category-sub");


//comments
$app->get('/comment-getall', 'App\Action\CommentAction:readAll')
->setName("comment-getall");
$app->get('/comment-get', 'App\Action\CommentAction:readOne')
->setName("comment-get");
$app->get('/comment-create/{dateComment}&{contentComment}', 'App\Action\CommentAction:create')
->setName("comment-create");
$app->get('/comment-update/{idComment}', 'App\Action\CommentAction:update')
->setName("comment-update");
$app->get('/comment-delete/{idComment}', 'App\Action\CommentAction:delete')
->setName("comment-delete");

//subjects
$app->get('/subject-create/{titleSubject}&{contentSubject}&{dateSubject}', 'App\Action\SubjectAction:create')
->setName("subject");

$app->get('/subject-getall', 'App\Action\SubjectAction:readAll')
->setName("subject");

$app->get('/subject-get', 'App\Action\SubjectAction:readOne')
->setName("subject");

$app->get('/subject-update/{idSubject}&{titleSubject}&{contentSubject}','App\Action\SubjectAction:update')
->setName("subject");

$app->get('/subject-delete/{titleSubject}', 'App\Action\SubjectAction:delete')
->setName("subject");


//users
$app->get('/user-getall', 'App\Action\UserAction:readAll')
	->setName("user");
$app->get('/user-get/{idUser}', 'App\Action\UserAction:readOne')
	->setName("user");
$app->get('/user-delete/{pseudoUser}', 'App\Action\UserAction:delete')
	->setName("user");
$app->get('/user-create/{pseudoUser}&{statusUser}&{photoUser}&{emailUser}&{sexUser}&{bioUser}&{passUser}', 'App\Action\UserAction:create')
	->setName("user");
$app->get('/user-update/{idUser}&{pseudoUser}', 'App\Action\UserAction:update')
	->setName("user");
$app->get('/user-login/{pseudoUser}&{password}', 'App\Action\UserAction:login')
	->setName("user-login");


//vote
$app->get('/vote-create/{upVote}&{downVote}', 'App\Action\VoteAction:create')
->setName("vote-create");

$app->get('/vote-getall', 'App\Action\VoteAction:readAll')
->setName("vote-getall");

$app->get('/vote-get', 'App\Action\VoteAction:readOne')
->setName("vote-get");

$app->get('/vote-update/{idVote}&{upVote}&{downVote}', 'App\Action\VoteAction:update')
->setName("vote-update");

$app->get('/vote-delete/{upVote}', 'App\Action\VoteAction:delete')
->setName("vote-delete");

//research
$app->get('/search/{tag}&{option1}&{option2}&{option3}', 'App\Action\SearchAction:research')
->setName("search");

?>





