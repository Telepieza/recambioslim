<?php 

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
 
class BaseValidate {
    public function validateString($value)
    {
        if (is_null($value)) {
            $value = '';
       }
        $result = trim($value);
        return $result;
    }

    public function validateDateTimeImmutable($value)
    {
    
        $result = $value;
        if (!$result instanceof DateTimeImmutable) 
        {
           $result = (new DateTimeImmutable('now'));
        }
        if (is_null($result)) {
            $result =  (new DateTimeImmutable('now'));
        }
        return $result;
    }
  
    public function validateInteger($value)
    {
       $result = $value;
       if (empty($result) || is_null($result)) {
          $result = 0;
       } 

       if (!is_numeric($result)) {
         $result = 0;
       }

       if (!is_int($result)) {
          $result = 0;
       }

       return $result;
    }

    public function toTextCreate(): string
    {
        $textCreate = "create";
        return $textCreate;
    }
    public function toTextUpdate(): string
    {
        $textUpdate = "update";
        return $textUpdate;
    }

    public function toTextFind(): string
    {
        $textUpdate = "find";
        return $textUpdate;
    }

    public function toTextDelete(): string
    {
        $textDelete = "Delete";
        return $textDelete;
    }

    public function toTextLogin(): string
    {
        $textLogin = "Login";
        return $textLogin;
    }

}
