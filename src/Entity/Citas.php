<?php 

declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

final class Citas extends BaseValidate
{

    private $tablename  = "citas";
    private $fieldid    = 'id';                
    private $field01    = 'nombre';             
    private $field02    = 'telefono';         
    private $field03    = 'horacita';          
    private $field04    = 'area';               

    private int $id;                           // id
    private string $value01;                   // field01 (nombre)
    private string $value02;                   // field02 (telefono)
    private ?DateTimeImmutable $value03;      // field03 (horacita)
    private int    $value04;                  // field04 (area)

    public function __construct(array $inputs)
    {
        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0  );  
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : '');  
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : ''); 
        $this->setvalue03(isset($inputs[$this->field03]) ? null : new DateTimeImmutable('now')); 
        $this->setvalue04(isset($inputs[$this->field04]) ? $inputs[$this->field04] : 0  );  
    }

    public function jsonSerialize(string $action):array
    {
       $arr = array();
       if ($action != $this->toTextCreate()) {
         $arr[$this->fieldid] = $this->getid();
       }
       if (trim($this->getvalue01()))  { $arr[$this->field01] = $this->getvalue01()  ; }  // string  
       if (trim($this->getvalue02()))  { $arr[$this->field02] = $this->getvalue02()  ; }  // string
       $arr[$this->field03] = $this->validateDateTimeImmutable($this->getvalue03());      // DateTimeImmutable
       $arr[$this->field04] = $this->getvalue04(); // integer

       return $arr;
    }

    public function toTable(): string
    {
        return $this->tablename;
    }

    public function toPrimaryKey(): array 
    {
        $arr[$this->field01] = $this->field01;
        return $arr;
    }

    public function toMapfields(): array 
    {
        $arr[$this->fieldid] = $this->fieldid;
        $arr[$this->field01] = $this->field01;
        $arr[$this->field02] = $this->field02;
        $arr[$this->field03] = $this->field03;
        $arr[$this->field04] = $this->field04;
        return $arr;
    }


    public function toCheckValue($action,$results)
    {
        if (isset($results[$this->field01])) {
           $this->setvalue01($this->validateString($results[$this->field01]));
           $results[$this->field01] = $this->getvalue01();
        } 
        if (isset($results[$this->field02])) {
            $this->setvalue02($this->validateString($results[$this->field02]));
            $results[$this->field02] = $this->getvalue02();
        } 

        if (isset($results[$this->field03])) 
        {
            $value = $results[$this->field03];
            if ($value instanceof DateTimeImmutable || is_null($value)) {
               $this->setvalue03($this->validateDateTimeImmutable($value));
               $value = $this->getvalue03()->format('Y-m-d H:i:s');
            } 
            else 
            {
                $value = $results[$this->field03];
            }
            $results[$this->field03] = $value;
        } 

        if ($action === $this->toTextCreate() && !isset($results[$this->field03]))
        {
             $this->setvalue03($this->validateDateTimeImmutable(null));
             $results[$this->field03] = $this->getvalue03()->format('Y-m-d H:i:s');
        } 

        if (isset($results[$this->field04]))
        {
           $this->setvalue04($this->validateInteger($results[$this->field04]));
           $results[$this->field04] = $this->getvalue04();
        } 

        if ($action === $this->toTextCreate() && !isset($results[$this->field04])) 
        {
            $this->setvalue04(0);
            $results[$this->field04] = $this->getvalue04();
        }

        return $results;
    }

    public function getid(): int
    {
        return $this->id;
    }

    public function setid($id) 
    {
        $this->id = $id;
    }

    public function getvalue01(): string
    {
        return $this->value01;
    }

    public function setvalue01($value01):self
    {
        $this->value01 = $value01;
        return $this;
    }

    public function getvalue02(): string
    {
        return $this->value02;
    }

    public function setvalue02($value02):self
    {
        $this->value02 = $value02;
        return $this;
    }

    public function getvalue03(): ?DateTimeImmutable
    {    
            return $this->value03;
    }


    public function setvalue03( $value03): self
    {
        $this->value03 = $value03; 
        return $this;
    }

    public function getvalue04(): int
    {
        return $this->value04;
    }

    public function setvalue04($value04):self
    {
        $this->value04 = $value04;
        return $this;
    }

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
