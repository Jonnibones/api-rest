<?php

require_once('vendor/autoload.php');

    $app = new Slim\App();

    $app->get('/', function(){

        require_once('vendor/App/Views/index.html');

    });

    $app->get('/api', function(){

        require_once('vendor/App/Views/api.html');

    });

    $app->get('/api/persons', function($request, $response ) use($app){

        $persons = new Controllers\Persons_service;

        $return = $response->withJson($persons->get(), 200);

        return $return;

    });


    $app->get('/api/persons/{id}', function($request, $response, $id){

        $persons = new Controllers\Persons_service;

        $route = $request->getAttribute('route');
        $id = $route->getArgument('id'); 

        if ($persons->get($id)['status'] == 'success') {

            $return = $response->withJson($persons->get($id), 200);
            return $return;
        }
        else
        {
            $return = $response->withJson($persons->get($id), 400);
            return $return;
        }
        
    }); 

    $app->post('/api/persons', function($request, $response){
       
       $persons = new Controllers\Persons_service; 

       $data = $request->getParsedBody();

       $return = $response->withJson($persons->post($data['id'], $data['email'], $data['password'], $data['name']), 202);

       return $return;
        
    });  

    $app->run();
?>