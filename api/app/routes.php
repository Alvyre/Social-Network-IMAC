<?php
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;
// Routes
$app->get('/hello/{name}', function (Request $request, Response $response) {
    $name = $request->getAttribute('name');
    $response->getBody()->write("Hello, $name ssoulet");

    return $response;
});

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
$app->get('/user', 'App\Action\UserAction:readAll')
	->setName("user");
// afficher tous les votes
$app->get('/voteAll', App\Action\VoteAction::readAll())
	->setName("voteAll");

?>