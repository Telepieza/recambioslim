<?php
/**
  * product.php
  * Description: product template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // product_id
  (string) $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : '' ; // model
  (string) $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ; // sku
  (string) $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ; // upc
  (string) $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ; // ean
  (string) $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ; // jan
  (string) $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : '' ; // isbn
  (string) $value07 = isset($_REQUEST[getfield07()]) ? $_REQUEST[getfield07()] : '' ; // mpn
  (string) $value08 = isset($_REQUEST[getfield08()]) ? $_REQUEST[getfield08()] : '' ; // location
  (int)    $value09 = isset($_REQUEST[getfield09()]) ? $_REQUEST[getfield09()] : 0  ; // quantity
  (int)    $value10 = isset($_REQUEST[getfield10()]) ? $_REQUEST[getfield10()] : 0  ; // stock_status_id
  (string) $value11 = isset($_REQUEST[getfield11()]) ? $_REQUEST[getfield11()] : '' ; // image
  (int)    $value12 = isset($_REQUEST[getfield12()]) ? $_REQUEST[getfield12()] : 0  ; // manufacturer_id
  (int)    $value13 = isset($_REQUEST[getfield13()]) ? $_REQUEST[getfield13()] : 0  ; // shipping
  (float)  $value14 = isset($_REQUEST[getfield14()]) ? $_REQUEST[getfield14()] : 0  ; // price
  (int)    $value15 = isset($_REQUEST[getfield15()]) ? $_REQUEST[getfield15()] : 0  ; // points
  (int)    $value16 = isset($_REQUEST[getfield16()]) ? $_REQUEST[getfield16()] : 0  ; // tax_class_id
  (string) $value17 = isset($_REQUEST[getfield17()]) ? $_REQUEST[getfield17()] : '' ; // date_available
  (float)  $value18 = isset($_REQUEST[getfield18()]) ? $_REQUEST[getfield18()] : 0  ; // weight
  (int)    $value19 = isset($_REQUEST[getfield19()]) ? $_REQUEST[getfield19()] : 0  ; // weight_class_id
  (float)  $value20 = isset($_REQUEST[getfield20()]) ? $_REQUEST[getfield20()] : 0  ; // length
  (float)  $value21 = isset($_REQUEST[getfield21()]) ? $_REQUEST[getfield21()] : 0  ; // width
  (float)  $value22 = isset($_REQUEST[getfield22()]) ? $_REQUEST[getfield22()] : 0  ; // height
  (int)    $value23 = isset($_REQUEST[getfield23()]) ? $_REQUEST[getfield23()] : 0  ; // length_class_id
  (int)    $value24 = isset($_REQUEST[getfield24()]) ? $_REQUEST[getfield24()] : 0  ; // subtract
  (int)    $value25 = isset($_REQUEST[getfield25()]) ? $_REQUEST[getfield25()] : 0  ; // minimum
  (int)    $value26 = isset($_REQUEST[getfield26()]) ? $_REQUEST[getfield26()] : 0  ; // sort_order
  (int)    $value27 = isset($_REQUEST[getfield27()]) ? $_REQUEST[getfield27()] : 0  ; // status
  (int)    $value28 = isset($_REQUEST[getfield28()]) ? $_REQUEST[getfield28()] : 0  ; // viewed
  (string) $value29 = isset($_REQUEST[getfield29()]) ? $_REQUEST[getfield29()] : '' ; // date_added
  (string) $value30 = isset($_REQUEST[getfield30()]) ? $_REQUEST[getfield30()] : '' ; // date_modified
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
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // product_id
      (string) $value01 = isset($row[getfield01()]) ? $row[getfield01()] : '' ; // model
      (string) $value02 = isset($row[getfield02()]) ? $row[getfield02()] : '' ; // sku
      (string) $value03 = isset($row[getfield03()]) ? $row[getfield03()] : '' ; // upc
      (string) $value04 = isset($row[getfield04()]) ? $row[getfield04()] : '' ; // ean
      (string) $value05 = isset($row[getfield05()]) ? $row[getfield05()] : '' ; // jan
      (string) $value06 = isset($row[getfield06()]) ? $row[getfield06()] : '' ; // isbn
      (string) $value07 = isset($row[getfield07()]) ? $row[getfield07()] : '' ; // mpn
      (string) $value08 = isset($row[getfield08()]) ? $row[getfield08()] : '' ; // location
      (int)    $value09 = isset($row[getfield09()]) ? $row[getfield09()] : 0  ; // quantity
      (int)    $value10 = isset($row[getfield10()]) ? $row[getfield10()] : 0  ; // stock_status_id
      (string) $value11 = isset($row[getfield11()]) ? $row[getfield11()] : '' ; // image
      (int)    $value12 = isset($row[getfield12()]) ? $row[getfield12()] : 0  ; // manufacturer_id
      (int)    $value13 = isset($row[getfield13()]) ? $row[getfield13()] : 0  ; // shipping
      (float)  $value14 = isset($row[getfield14()]) ? number_format($row[getfield14()], 2 ,",",".") : 0  ; // price
      (int)    $value15 = isset($row[getfield15()]) ? $row[getfield15()] : 0  ; // points
      (int)    $value16 = isset($row[getfield16()]) ? $row[getfield16()] : 0  ; // tax_class_id
      (string) $value17 = isset($row[getfield17()]) ? $row[getfield17()] : '' ; // date_available
      (float)  $value18 = isset($row[getfield18()]) ? number_format($row[getfield18()], 2 ,",",".") : 0  ; // weight
      (int)    $value19 = isset($row[getfield19()]) ? $row[getfield19()] : 0  ; // weight_class_id
      (float)  $value20 = isset($row[getfield20()]) ? number_format($row[getfield20()], 2 ,",",".") : 0  ; // length
      (float)  $value21 = isset($row[getfield21()]) ? number_format($row[getfield21()], 2 ,",",".") : 0  ; // width
      (float)  $value22 = isset($row[getfield22()]) ? number_format($row[getfield22()], 2 ,",",".") : 0  ; // height
      (int)    $value23 = isset($row[getfield23()]) ? $row[getfield23()] : 0  ; // length_class_id
      (int)    $value24 = isset($row[getfield24()]) ? $row[getfield24()] : 0  ; // subtract
      (int)    $value25 = isset($row[getfield25()]) ? $row[getfield25()] : 0  ; // minimum
      (int)    $value26 = isset($row[getfield26()]) ? $row[getfield26()] : 0  ; // sort_order
      (int)    $value27 = isset($row[getfield27()]) ? $row[getfield27()] : 0  ; // status
      (int)    $value28 = isset($row[getfield28()]) ? $row[getfield28()] : 0  ; // viewed
      (string) $value29 = isset($row[getfield29()]) ? $row[getfield29()] : '' ; // date_added
      (string) $value30 = isset($row[getfield30()]) ? $row[getfield30()] : '' ; // date_modified
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