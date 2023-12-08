<?php
/**
  * custom_field.php
  * Description: custom_field template
  * @Author : M.V.M.
  * @Version 1.0.9
**/
declare(strict_types=1);

namespace App\Entity;

final class Custom_field extends BaseValidate {

    private $prefix     = "oc_";
    private $tablename  = "custom_field";
    private $fieldid    = 'custom_field_id';
    private $field00    = 'NoPrimaryKey';
    private $field01    = 'type';
    private $field02    = 'value';
    private $field03    = 'validation';
    private $field04    = 'location';
    private $field05    = 'status';
    private $field06    = 'sort_order';

    private bool   $isAutoIncrement = true;   // index id auto_increment
    private int    $id;                       // id
    private string $value01;                  // field01 (type)
    private string $value02;                  // field02 (value)
    private string $value03;                  // field03 (validation)
    private string $value04;                  // field04 (location)
    private int    $value05;                  // field05 (status)
    private int    $value06;                  // field06 sort_order)

    public function __construct(string $prefix, array $inputs)
    {
        if (!is_null($prefix) && !empty($prefix))
        {
            $this->prefix = $prefix;
        }

        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0 );
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : '' );
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : '' );
        $this->setvalue03(isset($inputs[$this->field03]) ? $inputs[$this->field03] : '' );
        $this->setvalue04(isset($inputs[$this->field04]) ? $inputs[$this->field04] : '' );
        $this->setvalue05(isset($inputs[$this->field05]) ? $inputs[$this->field05] : 0 );
        $this->setvalue06(isset($inputs[$this->field06]) ? $inputs[$this->field06] : 0 );
    }

    public function jsonSerialize(string $action):array
    {
       $arr = array();
       if ($action != $this->toTextCreate()) {
          $arr[$this->fieldid] = $this->getid();
      }
       if (trim($this->getvalue01()))  { $arr[$this->field01] = $this->getvalue01()  ; }  // string
       if (trim($this->getvalue02()))  { $arr[$this->field02] = $this->getvalue02()  ; }  // string
       if (trim($this->getvalue03()))  { $arr[$this->field03] = $this->getvalue03()  ; }  // string
       if (trim($this->getvalue04()))  { $arr[$this->field04] = $this->getvalue04()  ; }  // string
       $arr[$this->field05] = $this->getvalue05();                                        // integer
       $arr[$this->field06] = $this->getvalue06();                                        // integer
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

    public function isKeyAutoIncrement(): bool
    {
        return $this->isAutoIncrement;
    }

    public function toPrimaryKey(): ?array
    {
        $arr[$this->field00] = $this->field00;
        return $arr;
    }

    public function toSecundaryKey(): ?array
    {
        return null;
    }

    public function toSortOrder(): string
    {
        return $this->field06;
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
        return $arr;
    }

    public function toCheckValue($action,$results)
    {

        if (isset($results[$this->fieldid]))
        {
            $this->setid($this->validateInteger($results[$this->fieldid]));
            $results[$this->fieldid] = $this->getid();
        }
    
        if (isset($results[$this->field01]))
        {
           $this->setvalue01($this->validateString($results[$this->field01]));
           $results[$this->field01] = $this->getvalue01();
        }
       
        if (isset($results[$this->field02]))
        {
            $this->setvalue02($this->validateString($results[$this->field02]));
           $results[$this->field02] = $this->getvalue02();
        }

        if (isset($results[$this->field03]))
        {
           $this->setvalue03($this->validateString($results[$this->field03]));
           $results[$this->field03] = $this->getvalue03();
        }

        if (isset($results[$this->field04])) {
            $this->setvalue04($this->validateString($results[$this->field04]));
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

    public function getvalue03(): string
    {
            return $this->value03;
    }

    public function setvalue03( $value03): self
    {
        $this->value03 = $value03;
        return $this;
    }

    public function getvalue04(): string
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
    
    
    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
