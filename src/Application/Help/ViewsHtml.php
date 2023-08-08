<?php

declare(strict_types=1);

namespace App\Application\Help;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

final class ViewsHtml
{
    /**
     * @var view
     */
    private $view;
    public function __construct(Twig $twig)
    {
        $this->view = $twig;
    }

    public function __invoke(ServerRequestInterface $request, ResponseInterface $response, $args): ResponseInterface{
         $name = $args['name'] ?? 'world';
         return $this->view->render($response, '/layouts/home.html', ['name' => $name]);
    }
}