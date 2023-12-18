<?php
/**
  * Customer_approval.php
  * Description: Customer_approval template
  * @Author : M.V.M.
  * @Version 1.0.16
**/
declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

final class Customer_approval extends BaseValidate
{
    private $prefix     = "oc_";
    private $tablename  = "customer_approval";
    private $fieldid    = 'customer_approval_id';
    private $field00    = 'NoPrimaryKey';
    private $field01    = 'customer_id';
    private $field02    = 'type';
    private $field03    = 'date_added';

    private bool   $isAutoIncrement = true;   // index id auto_increment
    private int    $id;                       // id
    private int    $value01;                  // field01 (customer_id)
    private string $value02;                  // field02 (type)
    private ?DateTimeImmutable $value03;      // field03 (date_added)

    public function __construct(string $prefix, array $inputs)
    {
        if (!is_null($prefix) && !empty($prefix))
        {
            $this->prefix = $prefix;
        }
        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0  );
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : 0 );
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : '' );
        $this->setvalue03(isset($inputs[$this->field03]) ? null : new DateTimeImmutable('now'));
    }

    public function jsonSerialize(string $action):array
    {
       $arr = array();
       if ($action != $this->toTextCreate()) {
          $arr[$this->fieldid] = $this->getid();
      }
       $arr[$this->field01] = $this->getvalue01();                                        // integer
       if (trim($this->getvalue02()))  { $arr[$this->field02] = $this->getvalue02()  ; }  // string
       $arr[$this->field03] = $this->validateDateTimeImmutable($this->getvalue03());      // DateTimeImmutable
       return $arr;
    }

    public function toTable(): string
    {
        return $this->prefix . $this->tablename;
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

        if (isset($results[$this->field01]))
        {
           $this->setvalue01($this->validateInteger($results[$this->field01]));
           $results[$this->field01] = $this->getvalue01();
        }
       
        if (isset($results[$this->field02]))
        {
           $this->setvalue02($this->validateString($results[$this->field02]));
           $results[$this->field02] = $this->getvalue02();
        }

        if ($action === 'create' &&  isset($results[$this->field03]))
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

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
