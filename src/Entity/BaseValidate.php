<?php
/**
  * BaseValidate.php
  * Description: validates the fields by their format (String, Integer, Boolean, DateTime)
  * @Author : M.V.M.
  * @Version 1.0.16
**/
declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;
 
class BaseValidate {
    public function validateString($value)
    {
        if (is_null($value)) {
            $value = '';
       }
        return trim($value);
    }

    public function validateBoolean($value)
    {
       (bool) $result = false;
        if (is_bool($value))
        {
           $result = $value ? true : false;
        }
        elseif (is_numeric($value))
        {
           $result = $value === 1 ? true : false;
        }
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
       if (empty($value) || is_null($value)) {
          $value = 0;
       } else {
         if (is_string($value)) {
           $value = trim(str_replace("\"", '', $value));
           $value = trim(str_replace("'" , '', $value));
         }
       }
       if (!is_numeric($value)) {
         $result = 0;
       } else {
        $result = (int) $value;
       }
       return $result;
    }
    
    public function validateFloat($value)
    {
       if (empty($value) || is_null($value)) {
          $value = 0;
       } else {
         if (is_string($value)) {
           $value = trim(str_replace("\"", '', $value));
           $value = trim(str_replace("'" , '', $value));
         }
       }
       if (is_numeric($value) || is_integer($value) || is_float($value) ) {
        $result = (float) $value;
       } else {
        $result = 0;
       }
       return $result;
    }

    public function toTextCreate(): string
    {
        return  "create";
    }
    public function toTextUpdate(): string
    {
        return "update";
    }

    public function toTextFind(): string
    {
        return "find";
    }

    public function toTextDelete(): string
    {
        return "Delete";
    }

    public function toTextLogin(): string
    {
        return "Login";
    }

}