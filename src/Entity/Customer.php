<?php
/**
  * customer.php
  * Description: customer template
  * @Author : M.V.M.
  * @Version 1.0.16
**/
declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

final class Customer extends BaseValidate
{
    private $prefix     = "oc_";
    private $tablename  = "customer";
    private $fieldid    = 'customer_id';
    private $field00    = 'NoPrimaryKey';
    private $field01    = 'customer_group_id';
    private $field02    = 'store_id';
    private $field03    = 'language_id';
    private $field04    = 'firstname';
    private $field05    = 'lastname';
    private $field06    = 'email';
    private $field07    = 'telephone';
    private $field08    = 'fax';
    private $field09    = 'password';
    private $field10    = 'salt';
    private $field11    = 'cart';
    private $field12    = 'wishlist';
    private $field13    = 'newsletter';
    private $field14    = 'address_id';
    private $field15    = 'custom_field';
    private $field16    = 'ip';
    private $field17    = 'status';
    private $field18    = 'safe';
    private $field19    = 'token';
    private $field20    = 'code';
    private $field21    = 'date_added';

    private bool   $isAutoIncrement = true;   // index id auto_increment
    private int    $id;                       // id
    private int    $value01;                  // field01 (customer_group_id)
    private int    $value02;                  // field02 (store_id)
    private int    $value03;                  // field03 (language_id)
    private string $value04;                  // field04 (firstname)
    private string $value05;                  // field05 (lastname)
    private string $value06;                  // field06 (email)
    private string $value07;                  // field07 (telephone)
    private string $value08;                  // field08 (fax)
    private string $value09;                  // field09 (password)
    private string $value10;                  // field10 (salt)
    private string $value11;                  // field11 (cart)
    private string $value12;                  // field12 (wishlist)
    private int    $value13;                  // field13 (newsletter)
    private int    $value14;                  // field14 (address_id)
    private string $value15;                  // field15 (custom_field)
    private string $value16;                  // field16 (ip)
    private int    $value17;                  // field17 (status)
    private int    $value18;                  // field18 (safe)
    private string $value19;                  // field19 (token)
    private string $value20;                  // field20 (code)
    private ?DateTimeImmutable $value21;      // field21 (date_added)

