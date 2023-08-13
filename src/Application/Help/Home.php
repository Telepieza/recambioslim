<?php
 /** 
  * Home.php
  * Description: working on the page
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Application\Help;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use Symfony\Component\Yaml\Yaml;

final class Home
{
    /**
     * @var view
     */
    private $view;
    public function __construct(Twig $twig)
    {
        $this->view = $twig;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface{
         $yamlFile = __DIR__ .'/../../../resources/docs/schemas/category.yaml'; 
         $viewData = [
             'spec' => json_encode(Yaml::parseFile($yamlFile)),
        ];
         return $this->view->render($response, 'docs/swagger.twig', $viewData);
    }
}