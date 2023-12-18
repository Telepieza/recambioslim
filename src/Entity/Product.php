<?php
/**
  * product.php
  * Description: product template
  * @Author : M.V.M.
  * @Version 1.0.16
**/
declare(strict_types=1);

namespace App\Entity;

use DateTimeImmutable;

final class Product extends BaseValidate
{
    private $prefix     = "oc_";
    private $tablename  = "product";
    private $fieldid    = 'product_id';
    private $field00    = 'NoPrimaryKey';
    private $field01    = 'model';
    private $field02    = 'sku';
    private $field03    = 'upc';
    private $field04    = 'ean';
    private $field05    = 'jan';
    private $field06    = 'isbn';
    private $field07    = 'mpn';
    private $field08    = 'location';
    private $field09    = 'quantity';
    private $field10    = 'stock_status_id';
    private $field11    = 'image';
    private $field12    = 'manufacturer_id';
    private $field13    = 'shipping';
    private $field14    = 'price';
    private $field15    = 'points';
    private $field16    = 'tax_class_id';
    private $field17    = 'date_available';
    private $field18    = 'weight';
    private $field19    = 'weight_class_id';
    private $field20    = 'length';
    private $field21    = 'width';
    private $field22    = 'height';
    private $field23    = 'length_class_id';
    private $field24    = 'subtract';
    private $field25    = 'minimum';
    private $field26    = 'sort_order';
    private $field27    = 'status';
    private $field28    = 'viewed';
    private $field29    = 'date_added';
    private $field30    = 'date_modified';
  
    private bool   $isAutoIncrement = true;   // index id auto_increment
    private int    $id;                       // id
    private string $value01;                  // field01 (model)
    private string $value02;                  // field02 (sku)
    private string $value03;                  // field03 (upc)
    private string $value04;                  // field04 (ean)
    private string $value05;                  // field05 (jan)
    private string $value06;                  // field06 (isbn)
    private string $value07;                  // field07 (mpn)
    private string $value08;                  // field08 (location)
    private int    $value09;                  // field09 (quantity)
    private int    $value10;                  // field10 (stock_status_id)
    private string $value11;                  // field11 (image)
    private int    $value12;                  // field12 (manufacturer_id)
    private int    $value13;                  // field13 (shipping)
    private float  $value14;                  // field14 (price)
    private int    $value15;                  // field15 (points)
    private int    $value16;                  // field16 (tax_class_id)
    private ?DateTimeImmutable  $value17;     // field17 (date_available)
    private float  $value18;                  // field18 (weight)
    private int    $value19;                  // field19 (weight_class_id)
    private float  $value20;                  // field20 (length)
    private float  $value21;                  // field21 (width)
    private float  $value22;                  // field22 (height)
    private int    $value23;                  // field23 (length_class_id)
    private int    $value24;                  // field24 (subtract)
    private int    $value25;                  // field25 (minimum)
    private int    $value26;                  // field26 (sort_order)
    private int    $value27;                  // field27 (status)
    private int    $value28;                  // field28 (viewed)
    private ?DateTimeImmutable $value29;      // field29 (date_added)
    private ?DateTimeImmutable $value30;      // field30 (date_modified)