    public function __construct(string $prefix, array $inputs)
    {
        if (!is_null($prefix) && !empty($prefix))
        {
            $this->prefix = $prefix;
        }

        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0  );
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : 0  );
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : 0  );
        $this->setvalue03(isset($inputs[$this->field03]) ? $inputs[$this->field03] : 0  );
        $this->setvalue04(isset($inputs[$this->field04]) ? $inputs[$this->field04] : '' );
        $this->setvalue05(isset($inputs[$this->field05]) ? $inputs[$this->field05] : '' );
        $this->setvalue06(isset($inputs[$this->field06]) ? $inputs[$this->field06] : '' );
        $this->setvalue07(isset($inputs[$this->field07]) ? $inputs[$this->field07] : '' );
        $this->setvalue08(isset($inputs[$this->field08]) ? $inputs[$this->field08] : '' );
        $this->setvalue09(isset($inputs[$this->field09]) ? $inputs[$this->field09] : '' );
        $this->setvalue10(isset($inputs[$this->field10]) ? $inputs[$this->field10] : '' );
        $this->setvalue11(isset($inputs[$this->field11]) ? $inputs[$this->field11] : '' );
        $this->setvalue12(isset($inputs[$this->field12]) ? $inputs[$this->field12] : '' );
        $this->setvalue13(isset($inputs[$this->field13]) ? $inputs[$this->field13] : 0  );
        $this->setvalue14(isset($inputs[$this->field14]) ? $inputs[$this->field14] : 0  );
        $this->setvalue15(isset($inputs[$this->field15]) ? $inputs[$this->field15] : '' );
        $this->setvalue16(isset($inputs[$this->field16]) ? $inputs[$this->field16] : '' );
        $this->setvalue17(isset($inputs[$this->field17]) ? $inputs[$this->field17] : 0  );
        $this->setvalue18(isset($inputs[$this->field18]) ? $inputs[$this->field18] : 0  );
        $this->setvalue19(isset($inputs[$this->field19]) ? $inputs[$this->field19] : '' );
        $this->setvalue20(isset($inputs[$this->field20]) ? $inputs[$this->field20] : '' );
        $this->setvalue21(isset($inputs[$this->field21]) ? null : new DateTimeImmutable('now'));
    }

    public function jsonSerialize(string $action):array
    {
       $arr = array();
       if ($action != $this->toTextCreate()) {
          $arr[$this->fieldid] = $this->getid();
      }
       $arr[$this->field01] = $this->getvalue01();                                        // integer
       $arr[$this->field02] = $this->getvalue02();                                        // integer
       $arr[$this->field03] = $this->getvalue03();                                        // integer
       if (trim($this->getvalue04()))  { $arr[$this->field04] = $this->getvalue04()  ; }  // string
       if (trim($this->getvalue05()))  { $arr[$this->field05] = $this->getvalue05()  ; }  // string
       if (trim($this->getvalue06()))  { $arr[$this->field06] = $this->getvalue06()  ; }  // string
       if (trim($this->getvalue07()))  { $arr[$this->field07] = $this->getvalue07()  ; }  // string
       if (trim($this->getvalue08()))  { $arr[$this->field08] = $this->getvalue08()  ; }  // string
       if (trim($this->getvalue09()))  { $arr[$this->field09] = $this->getvalue09()  ; }  // string
       if (trim($this->getvalue10()))  { $arr[$this->field10] = $this->getvalue10()  ; }  // string
       if (trim($this->getvalue11()))  { $arr[$this->field11] = $this->getvalue11()  ; }  // string
       if (trim($this->getvalue12()))  { $arr[$this->field12] = $this->getvalue12()  ; }  // string
       $arr[$this->field13] = $this->getvalue13();                                        // integer
       $arr[$this->field14] = $this->getvalue14();                                        // integer
       if (trim($this->getvalue15()))  { $arr[$this->field15] = $this->getvalue15()  ; }  // string
       if (trim($this->getvalue16()))  { $arr[$this->field16] = $this->getvalue16()  ; }  // string
       $arr[$this->field17] = $this->getvalue17();                                        // integer
       $arr[$this->field18] = $this->getvalue18();                                        // integer
       if (trim($this->getvalue19()))  { $arr[$this->field19] = $this->getvalue19()  ; }  // string
       if (trim($this->getvalue20()))  { $arr[$this->field20] = $this->getvalue20()  ; }  // string
       $arr[$this->field21] = $this->validateDateTimeImmutable($this->getvalue21());      // DateTimeImmutable
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
        $arr[$this->field04] = $this->field04;
        $arr[$this->field05] = $this->field05;
        $arr[$this->field06] = $this->field06;
        $arr[$this->field07] = $this->field07;
        $arr[$this->field08] = $this->field08;
        $arr[$this->field09] = $this->field09;
        $arr[$this->field10] = $this->field10;
        $arr[$this->field11] = $this->field11;
        $arr[$this->field12] = $this->field12;
        $arr[$this->field13] = $this->field13;
        $arr[$this->field14] = $this->field14;
        $arr[$this->field15] = $this->field15;
        $arr[$this->field16] = $this->field16;
        $arr[$this->field17] = $this->field17;
        $arr[$this->field18] = $this->field18;
        $arr[$this->field19] = $this->field19;
        $arr[$this->field20] = $this->field20;
        $arr[$this->field21] = $this->field21;
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

        if (isset($results[$this->field03]))
        {
           $this->setvalue03($this->validateInteger($results[$this->field03]));
           $results[$this->field03] = $this->getvalue03();
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

         if (isset($results[$this->field08])) {
            $this->setvalue08($this->validateString($results[$this->field08]));
            $results[$this->field08] = $this->getvalue08();
         }

         if (isset($results[$this->field09])) {
            $this->setvalue09($this->validateString($results[$this->field09]));
            $results[$this->field09] = $this->getvalue09();
         }

         if (isset($results[$this->field10])) {
            $this->setvalue10($this->validateString($results[$this->field10]));
            $results[$this->field10] = $this->getvalue10();
         }

         if (isset($results[$this->field11])) {
            $this->setvalue11($this->validateString($results[$this->field11]));
            $results[$this->field11] = $this->getvalue11();
         }

         if (isset($results[$this->field12])) {
            $this->setvalue12($this->validateString($results[$this->field12]));
            $results[$this->field12] = $this->getvalue12();
         }

         if (isset($results[$this->field13]))
         {
            $this->setvalue13($this->validateInteger($results[$this->field13]));
            $results[$this->field13] = $this->getvalue13();
         }

        if (isset($results[$this->field14]))
        {
           $this->setvalue14($this->validateInteger($results[$this->field14]));
           $results[$this->field14] = $this->getvalue14();
        }

        if (isset($results[$this->field15]))
        {
            $this->setvalue15($this->validateString($results[$this->field15]));
            $results[$this->field15] = $this->getvalue15();
        }

        if (isset($results[$this->field16]))
        {
            $this->setvalue16($this->validateString($results[$this->field16]));
            $results[$this->field16] = $this->getvalue16();
        }

        if (isset($results[$this->field17]))
        {
            $this->setvalue17($this->validateInteger($results[$this->field17]));
            $results[$this->field17] = $this->getvalue17();
        }

        if (isset($results[$this->field18]))
        {
            $this->setvalue18($this->validateInteger($results[$this->field18]));
            $results[$this->field18] = $this->getvalue18();
        }
 
         if (isset($results[$this->field19]))
         {
            $this->setvalue19($this->validateString($results[$this->field19]));
            $results[$this->field19] = $this->getvalue19();
         }

         if (isset($results[$this->field20]))
         {
            $this->setvalue20($this->validateString($results[$this->field20]));
            $results[$this->field20] = $this->getvalue20();
         }

        if ($action === 'create' && isset($results[$this->field21]))
        {
            $value = $results[$this->field21];
            if ($value instanceof DateTimeImmutable || is_null($value)) {
                $this->setvalue21($this->validateDateTimeImmutable($value));
                $value = $this->getvalue21()->format('Y-m-d H:i:s');
            }
            else
            {
                $value = $results[$this->field21];
            }
            $results[$this->field21] = $value;
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

    public function getvalue03(): int
    {
            return $this->value03;
    }
    public function setvalue03($value03): self
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
    public function getvalue08(): string
    {
        return $this->value08;
    }
    public function setvalue08($value08):self
    {
        $this->value08 = $value08;
        return $this;
    }

    public function getvalue09(): string
    {
        return $this->value09;
    }
    public function setvalue09($value09):self
    {
        $this->value09 = $value09;
        return $this;
    }

    public function getvalue10(): string
    {
        return $this->value10;
    }
    public function setvalue10($value10):self
    {
        $this->value10 = $value10;
        return $this;
    }

    public function getvalue11(): string
    {
        return $this->value11;
    }
    public function setvalue11($value11):self
    {
        $this->value11= $value11;
        return $this;
    }

    public function getvalue12(): string
    {
        return $this->value12;
    }
    public function setvalue12($value12):self
    {
        $this->value12 = $value12;
        return $this;
    }

    public function getvalue13(): int
    {
        return $this->value13;
    }
    public function setvalue13($value13):self
    {
        $this->value13 = $value13;
        return $this;
    }

    public function getvalue14(): int
    {
        return $this->value14;
    }
    public function setvalue14($value14):self
    {
        $this->value14= $value14;
        return $this;
    }

    public function getvalue15(): string
    {
        return $this->value15;
    }
    public function setvalue15($value15):self
    {
        $this->value15= $value15;
        return $this;
    }

    public function getvalue16(): string
    {
        return $this->value16;
    }
    public function setvalue16($value16):self
    {
        $this->value16 = $value16;
        return $this;
    }

    public function getvalue17(): int
    {
        return $this->value17;
    }
    public function setvalue17($value17):self
    {
        $this->value17 = $value17;
        return $this;
    }

    public function getvalue18(): int
    {
        return $this->value18;
    }
    public function setvalue18($value18):self
    {
        $this->value18= $value18;
        return $this;
    }
    
    public function getvalue19(): string
    {
        return $this->value19;
    }
    public function setvalue19($value19):self
    {
        $this->value19= $value19;
        return $this;
    }

    public function getvalue20(): string
    {
        return $this->value20;
    }
    public function setvalue20($value20):self
    {
        $this->value20= $value20;
        return $this;
    }
    
    public function getvalue21(): ?DateTimeImmutable
    {
            return $this->value21;
    }
    public function setvalue21( $value21): self
    {
        $this->value21 = $value21;
        return $this;
    }

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
