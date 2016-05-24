<?php

// Routes

//accueil
$app->get('/', App\Action\HomeAction::class)
 	->setName("home");

//all datas -> test
//categories
$app->get('/', App\Action\CategoryAction::class)
    ->setName("home");
//comments
$app->get('/', App\Action\CommentAction::class)
	->setName("home");
//subjects
$app->get('/', App\Action\SubjectAction::class)
	->setName("home");
//users
$app->get('/', App\Action\UserAction::class)
	->setName("home");
//vote
$app->get('/', App\Action\VoteAction::class)

   



?>