<?php
/**
  * ProductDescription.php
  * Description: product Description template
  * @Author : M.V.M.
  * @Version 1.0.11
  * 
**/
declare(strict_types=1);

namespace App\Entity;

final class ProductDescription extends BaseValidate
{

    private $prefix     = "oc_";
    private $tablename  = "product_description";
    private $fieldid    = 'product_id';
    private $field01    = 'language_id';
    private $field02    = 'name';
    private $field03    = 'description';
    private $field04    = 'tag';
    private $field05    = 'meta_title';
    private $field06    = 'meta_description';
    private $field07    = 'meta_keyword';

    private bool   $isAutoIncrement = false;  // index id auto_increment
    private int    $id;                       // id
    private int    $value01;                  // field01 (language_id)
    private string $value02;                  // field02 (name)
    private string $value03;                  // field03 (description)  text html
    private string $value04;                  // field04 (tag)
    private string $value05;                  // field04 (meta_title)
    private string $value06;                  // field05 (meta_description)
    private string $value07;                  // field06 (meta_keyword)

    public function __construct(string $prefix, array $inputs)
    {
        if (!is_null($prefix) && !empty($prefix))
        {
            $this->prefix = $prefix;
        }
        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0  );
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : 0);
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : '');
        $this->setvalue03(isset($inputs[$this->field03]) ? $inputs[$this->field03] : '' );
        $this->setvalue04(isset($inputs[$this->field04]) ? $inputs[$this->field04] : '' );
        $this->setvalue05(isset($inputs[$this->field05]) ? $inputs[$this->field05] : '' );
        $this->setvalue06(isset($inputs[$this->field06]) ? $inputs[$this->field06] : '' );
        $this->setvalue07(isset($inputs[$this->field07]) ? $inputs[$this->field07] : '' );
    }

    public function jsonSerialize(string $action):array
    {
       $arr = array();
       if ($action != $this->toTextCreate()) {
         $arr[$this->fieldid] = $this->getid();
       }
       $arr[$this->field01] = $this->getvalue01(); // integer
       if (trim($this->getvalue02()))  { $arr[$this->field02] = $this->getvalue02()  ; }  // string
       if (trim($this->getvalue03()))  { $arr[$this->field03] = $this->getvalue03()  ; }  // string
       if (trim($this->getvalue04()))  { $arr[$this->field04] = $this->getvalue04()  ; }  // string
       if (trim($this->getvalue05()))  { $arr[$this->field05] = $this->getvalue05()  ; }  // string
       if (trim($this->getvalue06()))  { $arr[$this->field06] = $this->getvalue06()  ; }  // string
       if (trim($this->getvalue07()))  { $arr[$this->field07] = $this->getvalue07()  ; }  // string
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

    public function toPrimaryKey(): array
    {
        $arr[$this->fieldid] = $this->fieldid;
        $arr[$this->field01] = $this->field01;
        return $arr;
    }

    public function toSecundaryKey(): ?array
    {
        $arr[$this->field02] = $this->field02;
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

        if (isset($results[$this->field02])) {
           $this->setvalue02($this->validateString($results[$this->field02]));
           $results[$this->field02] = $this->getvalue02();
        }

        if (isset($results[$this->field03])) {
            $this->setvalue03($this->validateString($results[$this->field03]));
            $results[$this->field03] = html_entity_decode($this->getvalue03());  // convertir sentencias HTML en String
        }

        if (isset($results[$this->field04])) {
            $this->setvalue04($this->validateString($results[$this->field04]));
            $results[$this->field04] = $this->getvalue04();
        }

        if (isset($results[$this->field05])) {
            $this->setvalue05($this->validateString($results[$this->field05]));
            $results[$this->field05] = $this->getvalue05();
        }

        if (isset($results[$this->field06])) {
            $this->setvalue06($this->validateString($results[$this->field06]));
            $results[$this->field06] = $this->getvalue06();
        }

        if (isset($results[$this->field07])) {
            $this->setvalue07($this->validateString($results[$this->field07]));
            $results[$this->field07] = $this->getvalue07();
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

    public function getvalue05(): string
    {
        return $this->value05;
    }

    public function setvalue05($value05):self
    {
        $this->value05 = $value05;
        return $this;
    }

    public function getvalue06(): string
    {
        return $this->value06;
    }

    public function setvalue06($value06):self
    {
        $this->value06 = $value06;
        return $this;
    }

    public function getvalue07(): string
    {
        return $this->value07;
    }

    public function setvalue07($value07):self
    {
        $this->value07 = $value07;
        return $this;
    }
    
    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
