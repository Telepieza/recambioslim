<?php 

declare(strict_types=1);

namespace App\Controller;

use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use App\Application\Settings\SettingsInterface;
use App\Application\Middleware\Auth;
use PDO;

class BaseController 
{
   protected $container;
   protected $db;
   protected LoggerInterface $logger;
   protected bool   $debug;
   protected string $locale;
   protected ?string $appName = null;
   protected ?string $keyToken = null;
   protected int $perPage = 0;
   protected ?string $dev = null;
   protected ?string $tableController = null;
   protected $settings = null; 

   public function __construct(ContainerInterface $ci, LoggerInterface $logger) {
      $this->container = $ci;
      if (isset($this->container) && !isset($this->db)) {
          $this->db = $this->container->get('db');
      }
    
      if (is_null($this->appName) || is_null($this->settings)) {
          $this->appConfig($this->container);    
      }
      $this->logger = $logger;
   }

   private function appConfig($container) {
      $this->appName   = 'appName';  
      $this->locale    = 'es';  
      $this->debug     = false;
      $this->dev       = 'development'; 
      $this->keyToken  = 't2l2p3ez1';   
      if (is_null($this->settings)) 
      {
         $this->settings = $container->get(SettingsInterface::class);
      }
      
      if (!is_null($this->settings)) 
      {
          $config = $this->settings->get("app");
          if (isset($config['name']))
          {
            $this->appName = $config['name'];
          }
          if (isset($config['locale'])) 
          {
            $this->locale = $config['locale'];
          }
          if (isset($config['debug'])) 
          {
            $this->debug = $config['debug'];
          }
          if (isset($config['dev']))
          {
            $this->dev = $config['dev'];
          }
          if (isset($config['secret'])) 
          {
            $this->keyToken = $config['secret'];
          }
          if (isset($config['perpage'])) 
          {
            $this->perPage = $config['perpage'];
          }
      }
   }

   protected function setTableController(string $tableController) {
     $this->tableController = $tableController;
   }

   protected function getTableController() {
    if (is_null($this->tableController)) {
        $this->settableController('undefined');
    }
    return $this->tableController;
  }

  protected function getDebug() : bool 
  {
    return $this->debug;
  }

  protected function getLogger() 
  {
    return $this->logger;
  }

  protected function getDb() : PDO
  {
    return $this->db;
  }

  protected function getKeyToken() : string
  {
    return $this->keyToken;
  }

  protected function getDev() : string
  {
    return $this->dev;
  }

  protected function getPerPage() : int
  {
    return $this->perPage;
  }

  protected function getAuthUser(Request $request) {
    $auth = new Auth($request,$this->getKeyToken());
    $result = $auth->verifyToken();        
    if ($result['code'] === 200) {
       $jsonRecord = $auth->verifyUser($this->getDb());
       $result = (array) json_decode($jsonRecord);
    } 
    return $result;
 }

  protected function getPayload($result) {
     $payload = new BasePayload($result);
     if ($payload->getStatus() === 'Error') {
          $this->logger->error($this->getTableController() . ' ' . $payload->getCode() . ' ' . $payload->getMessage());
     }
     return $payload;
  }

   protected function jsonWithData(Response $response, BasePayload $payload): Response 
   {
       $json = json_encode($payload, JSON_PARTIAL_OUTPUT_ON_ERROR);
       $response->getBody()->write($json);
       return $response
              ->withHeader('Content-Type', 'application/json')
              ->withStatus($payload->getCode());
   }

}
