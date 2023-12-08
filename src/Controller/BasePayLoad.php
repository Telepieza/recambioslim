<?php
/**
  * BasePayLoad.php
  * Description: Base payload for all templates
  * @Author : M.V.M.
  * @Version 1.0.10
**/
declare(strict_types=1);

namespace App\Controller;

use JsonSerializable;

class BasePayLoad implements JsonSerializable
{
    private string $status;
    private $message;
    private int $code;
    private int $count;
    private string $token;
    private string $pagination;

    public function __construct($result )
    {
        $this->setStatus(isset($result['status'])    ? $result['status']  : '');
        $this->setCode(isset($result['code'])        ? $result['code']    : 0 );
        $this->setCount(isset($result['count'])      ? $result['count']   : 0 );
        $this->setToken(isset($result['token'])      ? $result['token']   : '' );
        $this->setMessage(isset($result['message'])  ? $result['message'] : '' );
        $this->setPagination(isset($result['pagination']) ? $result['pagination'] : '' );
    }

    public function getStatus(): string
    {
        return $this->status;
    }
    public function setStatus($status)
    {
        $this->status = $status;
    }

    public function getCode(): int
    {
        return $this->code;
    }
    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCount(): int
    {
        return $this->count;
    }
    public function setCount($count)
    {
        $this->count = $count;
    }

    public function getMessage()
    {
        return $this->message;
    }
    public function setMessage($message)
    {
        $this->message = $message;
    }

    public function getToken()
    {
        return $this->token;
    }
    public function setToken($token)
    {
        $this->token = $token;
    }

    public function getPagination()
    {
        return $this->pagination;
    }
    public function setPagination($pagination)
    {
        $this->pagination = $pagination;
    }

    public function jsonSerialize()
    {
        $payload = [
            'status' => $this->getCode(),
        ];
        if (!empty(trim($this->getToken()))) {
            $this->setstatus('token');
            $payload[$this->getstatus()] = trim($this->getToken());
        }
        else
        {
            if (!empty(trim($this->getPagination())))
            {
                $payload['pagination'] = json_decode($this->getPagination());
            }

            if (is_null($this->getstatus() && is_array($this->getMessage())))
            {
               $this->setstatus('data');
            } 
            elseif (is_null($this->getstatus() && !is_array($this->getMessage())))
            {
                $this->setstatus('info');
            }

            if ($this->getMessage() !== null)
            {
               $payload[$this->getstatus()] = $this->getMessage();
            }
        }
        return $payload;
    }

}
