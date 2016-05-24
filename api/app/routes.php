<?php

//accueil
$app->get('/', App\Action\HomeAction::class)
 	->setName("home");

//categories
$app->get('/category', App\Action\CategoryAction::class)
    ->setName("category");

//comments
$app->get('/comment-getall', 'App\Action\CommentAction:readAll')
	->setName("comment-getall");
$app->get('/comment-get', 'App\Action\CommentAction:readOne')
	->setName("comment-get");
$app->get('/comment-create', 'App\Action\CommentAction::create')
	->setName("comment-create");
$app->get('/comment-update', 'App\Action\CommentAction::update')
	->setName("comment-update");
$app->get('/comment-delete', 'App\Action\CommentAction::delete')
	->setName("comment-delete");

//subjects
$app->get('/subject', App\Action\SubjectAction::class)
	->setName("subject");

//users
$app->get('/user-getAll', 'App\Action\UserAction:readAll')
	->setName("user");
$app->get('/user-get', 'App\Action\UserAction:readOne')
	->setName("user");
$app->get('/user-delete/{pseudoUser}', 'App\Action\UserAction:delete')
	->setName("user");

//vote
$app->get('/vote', App\Action\VoteAction::class)
	->setName("vote");



?>