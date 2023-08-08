<?php

declare(strict_types=1);

use Slim\App;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Server\RequestHandlerInterface as RequestHandler;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Server\MiddlewareInterface as Middleware;

/*############################################
	Locale Middleware part of PerSeo CMS
        Copyright © 2019-2021 BrainStorm
*/############################################

class Locale implements Middleware
{
    protected $app;
    protected $active;
    protected $languages;

    public function __construct(App $app, bool $active, array $languages)
    {
        $this->app = $app;
	    $this->active = $active;
     	$this->languages = $languages;
    }

    public function process(Request $request, RequestHandler $handler): Response
    {
	$fulluri = (string) $request->getUri()->getPath();
	$basepath = (string) $this->app->getBasePath();
	$uri = (string) substr($fulluri, strlen($basepath));
	if (($request->getMethod() == 'GET') && ($this->active) && ($uri != '/')) {
		preg_match("/^\/(([a-zA-Z]{2})$|([a-zA-Z]{2})\/)/",$uri,$matches);
		$curlang = (!empty($matches[1]) ? preg_replace('/[^\da-zA-Z]/i', '', $matches[1]) : NULL);
		if (!empty($curlang) && in_array($curlang, $this->languages)) {
			$calcuri = ((strlen($uri) == 3) ? '/' : substr($uri, 3));
			$fulluri = (string) $basepath . $calcuri;
			$request = $request->withAttribute('locale', $curlang);
			$request = $request->withUri($request->getUri()->withPath($fulluri));
		}
		else {
			throw new \Slim\Exception\HttpNotFoundException($request);
		}
	}
        $response = $handler->handle($request);    
        return $response;
    }
}
