<?php
/**
  * BaseParameter.php
  * Description: Base parameter for all templates
  * @Author : M.V.M.
  * @Version 1.0.16
**/
declare(strict_types=1);

namespace App\Controller;

use Psr\Log\LoggerInterface;
use PDO;
use PHPMailer\PHPMailer\PHPMailer;

class BaseParameters {
    protected bool    $debug    = false;
    protected ?string $locale   = null;
    protected ?string $appName  = null;
    protected ?string $appProduct = null;
    protected ?string $keyToken = null;
    protected int     $perPage  = 0;
    protected ?string $dev      = null;
    protected ?string $tableController = null;
    protected ?string $prefix   = null;
    protected int     $language = 0;
    protected ?string $country  = null;
    protected ?string $domain   = null;
    protected ?string $timeZone = null;
    protected bool    $ismail   = false;

    protected PDO             $db;
    protected LoggerInterface $logger;
    protected PHPMailer       $mailer;

    public function getAppName() : string
    {
      return $this->appName;
    }
    public function setAppName(string $appName)
    {
        $this->appName = $appName;
    }

    public function getAppProduct() : string
    {
      return $this->appProduct;
    }
    public function setAppProduct(string $appProduct)
    {
        $this->appProduct = $appProduct;
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

    public function getIsmail() : bool
    {
      return $this->ismail;
    }

    public function setIsmail(bool $ismail)
    {
      $this->ismail = $ismail;
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

    public function getMailer() : PHPMailer
    {
        return $this->mailer;
    }
    public function setMailer(PHPMailer $mailer)
    {
        $this->mailer = $mailer;
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
