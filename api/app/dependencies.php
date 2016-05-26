<?php
// DIC configuration

$container = $app->getContainer();

// -----------------------------------------------------------------------------
// Service providers
// -----------------------------------------------------------------------------

// Twig
$container['view'] = function ($c) {
    $settings = $c->get('settings');
    $view = new Slim\Views\Twig($settings['view']['template_path'], $settings['view']['twig']);

    // Add extensions
    $view->addExtension(new Slim\Views\TwigExtension($c->get('router'), $c->get('request')->getUri()));
    $view->addExtension(new Twig_Extension_Debug());

    return $view;
};

// Flash messages
$container['flash'] = function ($c) {
    return new Slim\Flash\Messages;
};

// -----------------------------------------------------------------------------
// Service factories
// -----------------------------------------------------------------------------

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings');
    $logger = new Monolog\Logger($settings['logger']['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['logger']['path'], Monolog\Logger::DEBUG));
    return $logger;
};

// Eloquent ORM database
$container['db'] = function ($c) {
    $settings = $c->get('settings');
    $capsule = new \Illuminate\Database\Capsule\Manager();
    $capsule->addConnection($settings['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

// -----------------------------------------------------------------------------
// Action factories
// -----------------------------------------------------------------------------

$container[App\Action\HomeAction::class] = function ($c) {
    return new App\Action\HomeAction($c->get('view'), $c->get('logger'), $c->get('db'));
};

$container[App\Action\UserAction::class] = function ($c) {
    return new App\Action\UserAction($c->get('view'), $c->get('logger'), $c->get('db'));
};

$container[App\Action\CategoryAction::class] = function ($c) {
    return new App\Action\CategoryAction($c->get('view'), $c->get('logger'), $c->get('db'));
};

$container[App\Action\CommentAction::class] = function ($c) {
    return new App\Action\CommentAction($c->get('view'), $c->get('logger'), $c->get('db'));
};

$container[App\Action\SubjectAction::class] = function ($c) {
    return new App\Action\SubjectAction($c->get('view'), $c->get('logger'), $c->get('db'));
};

$container[App\Action\VoteAction::class] = function ($c) {
    return new App\Action\VoteAction($c->get('view'), $c->get('logger'), $c->get('db'));
};