<?php

    header('Content-Type: application\json; charset=utf-8');

    require_once('vendor/autoload.php');

    use Slim\Slim;

    $app = new Slim();

    $app->get('/', function(){

        require_once('vendor/App/Views/index.html');

    });

    $app->get('/api', function(){

        require_once('vendor/App/Views/api.html');

    });

    $app->get('/api/persons', function(){

        $persons = new Controllers\Persons_service;

        echo $persons->get();

    });

    
    $app->get('/api/persons/:id', function($id){

        $persons = new Controllers\Persons_service;

        echo $persons->get($id);

    });
    
    $app->run();
?>