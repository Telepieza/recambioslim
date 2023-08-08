<?php

declare(strict_types=1);

use App\Application\Handlers\HttpErrorHandler;
use App\Application\Handlers\ShutdownHandler;
use App\Application\Settings\SettingsInterface;
use DI\ContainerBuilder;
use Slim\Factory\AppFactory;
use Slim\Factory\ServerRequestCreatorFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;


require __DIR__ . '/../vendor/autoload.php';

// require __DIR__ . '/../app/Slim-helper.php';

if (!ini_get('date.timezone')) {
   date_default_timezone_set('UTC');
}

/* Variables $_SERVER */
require_once __DIR__ . '/../app/Dotenv.php';

$containerBuilder = new ContainerBuilder();
// Set up settings
$settings = require __DIR__ . '/../app/Config/Settings.php';
$settings($containerBuilder);

// Set up logger
$logger = require __DIR__ . '/../app/Logger.php';
$logger($containerBuilder);

// Services 
 $services = require __DIR__ . '/../app/Services.php';
 $services($containerBuilder);

 // Views
$views     = require __DIR__ . '/../app/Config/Views.php';
$views($containerBuilder);

// Build PHP-DI Container instance
$container = $containerBuilder->build();

// Instantiate the app
AppFactory::setContainer($container);

$app = AppFactory::create();

$callableResolver = $app->getCallableResolver();

$container = $app->getContainer();

// DataBase Mysql 
require __DIR__ . '/../app/Config/Dependencies.php';


// Create App
$app = AppFactory::create();

// Register routes
$routes = require __DIR__ . '/../app/Routes.php';

$routes($app);

/** SettingsInterface $settings */
 $settings = $container->get(SettingsInterface::class);


// Create Request object from globals
   $serverRequestCreator = ServerRequestCreatorFactory::create();
   $request = $serverRequestCreator->createServerRequestFromGlobals();

// Create Error Handler
   $responseFactory = $app->getResponseFactory();
   $errorHandler = new HttpErrorHandler($callableResolver, $responseFactory);

// Create Shutdown Handler
  $shutdownHandler = new ShutdownHandler($request, $errorHandler, $settings->get('displayErrorDetails'));
  register_shutdown_function($shutdownHandler);

// Add Routing Middleware
   $app->addRoutingMiddleware();

// Add Body Parsing Middleware
   $app->addBodyParsingMiddleware();

// Add Error Middleware
 
   $errorMiddleware = $app->addErrorMiddleware($settings->get('displayErrorDetails'), $settings->get('logError'), $settings->get('logErrorDetails'));
   $errorMiddleware->setDefaultErrorHandler($errorHandler);

  // Run App
  $app->run();