    public function __construct(string $prefix, array $inputs)
    {
        if (!is_null($prefix) && !empty($prefix))
        {
            $this->prefix = $prefix;
        }
        $this->setid(isset($inputs[$this->fieldid])      ? $inputs[$this->fieldid] : 0  );
        $this->setvalue01(isset($inputs[$this->field01]) ? $inputs[$this->field01] : '' );
        $this->setvalue02(isset($inputs[$this->field02]) ? $inputs[$this->field02] : '' );
        $this->setvalue03(isset($inputs[$this->field03]) ? $inputs[$this->field03] : ''  );
        $this->setvalue04(isset($inputs[$this->field04]) ? $inputs[$this->field04] : '' );
        $this->setvalue05(isset($inputs[$this->field05]) ? $inputs[$this->field05] : '' );
        $this->setvalue06(isset($inputs[$this->field06]) ? $inputs[$this->field06] : '' );
        $this->setvalue07(isset($inputs[$this->field07]) ? $inputs[$this->field07] : '' );
        $this->setvalue08(isset($inputs[$this->field08]) ? $inputs[$this->field08] : '' );
        $this->setvalue09(isset($inputs[$this->field09]) ? $inputs[$this->field09] : 0 );
        $this->setvalue10(isset($inputs[$this->field10]) ? $inputs[$this->field10] : 0 );
        $this->setvalue11(isset($inputs[$this->field11]) ? $inputs[$this->field11] : '' );
        $this->setvalue12(isset($inputs[$this->field12]) ? $inputs[$this->field12] : 0 );
        $this->setvalue13(isset($inputs[$this->field13]) ? $inputs[$this->field13] : 0  );
        $this->setvalue14(isset($inputs[$this->field14]) ? $inputs[$this->field14] : 0  );
        $this->setvalue15(isset($inputs[$this->field15]) ? $inputs[$this->field15] : 0 );
        $this->setvalue16(isset($inputs[$this->field16]) ? $inputs[$this->field16] : 0 );
        $this->setvalue17(isset($inputs[$this->field17]) ? null : new DateTimeImmutable('now'));
        $this->setvalue18(isset($inputs[$this->field18]) ? $inputs[$this->field18] : 0  );
        $this->setvalue19(isset($inputs[$this->field19]) ? $inputs[$this->field19] : 0 );
        $this->setvalue20(isset($inputs[$this->field20]) ? $inputs[$this->field20] : 0 );
        $this->setvalue21(isset($inputs[$this->field21]) ? $inputs[$this->field21] : 0 );
        $this->setvalue22(isset($inputs[$this->field22]) ? $inputs[$this->field22] : 0 );
        $this->setvalue23(isset($inputs[$this->field23]) ? $inputs[$this->field23] : 0 );
        $this->setvalue24(isset($inputs[$this->field24]) ? $inputs[$this->field24] : 0 );
        $this->setvalue25(isset($inputs[$this->field25]) ? $inputs[$this->field25] : 0 );
        $this->setvalue26(isset($inputs[$this->field26]) ? $inputs[$this->field26] : 0 );
        $this->setvalue27(isset($inputs[$this->field27]) ? $inputs[$this->field27] : 0 );
        $this->setvalue28(isset($inputs[$this->field28]) ? $inputs[$this->field28] : 0 );
        $this->setvalue29(isset($inputs[$this->field29]) ? null : new DateTimeImmutable('now'));
        $this->setvalue30(isset($inputs[$this->field30]) ? null : new DateTimeImmutable('now'));
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
       if (trim($this->getvalue05()))  { $arr[$this->field05] = $this->getvalue05()  ; }  // string
       if (trim($this->getvalue06()))  { $arr[$this->field06] = $this->getvalue06()  ; }  // string
       if (trim($this->getvalue07()))  { $arr[$this->field07] = $this->getvalue07()  ; }  // string
       if (trim($this->getvalue08()))  { $arr[$this->field08] = $this->getvalue08()  ; }  // string
       $arr[$this->field09] = $this->getvalue09();                                        // integer
       $arr[$this->field10] = $this->getvalue10();                                        // integer
       if (trim($this->getvalue11()))  { $arr[$this->field11] = $this->getvalue11()  ; }  // string
       $arr[$this->field12] = $this->getvalue12();                                        // integer
       $arr[$this->field13] = $this->getvalue13();                                        // integer
       $arr[$this->field14] = $this->getvalue14();                                        // float
       $arr[$this->field15] = $this->getvalue15();                                        // integer
       $arr[$this->field16] = $this->getvalue16();                                        // integer
       $arr[$this->field17] = $this->validateDate($this->getvalue17());                   // Date
       $arr[$this->field18] = $this->getvalue18();                                        // float
       $arr[$this->field19] = $this->getvalue19();                                        // integer
       $arr[$this->field20] = $this->getvalue20();                                        // float
       $arr[$this->field21] = $this->getvalue21();                                        // float
       $arr[$this->field22] = $this->getvalue22();                                        // float
       $arr[$this->field23] = $this->getvalue23();                                        // integer
       $arr[$this->field24] = $this->getvalue24();                                        // integer
       $arr[$this->field25] = $this->getvalue25();                                        // integer
       $arr[$this->field26] = $this->getvalue26();                                        // integer
       $arr[$this->field27] = $this->getvalue27();                                        // integer
       $arr[$this->field28] = $this->getvalue28();                                        // integer
       $arr[$this->field29] = $this->validateDateTimeImmutable($this->getvalue29());      // DateTimeImmutable
       $arr[$this->field30] = $this->validateDateTimeImmutable($this->getvalue30());      // DateTimeImmutable
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
        $arr[$this->field02] = $this->field02;
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
        $arr[$this->field22] = $this->field22;
        $arr[$this->field23] = $this->field23;
        $arr[$this->field24] = $this->field24;
        $arr[$this->field25] = $this->field25;
        $arr[$this->field26] = $this->field26;
        $arr[$this->field27] = $this->field27;
        $arr[$this->field28] = $this->field28;
        $arr[$this->field29] = $this->field29;
        $arr[$this->field30] = $this->field30;
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
        if (isset($results[$this->field03])) {
            $this->setvalue03($this->validateString($results[$this->field03]));
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
        if (isset($results[$this->field09]))
        {
           $this->setvalue09($this->validateInteger($results[$this->field09]));
           $results[$this->field09] = $this->getvalue09();
        }
        if (isset($results[$this->field10]))
        {
           $this->setvalue10($this->validateInteger($results[$this->field10]));
           $results[$this->field10] = $this->getvalue10();
        }
        if (isset($results[$this->field11])) {
            $this->setvalue11($this->validateString($results[$this->field11]));
            $results[$this->field11] = $this->getvalue11();
        }
        if (isset($results[$this->field12]))
        {
           $this->setvalue12($this->validateInteger($results[$this->field12]));
           $results[$this->field12] = $this->getvalue12();
        }
        if (isset($results[$this->field13]))
        {
           $this->setvalue13($this->validateInteger($results[$this->field13]));
           $results[$this->field13] = $this->getvalue13();
        }
        if (isset($results[$this->field14])) {
            $this->setvalue14($this->validateFloat($results[$this->field14]));
            $results[$this->field14] = $this->getvalue14();
        }
        if (isset($results[$this->field15]))
        {
           $this->setvalue15($this->validateInteger($results[$this->field15]));
           $results[$this->field15] = $this->getvalue15();
        }
        if (isset($results[$this->field16]))
        {
           $this->setvalue16($this->validateInteger($results[$this->field16]));
           $results[$this->field16] = $this->getvalue16();
        }
        if (isset($results[$this->field17]))
        {
            $value = $results[$this->field17];
            if ($value instanceof Date || is_null($value)) {
                $this->setvalue17($this->validateDate($value));
                  $value = $this->getvalue17()->format('Y-m-d');
            } else {
                $value = $results[$this->field17];
            }
                $results[$this->field17] = $value;
        }
        if (isset($results[$this->field18]))
        {
            $this->setvalue18($this->validateFloat($results[$this->field18]));
            $results[$this->field18] = $this->getvalue18();
        }
        if (isset($results[$this->field19]))
        {
           $this->setvalue19($this->validateInteger($results[$this->field19]));
           $results[$this->field19] = $this->getvalue19();
        }
        if (isset($results[$this->field20]))
        {
            $this->setvalue20($this->validateFloat($results[$this->field20]));
            $results[$this->field20] = $this->getvalue20();
        }
        if (isset($results[$this->field21]))
        {
            $this->setvalue21($this->validateFloat($results[$this->field21]));
            $results[$this->field21] = $this->getvalue21();
        }
        if (isset($results[$this->field22]))
        {
            $this->setvalue22($this->validateFloat($results[$this->field22]));
            $results[$this->field22] = $this->getvalue22();
        }
        if (isset($results[$this->field23]))
        {
           $this->setvalue23($this->validateInteger($results[$this->field23]));
           $results[$this->field23] = $this->getvalue23();
        }
        if (isset($results[$this->field24]))
        {
           $this->setvalue24($this->validateInteger($results[$this->field24]));
           $results[$this->field24] = $this->getvalue24();
        }
        if (isset($results[$this->field25]))
        {
           $this->setvalue25($this->validateInteger($results[$this->field25]));
           $results[$this->field25] = $this->getvalue25();
        }
        if (isset($results[$this->field26]))
        {
           $this->setvalue26($this->validateInteger($results[$this->field26]));
           $results[$this->field26] = $this->getvalue26();
        }
        if (isset($results[$this->field27]))
        {
           $this->setvalue27($this->validateInteger($results[$this->field27]));
           $results[$this->field27] = $this->getvalue27();
        }
        if (isset($results[$this->field28]))
        {
           $this->setvalue28($this->validateInteger($results[$this->field28]));
           $results[$this->field28] = $this->getvalue28();
        }

        if ($action === 'create' && isset($results[$this->field29]))
        {
            $value = $results[$this->field29];
            if ($value instanceof DateTimeImmutable || is_null($value)) {
                $this->setvalue29($this->validateDateTimeImmutable($value));
                $value = $this->getvalue29()->format('Y-m-d H:i:s');
            }
            else
            {
                $value = $results[$this->field29];
            }
            $results[$this->field29] = $value;
        }

        if ($action === 'update'  && isset($results[$this->field30]))
        {
            $value = $results[$this->field30];
            if ($value instanceof DateTimeImmutable || is_null($value)) {
                $this->setvalue30($this->validateDateTimeImmutable($value));
                $value = $this->getvalue30()->format('Y-m-d H:i:s');
            }
            else
            {
                $value = $results[$this->field30];
            }
            $results[$this->field30] = $value;
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

    public function getvalue09(): int
    {
        return $this->value09;
    }
    public function setvalue09($value09):self
    {
        $this->value09 = $value09;
        return $this;
    }

    public function getvalue10(): int
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

    public function getvalue12(): int
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

    public function getvalue14(): float
    {
        return $this->value14;
    }
    public function setvalue14($value14):self
    {
        $this->value14= $value14;
        return $this;
    }

    public function getvalue15(): int
    {
        return $this->value15;
    }
    public function setvalue15($value15):self
    {
        $this->value15= $value15;
        return $this;
    }

    public function getvalue16(): int
    {
        return $this->value16;
    }
    public function setvalue16($value16):self
    {
        $this->value16 = $value16;
        return $this;
    }

    public function getvalue17(): ?Date
    {
        return $this->value17;
    }
    public function setvalue17($value17):self
    {
        $this->value17 = $value17;
        return $this;
    }

    public function getvalue18(): float
    {
        return $this->value18;
    }
    public function setvalue18($value18):self
    {
        $this->value18= $value18;
        return $this;
    }
    
    public function getvalue19(): int
    {
        return $this->value19;
    }
    public function setvalue19($value19):self
    {
        $this->value19= $value19;
        return $this;
    }

    public function getvalue20(): float
    {
        return $this->value20;
    }
    public function setvalue20($value20):self
    {
        $this->value20= $value20;
        return $this;
    }

    public function getvalue21(): float
    {
        return $this->value21;
    }
    public function setvalue21($value21):self
    {
        $this->value21= $value21;
        return $this;
    }

    public function getvalue22(): float
    {
        return $this->value22;
    }
    public function setvalue22($value22):self
    {
        $this->value22= $value22;
        return $this;
    }

    public function getvalue23(): int
    {
        return $this->value23;
    }
    public function setvalue23($value23):self
    {
        $this->value23= $value23;
        return $this;
    }

    public function getvalue24(): int
    {
        return $this->value24;
    }
    public function setvalue24($value24):self
    {
        $this->value24= $value24;
        return $this;
    }

    public function getvalue25(): int
    {
        return $this->value25;
    }
    public function setvalue25($value25):self
    {
        $this->value25= $value25;
        return $this;
    }

    public function getvalue26(): int
    {
        return $this->value26;
    }
    public function setvalue26($value26):self
    {
        $this->value26= $value26;
        return $this;
    }

    public function getvalue27(): int
    {
        return $this->value27;
    }
    public function setvalue27($value27):self
    {
        $this->value27= $value27;
        return $this;
    }

    public function getvalue28(): int
    {
        return $this->value28;
    }
    public function setvalue28($value28):self
    {
        $this->value28= $value28;
        return $this;
    }

    public function getvalue29(): ?DateTimeImmutable
    {
            return $this->value29;
    }
    public function setvalue29( $value29): self
    {
        $this->value29 = $value29;
        return $this;
    }

    public function getvalue30(): ?DateTimeImmutable
    {
            return $this->value30;
    }
    public function setvalue30( $value30): self
    {
        $this->value30 = $value30;
        return $this;
    }

    public function toJson(): object
    {
        return json_decode((string) json_encode(get_object_vars($this)), false);
    }

}
