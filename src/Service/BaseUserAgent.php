<?php
/**
  * BaseFind.php
  * Description: Principal object User Agent class of login and delete
  * @Author : M.V.M.
  * @Version 1.0.13
**/
declare(strict_types=1);

namespace App\Service;
use Psr\Http\Message\ServerRequestInterface as Request;

class BaseUserAgent
{
  protected array $agent;

  protected function getUserAgent(Request $request) {
    $this->agent       = [];
    if (is_array($request->getServerParams()) && count($request->getServerParams()) > 0) {
        foreach ($request->getServerParams() as $key => $val) {
          if (str_contains($key,'SERVER')) {
              if (str_contains($key,'ADDR') || str_contains($key,'PORT')) {
                $this->setUserAgent($key,$val);
              }
          } elseif (str_contains($key,'REQUEST'))  {
              if (str_contains($key,'SCHEME') || str_contains($key,'URI')) {
                $this->setUserAgent($key,$val);
              }
          } elseif (str_contains($key,'SCRIPT')) {
              if (str_contains($key,'NAME')) {
                $this->setUserAgent($key,$val);
              }
          } elseif (str_contains($key,'REMOTE')) {
              if (str_contains($key,'PORT')) {
                $this->setUserAgent($key,$val);
              }
          } elseif (str_contains($key,'PHP')) {
              if (str_contains($key,'SELF')) {
                $this->setUserAgent($key,$val);
              }
          }
        }
     }
  }

  private function setUserAgent($key,$value) {
    if (!is_null($value) && !empty($value))
    {
       $this->agent[$key] = $value;
    }
  }

  protected function getUserAgentURI() {
    $userIP = '';
    if (!is_null($this->agent && count($this->agent) > 0))
    {
      if ($this->agent['SERVER_ADDR'] != null) {
       $userIP = $this->agent['SERVER_ADDR'];
      }
      if ($this->agent['SERVER_PORT'] != null) {
        if (!is_null($userIP) || !is_empty($userIP)) {
           $userIP .= ':';
        }
        $userIP .= $this->agent['SERVER_PORT'];
      }
    }
    if ($this->agent['REQUEST_URI'] != null) {
      $userIP .= $this->agent['REQUEST_URI'];
    }
    return $userIP;
  }

}