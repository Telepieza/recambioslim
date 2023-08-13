<?php 
/** 
  * BaseParameter.php
  * Description: Base parameter for all templates
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use PDO;
class BaseParameters {
    protected bool  $debug;
    protected string $locale;
    protected ?string $appName = null;
    protected ?string $keyToken = null;
    protected int $perPage = 0;
    protected ?string $dev = null;
    protected ?string $tableController = null;
    protected ?string $prefix = null;
    protected int $language = 0;
    protected ?string $domain = null;
    protected ?string $timeZone = null;
    protected ?string $country = null;

    protected PDO $db;
    protected LoggerInterface $logger;

    public function getAppName() : string
    {
      return $this->appName;
    }
    public function setAppName(string $appName) 
    {
        $this->appName = $appName;
    }

    public function getLocale() : string
    {
      return $this->locale;
    }
    public function setLocale(string $locale) 
    {
        $this->locale = $locale;
    }

    public function getDebug() : bool 
    {
      return $this->debug;
    }
    public function setDebug(bool $debug) 
    {
        $this->debug = $debug;
    }

    public function getKeyToken() : string
    {
      return $this->keyToken;
    }
    public function setKeyToken(string $keyToken) 
    {
        $this->keyToken = $keyToken;
    }

    public function getDev() : string
    {
      return $this->dev;
    }
    public function setDev(string $dev) 
    {
        $this->dev = $dev;
    }

    public function getPerPage() : int
    {
      return $this->perPage;
    }
    public function setPerPage(int $perPage) 
    {
        $this->perPage = $perPage;
    }

    public function getPrefix() : string
    {
      return $this->prefix;
    }
    public function setPrefix(string $prefix) 
    {
        $this->prefix = $prefix;
    }

    public function getLanguage() : int
    {
      return $this->language;
    }
    public function setLanguage(int $language) 
    {
        $this->language = $language;
    }

    public function getDomain() : string
    {
      return $this->domain;
    }

    public function setDomain(string $domain) 
    {
        $this->domain = $domain;
    }
    public function getTimeZone() : string
    {
      return $this->timeZone;
    }
    public function setTimeZone(string $timeZone) 
    {
        $this->timeZone = $timeZone;
    }

    public function getCountry() : string
    {
      return $this->country;
    }
    public function setCountry(string $country) 
    {
        $this->country = $country;
    }

    public function getDb() : PDO 
    {
        return $this->db;
    }
    public function setDb(PDO $db) 
    {
        $this->db = $db;
    }

    public function getLogger() : LoggerInterface
    {
        return $this->logger;
    }
    public function setLogger(LoggerInterface $logger) 
    {
        $this->logger = $logger;
    }

    public function getTableController() {
       if (is_null($this->tableController)) {
           $this->settableController('undefined');
       }
       return $this->tableController;
    }

    public function setTableController(string $tableController) 
    {
        $this->tableController = $tableController;
    }

}
