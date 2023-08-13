<?php 
/** 
  * Category.php
  * Description: category template
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

final class Category extends BaseValidate
{

    private $prefix     = "oc_";
    private $tablename  = "category";
    private $fieldid    = 'category_id';                
    private $field00    = 'NoPrimaryKey';
    private $field01    = 'image';             
    private $field02    = 'parent_id';         
    private $field03    = 'top';          
    private $field04    = 'column';  
    private $field05    = 'sort_order';   
    private $field06    = 'status';   
    private $field07    = 'date_added'; 
    private $field08    = 'date_modified';             

    private int $id;                          // id
    private string $value01;                  // field01 (image)
    private int    $value02;                  // field02 (parent_id)
    private int    $value03;                  // field03 (top)
    private int    $value04;                  // field04 (colum)
    private int    $value05;                  // field05 (sort_order)
    private int    $value06;                  // field06 (status)
    private ?DateTimeImmutable $value07;      // field07 (date_added)
    private ?DateTimeImmutable $value08;      // field08 (date_modified)

    public function __construct(string $prefix, array $inputs)
    {
        if (!is_null($prefix) && !empty($prefix)) 
        { 
            $this->prefix = $prefix; 
        }

        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0  );  
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : '');  
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : 0); 
        $this->setvalue03(isset($inputs[$this->field03]) ? $inputs[$this->field03] : 0  );  
        $this->setvalue04(isset($inputs[$this->field04]) ? $inputs[$this->field04] : 0  );  
        $this->setvalue05(isset($inputs[$this->field05]) ? $inputs[$this->field05] : 0  );  
        $this->setvalue06(isset($inputs[$this->field06]) ? $inputs[$this->field06] : 0  );  
        $this->setvalue07(isset($inputs[$this->field07]) ? null : new DateTimeImmutable('now')); 
        $this->setvalue08(isset($inputs[$this->field08]) ? null : new DateTimeImmutable('now')); 
    }

    public function jsonSerialize(string $action):array
    {
       $arr = array();
       if ($action != $this->toTextCreate()) {
          $arr[$this->fieldid] = $this->getid();
      }
       if (trim($this->getvalue01()))  { $arr[$this->field01] = $this->getvalue01()  ; }  // string  
       $arr[$this->field02] = $this->getvalue02(); // integer
       $arr[$this->field03] = $this->getvalue03(); // integer
       $arr[$this->field04] = $this->getvalue04(); // integer
       $arr[$this->field05] = $this->getvalue05(); // integer
       $arr[$this->field06] = $this->getvalue06(); // integer
       $arr[$this->field07] = $this->validateDateTimeImmutable($this->getvalue07());      // DateTimeImmutable
       $arr[$this->field08] = $this->validateDateTimeImmutable($this->getvalue08());      // DateTimeImmutable
       return $arr;
    }

    public function toTable(): string
    {
        $tableDB = $this->prefix . $this->tablename;
        return $tableDB;
    }

    public function toTableName(): string
    {
        return $this->tablename;
    }

    public function getFieldsId(): string 
    {
        return $this->fieldid;
    }

    public function toPrimaryKey(): ?array 
    {
        $arr[$this->field00] = $this->field00;
        return $arr;
    }

    public function toSortOrder(): string 
    {
        return $this->fieldid;
    }

    public function toMapfields(): array 
    {
        $arr[$this->fieldid] = $this->fieldid;
        $arr[$this->field01] = $this->field01;
        $arr[$this->field02] = $this->field02;
        $arr[$this->field03] = $this->field03;
        $arr[$this->field04] = $this->field04;
        $arr[$this->field05] = $this->field05;
        $arr[$this->field06] = $this->field06;
        $arr[$this->field07] = $this->field07;
        $arr[$this->field08] = $this->field08;
        return $arr;
    }

    public function toCheckValue($action,$results)
    {

        if (isset($results[$this->fieldid]))
        {
            $this->setid($this->validateInteger($results[$this->fieldid]));
            $results[$this->fieldid] = $this->getid();
        } 

        if (isset($results[$this->field01])) {
           $this->setvalue01($this->validateString($results[$this->field01]));
           $results[$this->field01] = $this->getvalue01();
        } 
       
        if (isset($results[$this->field02]))
        {
           $this->setvalue02($this->validateInteger($results[$this->field02]));
           $results[$this->field02] = $this->getvalue02();
        } 

        if (isset($results[$this->field03]))
        {
           $this->setvalue03($this->validateInteger($results[$this->field03]));
           $results[$this->field03] = $this->getvalue03();
        } 

        if (isset($results[$this->field04]))
        {
           $this->setvalue04($this->validateInteger($results[$this->field04]));
           $results[$this->field04] = $this->getvalue04();
        } 

        if (isset($results[$this->field05]))
        {
           $this->setvalue05($this->validateInteger($results[$this->field05]));
           $results[$this->field05] = $this->getvalue05();
        } 

        if (isset($results[$this->field06]))
        {
           $this->setvalue06($this->validateInteger($results[$this->field06]));
           $results[$this->field06] = $this->getvalue06();
        } 

        if ($action === 'create') {
           if (isset($results[$this->field07])) 
           {
               $value = $results[$this->field07];
               if ($value instanceof DateTimeImmutable || is_null($value)) {
                  $this->setvalue07($this->validateDateTimeImmutable($value));
                  $value = $this->getvalue07()->format('Y-m-d H:i:s');
               } 
               else 
               {
                   $value = $results[$this->field07];
               }
               $results[$this->field07] = $value;
            }
        } 

        if ($action === 'update') {
          if (isset($results[$this->field08])) 
          {
              $value = $results[$this->field08];
              if ($value instanceof DateTimeImmutable || is_null($value)) {
                 $this->setvalue08($this->validateDateTimeImmutable($value));
                 $value = $this->getvalue08()->format('Y-m-d H:i:s');
              } 
              else 
              {
                  $value = $results[$this->field08];
              }
              $results[$this->field08] = $value;
           } 
        }
        return $results;
    }

    public function getid(): int
    {
        return $this->id;
    }

    public function setid($id):self 
    {
        $this->id = $id;
        return $this;
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

    public function getvalue02(): int
    {
        return $this->value02;
    }

    public function setvalue02($value02):self
    {
        $this->value02 = $value02;
        return $this;
    }

    public function getvalue03(): int
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

    public function getvalue05(): int
    {
        return $this->value05;
    }

    public function setvalue05($value05):self
    {
        $this->value05 = $value05;
        return $this;
    }

    public function getvalue06(): int
    {
        return $this->value06;
    }

    public function setvalue06($value06):self
    {
        $this->value06 = $value06;
        return $this;
    }

    public function getvalue07(): ?DateTimeImmutable
    {    
            return $this->value07;
    }

    public function setvalue07( $value07): self
    {
        $this->value07 = $value07; 
        return $this;
    }


    public function getvalue08(): ?DateTimeImmutable
    {    
            return $this->value08;
    }

    public function setvalue08( $value08): self
    {
        $this->value08 = $value08; 
        return $this;
    }

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
