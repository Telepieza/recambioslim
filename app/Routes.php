<?php

declare(strict_types=1);

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

use App\Controller\Citas;
use App\Controller\User;

return function (App $app) {

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });


    $app->group('/users', function (Group $group) {
        $group->post('/login',User\GetLogin::class);
    });

$app->group('/api',function(Group $group) {
    $group->get('/citas',Citas\GetAll::class);
    $group->get('/citas/{id}',Citas\GetOne::class);
    $group->post('/citas/new',Citas\Create::class);
    $group->put('/citas/update/{id}',Citas\Update::class);
    $group->delete('/citas/delete/{id}',Citas\Delete::class);
});

    /* con php-di bridge (inyecta directamente los parametros en la funcion */
    $app->get('/hello/{name}', function (Request $request, Response $response, array $args) {
        $name = $args['name'];
        $response->getBody()->write("Hello, $name");
        return $response;
     });
    

};
