<?php
/** 
* GetScheme.php
* Description: language read structure and schemas.
* @Author : M.V.M
* @Version
**/
declare(strict_types=1);

namespace App\Controller\Language;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;
use Symfony\Component\Yaml\Yaml;

final class GetScheme
{
    private $view;
    public function __construct(Twig $twig)
    {
        $this->view = $twig;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response): ResponseInterface{
         $yamlFile = __DIR__ .'/../../../resources/docs/schemas/Language.yaml'; 
         $viewData = [
             'spec' => json_encode(Yaml::parseFile($yamlFile)),
        ];
         return $this->view->render($response, 'docs/swagger.twig', $viewData);
    }
}