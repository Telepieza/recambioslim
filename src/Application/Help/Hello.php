<?php
 /**
  * Hello.php
  * Description: Test the route with hello
  * @Author : M.V.M.
  * @Version 1.0.5
**/
declare(strict_types=1);

namespace App\Application\Help;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;

class Hello
{
    public function __invoke(
        ServerRequestInterface $request,
        ResponseInterface $response,
        array $args = []
    ): ResponseInterface {
		if(isset($args['name']))
        {
            $name = (string)$args['name'];
        }
		else 
        {
            $host  = isset($_SERVER['HTTP_HOST']) ? $_SERVER['HTTP_HOST'] : 'Telepieza';
            $name = 'World! from ' .  $host;
        }
		   $result = ['hello' => $name];
		   $response->getBody()->write((string)json_encode($result));
           return $response->withHeader('Content-Type', 'application/json');
    }
}


 