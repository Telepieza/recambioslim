<?php
 use Psr\Http\Message\ResponseInterface as Response;
 use Psr\Http\Message\ServerRequestInterface as Request;
 use Slim\Factory\AppFactory;

 require __DIR__ . '/../vendor/autoload.php';

 $app = AppFactory::create();

 
 $app->setBasePath("/telepiezalim/api/");

 $app->get('/', function ($request,  $response, $args) {
   $response->getBody() -> write('Pagina principal');
   return $response;
});

 try {
   $app -> run();
} catch (Exception $e) {    
    die( json_encode(array("status" => "failed", "message" => "This action is not allowed"))); 
}