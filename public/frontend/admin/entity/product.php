<?php
/**
  * product.php
  * Description: product template
  * @Author : M.V.M.
  * @Version 1.0.11
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // product_id
    $value01 = $_REQUEST[getfield01()];  // model
    $value02 = $_REQUEST[getfield02()];  // sku
    $value03 = $_REQUEST[getfield03()];  // upc
    $value04 = $_REQUEST[getfield04()];  // ean
    $value05 = $_REQUEST[getfield05()];  // jan
    $value06 = $_REQUEST[getfield06()];  // isbn
    $value07 = $_REQUEST[getfield07()];  // mpn
    $value08 = $_REQUEST[getfield08()];  // location
    $value09 = $_REQUEST[getfield09()];  // quantity
    $value10 = $_REQUEST[getfield10()];  // stock_status_id
    $value11 = $_REQUEST[getfield11()];  // image
    $value12 = $_REQUEST[getfield12()];  // manufacturer_id
    $value13 = $_REQUEST[getfield13()];  // shipping
    $value14 = $_REQUEST[getfield14()];  // price
    $value15 = $_REQUEST[getfield15()];  // points
    $value16 = $_REQUEST[getfield16()];  // tax_class_id
    $value17 = $_REQUEST[getfield17()];  // date_available
    $value18 = $_REQUEST[getfield18()];  // weight
    $value19 = $_REQUEST[getfield19()];  // weight_class_id
    $value20 = $_REQUEST[getfield20()];  // length
    $value21 = $_REQUEST[getfield21()];  // width
    $value22 = $_REQUEST[getfield22()];  // height
    $value23 = $_REQUEST[getfield23()];  // length_class_id
    $value24 = $_REQUEST[getfield24()];  // subtract
    $value25 = $_REQUEST[getfield25()];  // minimum
    $value26 = $_REQUEST[getfield26()];  // sort_order
    $value27 = $_REQUEST[getfield27()];  // status
    $value28 = $_REQUEST[getfield28()];  // viewed
    $value29 = isset($_REQUEST[getfield29()]) ? $_REQUEST[getfield29()] : '' ; // date_added
    $value30 = isset($_REQUEST[getfield30()]) ? $_REQUEST[getfield30()] : '' ; // date_modified
    
    if (empty($value17)) { $value17 = date('Y-m-d');       }
    if (empty($value29)) { $value29 = date('Y-m-d H:i:s'); }
    if (empty($value30)) { $value30 = date('Y-m-d H:i:s'); }

  $formFields = array(
    getfieldid() => (int)    $id,         // product_id
    getfield01() => (string) $value01,    // model
    getfield02() => (string) $value02,    // sku
    getfield03() => (string) $value03,    // upc
    getfield04() => (string) $value04,    // ean
    getfield05() => (string) $value05,    // jan
    getfield06() => (string) $value06,    // isbn
    getfield07() => (string) $value07,    // mpn
    getfield08() => (string) $value08,    // location
    getfield09() => (int)    $value09,    // quantity
    getfield10() => (int)    $value10,    // stock_status_id
    getfield11() => (string) $value11,    // image
    getfield12() => (int)    $value12,    // manufacturer_id
    getfield13() => (int)    $value13,    // shipping
    getfield14() => (float)  $value14,    // price
    getfield15() => (int)    $value15,    // points
    getfield16() => (int)    $value16,    // tax_class_id
    getfield17() => (string) $value17,    // date_available
    getfield18() => (float)  $value18,    // weight
    getfield19() => (int)    $value19,    // weight_class_id
    getfield20() => (float)  $value20,    // length
    getfield21() => (float)  $value21,    // width
    getfield22() => (float)  $value22,    // height
    getfield23() => (int)    $value23,    // length_class_id
    getfield24() => (int)    $value24,    // subtract
    getfield25() => (int)    $value25,    // minimum
    getfield26() => (int)    $value26,    // sort_order
    getfield27() => (int)    $value27,    // status
    getfield28() => (int)    $value28,    // viewed
    getfield29() => (string) $value29,    // date_added
    getfield30() => (string) $value30);   // date_modified

    if (empty($value17)) { unset($formFields[getfield17()]); } // date_available
    if (empty($value29)) { unset($formFields[getfield29()]); } // date_added
    if (empty($value30)) { unset($formFields[getfield30()]); } // date_modified
  
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .    // product_id
  '<th>' . getfield01() . '</th>' .    // model
  '<th>' . getfield02() . '</th>' .    // sku
  '<th>' . getfield03() . '</th>' .    // upc
  '<th>' . getfield04() . '</th>' .    // ean
  '<th>' . getfield05() . '</th>' .    // jan
  '<th>' . getfield07() . '</th>' .    // mpn
  '<th>' . getfield11() . '</th>' .    // image
  '<th>' . getfield27() . '</th>' ;    // status

 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0  ;  // product_id
    (string) $value01 = '' ;  // model
    (string) $value02 = '' ;  // sku
    (string) $value03 = '' ;  // upc
    (string) $value04 = '' ;  // ean
    (string) $value05 = '' ;  // jan
    (string) $value06 = '' ;  // isbn
    (string) $value07 = '' ;  // mpn
    (string) $value08 = '' ;  // location
    (int)    $value09 = 0 ;   // quantity
    (int)    $value10 = 0 ;   // stock_status_id
    (string) $value11 = '';   // image
    (int)    $value12 = 0 ;   // manufacturer_id
    (int)    $value13 = 0 ;   // shipping
    (float)  $value14 = 0 ;   // price
    (int)    $value15 = 0 ;   // points
    (int)    $value16 = 0 ;   // tax_class_id
    (string) $value17 = '';   // date_available
    (float)  $value18 = 0 ;   // weight
    (int)    $value19 = 0 ;   // weight_class_id
    (float)  $value20 = 0 ;   // length
    (float)  $value21 = 0 ;   // width
    (float)  $value22 = 0 ;   // height
    (int)    $value23 = 0 ;   // length_class_id
    (int)    $value24 = 0 ;   // subtract
    (int)    $value25 = 0 ;   // minimum
    (int)    $value26 = 0 ;   // sort_order
    (int)    $value27 = 0 ;   // status
    (int)    $value28 = 0 ;   // viewed
    (string) $value29 = '';   // date_added
    (string) $value30 = '';   // date_modified

    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) trim($value01 = $row[getfield01()]);
    if (isset($row[getfield02()])) trim($value02 = $row[getfield02()]);
    if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
    if (isset($row[getfield04()])) trim($value04 = $row[getfield04()]);
    if (isset($row[getfield05()])) trim($value05 = $row[getfield05()]);
    if (isset($row[getfield06()])) trim($value06 = $row[getfield06()]);
    if (isset($row[getfield07()])) trim($value07 = $row[getfield07()]);
    if (isset($row[getfield08()])) trim($value08 = $row[getfield08()]);
    if (isset($row[getfield09()])) $value09      = $row[getfield09()];
    if (isset($row[getfield10()])) $value10      = $row[getfield10()];
    if (isset($row[getfield11()])) trim($value11 = $row[getfield11()]);
    if (isset($row[getfield12()])) $value12      = $row[getfield12()];
    if (isset($row[getfield13()])) $value13      = $row[getfield13()];
    if (isset($row[getfield14()])) {$value14 = number_format($row[getfield14()], 2 ,",",".");}
    if (isset($row[getfield15()])) $value15      = $row[getfield15()];
    if (isset($row[getfield16()])) $value16      = $row[getfield16()];
    if (isset($row[getfield17()])) trim($value17 = $row[getfield17()]);
    if (isset($row[getfield18()])) {$value18 = number_format($row[getfield18()], 2 ,",",".");}
    if (isset($row[getfield19()])) $value19      = $row[getfield19()];
    if (isset($row[getfield20()])) {$value20 = number_format($row[getfield20()], 2 ,",",".");}
    if (isset($row[getfield21()])) {$value21 = number_format($row[getfield21()], 2 ,",",".");}
    if (isset($row[getfield22()])) {$value22 = number_format($row[getfield22()], 2 ,",",".");}
    if (isset($row[getfield23()])) $value23      = $row[getfield23()];
    if (isset($row[getfield24()])) $value24      = $row[getfield24()];
    if (isset($row[getfield25()])) $value25      = $row[getfield25()];
    if (isset($row[getfield26()])) $value26      = $row[getfield26()];
    if (isset($row[getfield27()])) $value27      = $row[getfield27()];
    if (isset($row[getfield28()])) $value28      = $row[getfield28()];
    if (isset($row[getfield29()])) trim($value29 = $row[getfield29()]);
    if (isset($row[getfield30()])) trim($value30 = $row[getfield30()]);

    if (strlen($value17) > 8 ) { $value17 = substr($value17,0,8);  }
    if (strlen($value29) > 10) { $value29 = substr($value29,0,10); }
    if (strlen($value30) > 10) { $value30 = substr($value30,0,10); }

    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>' ;  // product_id
       echo '<td>' . $value01 . '</td>' ;  // model
       echo '<td>' . $value02 . '</td>' ;  // sku
       echo '<td>' . $value03 . '</td>' ;  // upc
       echo '<td>' . $value04 . '</td>' ;  // ean
       echo '<td>' . $value05 . '</td>' ;  // jan
       echo '<td>' . $value07 . '</td>' ;  // mpn
       echo '<td>' . $value11 . '</td>' ;  // image
       echo '<td>' . $value27 . '</td>' ;  // status
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'product_id';
  }
  function getfield01() {
    return 'model';
  }
  function getfield02() {
    return 'sku';
  }
  function getfield03() {
    return 'upc';
  }
  function getfield04() {
    return 'ean';
  }
  function getfield05() {
    return 'jan';
  }
  function getfield06() {
    return 'isbn';
  }
  function getfield07() {
    return 'mpn';
  }
  function getfield08() {
    return 'location';
  }
  function getfield09() {
    return 'quantity';
  }
  function getfield10() {
    return 'stock_status_id';
  }
  function getfield11() {
    return 'image';
  }
  function getfield12() {
    return 'manufacturer_id';
  }
  function getfield13() {
    return 'shipping';
  }
  function getfield14() {
    return 'price';
  }
  function getfield15() {
    return 'points';
  }
  function getfield16() {
    return 'tax_class_id';
  }
  function getfield17() {
    return 'date_available';
  }
  function getfield18() {
    return 'weight';
  }
  function getfield19() {
    return 'weight_class_id';
  }
  function getfield20() {
    return 'length';
  }
  function getfield21() {
    return 'width';
  }
  function getfield22() {
    return 'height';
  }
  function getfield23() {
    return 'length_class_id';
  }
  function getfield24() {
    return 'subtract';
  }
  function getfield25() {
    return 'minimum';
  }
  function getfield26() {
    return 'sort_order';
  }
  function getfield27() {
    return 'status';
  }
  function getfield28() {
    return 'viewed';
  }
  function getfield29() {
    return 'date_added';
  }
  function getfield30() {
    return 'date_modified';
  }

  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  
?>