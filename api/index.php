<?php

    require_once('routing.php');

    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, PUSH, DELETE');

    //Permet d'include les classes depuis le controller directement sans avoir à cité le controller
    function __autoload($class_name){
        require_once 'Controllers/'.$class_name . '.php';
    }

    $routing = new ROUTING();
    $route = $routing->getRoute();
    $root = $routing->getRoot();
    $parameter = $routing->getParameter();

    //Class Manager or route
    include($route);


?>