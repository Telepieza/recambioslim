<?php
/**
* GetScheme.php
* Description: custom_field read structure and schemas.
* @Author : M.V.M.
* @Version 1.0.10
**/
declare(strict_types=1);

namespace App\Controller\Custom_field;

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
         $yamlFile = __DIR__ .'/../../../resources/docs/schemas/custom_field.yaml';
         $viewData = [
             'spec' => json_encode(Yaml::parseFile($yamlFile)),
        ];
         return $this->view->render($response, 'docs/swagger.twig', $viewData);
    }
}