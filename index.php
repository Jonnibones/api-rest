<?php

    require_once('vendor/autoload.php');

    $app = new Slim\App();


    $app->get('/', function(){

        require_once('vendor/App/Views/index.html');

    });

    $app->get('/api', function(){

        require_once('vendor/App/Views/api.html');

    });

    $app->get('/api/persons', function($request, $response){

        $persons = new Controllers\Persons_service;

        $return = $response->withJson($persons->get(), 200);

        return $return;

    });


    $app->get('/api/persons/{id}', function($request, $response, $args){

        $persons = new Controllers\Persons_service;

        $route = $request->getAttribute('route');
        $args = $route->getArgument('id'); 

        if ($persons->get($args)['status'] == 'success') {

            $return = $response->withJson($persons->get($args), 200);
            return $return;
        }
        else
        {
            $return = $response->withJson($persons->get($args), 404);
            return $return;
        }
        
    }); 

    $app->post('/api/persons', function($request, $response){
       
       $persons = new Controllers\Persons_service; 

       $data = $request->getParsedBody();

       $result = $persons->post($data['email'], $data['password'], $data['name']);

       if ($result['status'] == 'success') {
           $return = $response->withJson($result, 201);
       }
       else
       {
           $return = $response->withJson($result, 406);
       }

       return $return;
       
    });  

    $app->put('/api/persons', function($request, $response){
       
        $persons = new Controllers\Persons_service; 
 
        $data = $request->getParsedBody();
 
        $return = $response->withJson($persons->put($data['id'], $data['email'], $data['password'], $data['name']), 201);
 
        return $return;
         
     });  

     $app->delete('/api/persons', function($request, $response){
       
        $persons = new Controllers\Persons_service; 
 
        $data = $request->getParsedBody();
 
        $return = $response->withJson($persons->delete($data['id'], 200));
 
        return $return;
         
     });  



    $app->run();
?>