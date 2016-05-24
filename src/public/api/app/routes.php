<?php

// Routes

//accueil
$app->get('/', App\Action\HomeAction::class)
 	->setName("home");

//all datas -> test
//categories
$app->get('/category', App\Action\CategoryAction::class)
    ->setName("category");
//comments
$app->get('/comment', App\Action\CommentAction::class)
	->setName("comment");
//subjects
$app->get('/subject', App\Action\SubjectAction::class)
	->setName("subject");
//users
$app->get('/user', App\Action\UserAction::class)
	->setName("user");
// afficher tous les votes
$app->get('/voteAll', App\Action\VoteAction::readAll())
	->setName("voteAll");

?>