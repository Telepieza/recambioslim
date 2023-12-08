<?php
/**
  * BaseController.php
  * Description: Base controller for all templates
  * @Author : M.V.M.
  * @Version 1.0.5
**/
declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use App\Application\Settings\SettingsInterface;
use App\Controller\BaseParameters;
use App\Application\Middleware\Auth;

class BaseController
{
  protected ContainerInterface $container;
  protected $settings = null;
  protected BaseParameters $baseParameters;

  public function __construct(ContainerInterface $ci, LoggerInterface $logger)
  {
     $this->container = $ci;
     if (is_null($this->settings))
     {
        $this->baseParameters = new BaseParameters();
        if (isset($this->container))
        {
          $this->baseParameters->setDb($this->container->get('db'));
          $this->appConfig($this->container);
        }
      }    
      $this->baseParameters->setLogger($logger);
  }
  
  private function appConfig($container) {
     $this->baseParameters->setAppName('appName');
     $this->baseParameters->setLocale('es');
     $this->baseParameters->setDebug(false);
     $this->baseParameters->setDev('development'); 
     $this->baseParameters->setKeyToken('t2l2p3ez1');
     $this->baseParameters->setPrefix('co_');
     $this->baseParameters->setPerPage(0) ;
     $this->baseParameters->setLanguage(2) ;
     $this->baseParameters->setDomain('appDomain') ;
     $this->baseParameters->setCountry('es_ES') ;
     $this->baseParameters->setTimeZone('UTC') ;
     $this->settings = $container->get(SettingsInterface::class);
     if (!is_null($this->settings))
     {
         $config = $this->settings->get("app");
         if (isset($config['name']))
         {
           $this->baseParameters->setAppName($config['name']);
         }
         if (isset($config['locale']))
         {
           $this->baseParameters->setLocale($config['locale']);
         }
         if (isset($config['timezone']))
         {
          $this->baseParameters->setTimeZone($config['timezone']);
         }
         if (isset($config['country']))
         {
          $this->baseParameters->setCountry($config['country']);
         }
         if (isset($config['debug']))
         {
           $this->baseParameters->setDebug($config['debug']);
         }
         if (isset($config['dev']))
         {
           $this->baseParameters->setDev($config['dev']);
         }
         if (isset($config['secret']))
         {
           $this->baseParameters->setKeyToken($config['secret']);
         }
         if (isset($config['perPage']))
         {
           $this->baseParameters->setPerPage($config['perPage']);
         }
         if (isset($config['prefix']))
         {
           $this->baseParameters->setPrefix($config['prefix']);
         }
         if (isset($config['language']))
         {
          $this->baseParameters->setLanguage($config['language']);
         }
         if (isset($config['domain']))
         {
          $this->baseParameters->setDomain($config['domain']);
         }
     }
  }

 protected function getAuthUser(Request $request) {
   $auth = new Auth($request,$this->baseParameters->getKeyToken());
   $result = $auth->verifyToken();

   if ($result['code'] === 200) {
      $jsonRecord = $auth->verifyUser($this->baseParameters->getDb(),$this->baseParameters->getPrefix());
      $result = (array) json_decode($jsonRecord);
   }

   /* Sin token
      if ($result['code'] === 403) { $result['code'] = 200; }
   */

   return $result;
}

 protected function getPayload($result) {
    $payload = new BasePayLoad($result);
    if ($payload->getStatus() === 'error') {
       $this->baseParameters->getLogger()->error($this->baseParameters->getTableController() . ' ' . $payload->getCode() . ' ' . $payload->getMessage());
    }
    return $payload;
 }

  protected function jsonWithData(Response $response, BasePayLoad $payload): Response 
  {
      $json = json_encode($payload, JSON_PRETTY_PRINT);
      $response->getBody()->write($json);
      return $response
             ->withHeader('Content-Type', 'application/json')
             ->withStatus($payload->getCode());
  }

}
