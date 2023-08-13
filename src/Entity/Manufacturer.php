<?php 
/** 
  * Manufacture.php
  * Description: manufacture template
  * @Author : M.V.M
  * @Version 1.0.0
**/
declare(strict_types=1);

namespace App\Entity;


final class manufacturer extends BaseValidate
{

    private $prefix     = "oc_";
    private $tablename  = "manufacturer";
    private $fieldid    = 'manufacturer_id';                
    private $field01    = 'name';             
    private $field02    = 'image';    
    private $field03    = 'sort_order';         
    
    private int $id;                          // id
    private string $value01;                  // field01 (name)
    private string $value02;                  // field02 (image)
    private int    $value03;                  // field03 (sort_order)
   
    public function __construct(string $prefix, array $inputs)
    {
        if (!is_null($prefix) && !empty($prefix)) 
        { 
            $this->prefix = $prefix; 
        }
        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0  );  
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : '');  
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : ''); 
        $this->setvalue03(isset($inputs[$this->field03]) ? $inputs[$this->field03] : 0  );  
    }

    public function jsonSerialize(string $action):array
    {
       $arr = array();
       if ($action != $this->toTextCreate()) {
         $arr[$this->fieldid] = $this->getid();
       }
       if (trim($this->getvalue01()))  { $arr[$this->field01] = $this->getvalue01()  ; }  // string  
       if (trim($this->getvalue02()))  { $arr[$this->field02] = $this->getvalue02()  ; }  // string  
       $arr[$this->field03] = $this->getvalue03(); // integer
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
        $arr[$this->field01] = $this->field01;
        return $arr;
    }

    public function toSortOrder(): ?string
    {
        return $this->fieldid;
    }

    public function toMapfields(): array 
    {
        $arr[$this->fieldid] = $this->fieldid;
        $arr[$this->field01] = $this->field01;
        $arr[$this->field02] = $this->field02;
        $arr[$this->field03] = $this->field03;
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
       
        if (isset($results[$this->field02])) {
            $this->setvalue02($this->validateString($results[$this->field02]));
            $results[$this->field02] = $this->getvalue02();
         } 

        if (isset($results[$this->field03]))
        {
           $this->setvalue03($this->validateInteger($results[$this->field03]));
           $results[$this->field03] = $this->getvalue03();
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

    public function getvalue02(): string
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

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
