<?php
/**
  * Customer_group.php
  * Description: Customer_group template
  * @Author : M.V.M.
  * @Version 1.0.9
**/
declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

final class Customer_group extends BaseValidate
{

    private $prefix     = "oc_";
    private $tablename  = "customer_group";
    private $fieldid    = 'customer_group_id';
    private $field00    = 'NoPrimaryKey';
    private $field01    = 'approval';
    private $field02    = 'sort_order';

    private bool   $isAutoIncrement = true;   // index id auto_increment
    private int    $id;                       // id
    private int    $value01;                  // field01 (approval)
    private int    $value02;                  // field02 (sort_order)
 
    public function __construct(string $prefix, array $inputs)
    {
        if (!is_null($prefix) && !empty($prefix))
        {
            $this->prefix = $prefix;
        }

        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0  );
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : 0  );
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : 0  );
    }

    public function jsonSerialize(string $action):array
    {
       $arr = array();
       if ($action != $this->toTextCreate()) {
          $arr[$this->fieldid] = $this->getid();
      }
       $arr[$this->field01] = $this->getvalue01();                                        // integer
       $arr[$this->field02] = $this->getvalue02();                                        // integer
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
        return $this->field02;
    }

    public function toMapfields(): array
    {
        $arr[$this->fieldid] = $this->fieldid;
        $arr[$this->field01] = $this->field01;
        $arr[$this->field02] = $this->field02;
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
           $this->setvalue01($this->validateInteger($results[$this->field01]));
           $results[$this->field01] = $this->getvalue01();
        }
       
        if (isset($results[$this->field02]))
        {
           $this->setvalue02($this->validateInteger($results[$this->field02]));
           $results[$this->field02] = $this->getvalue02();
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

    public function getvalue01(): int
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

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
