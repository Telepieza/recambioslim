<?php
/**
  * customer.php
  * Description: customer template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ;  // customer_id
  (int)    $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ;  // customer_group_id
  (int)    $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : 0  ;  // store_id
  (int)    $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : 0  ;  // language_id
  (string) $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ;  // firstname
  (string) $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ;  // lastname
  (string) $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : '' ;  // email
  (string) $value07 = isset($_REQUEST[getfield07()]) ? $_REQUEST[getfield07()] : '' ;  // telephone
  (string) $value08 = isset($_REQUEST[getfield08()]) ? $_REQUEST[getfield08()] : '' ;  // fax
  (string) $value09 = isset($_REQUEST[getfield09()]) ? $_REQUEST[getfield09()] : '' ;  // password
  (string) $value10 = isset($_REQUEST[getfield10()]) ? $_REQUEST[getfield10()] : '' ;  // salt
  (string) $value11 = isset($_REQUEST[getfield11()]) ? $_REQUEST[getfield11()] : '' ;  // cart
  (string) $value12 = isset($_REQUEST[getfield12()]) ? $_REQUEST[getfield12()] : '' ;  // wishlist
  (int)    $value13 = isset($_REQUEST[getfield13()]) ? $_REQUEST[getfield13()] : 0  ;  // newsletter
  (int)    $value14 = isset($_REQUEST[getfield14()]) ? $_REQUEST[getfield14()] : 0  ;  // address_id
  (string) $value15 = isset($_REQUEST[getfield15()]) ? $_REQUEST[getfield15()] : '' ;  // custom_field
  (string) $value16 = isset($_REQUEST[getfield16()]) ? $_REQUEST[getfield16()] : '' ;  // ip
  (int)    $value17 = isset($_REQUEST[getfield17()]) ? $_REQUEST[getfield17()] : 0  ;  // status
  (int)    $value18 = isset($_REQUEST[getfield18()]) ? $_REQUEST[getfield18()] : 0  ;  // safe
  (string) $value19 = isset($_REQUEST[getfield19()]) ? $_REQUEST[getfield19()] : '' ;  // token
  (string) $value20 = isset($_REQUEST[getfield20()]) ? $_REQUEST[getfield20()] : '' ;  // code
  (string) $value21 = isset($_REQUEST[getfield21()]) ? $_REQUEST[getfield21()] : '' ;  // date_added
  if (empty($value21)) { $value21 = date('Y-m-d H:i:s'); }

  $formFields = array(
    getfieldid() => (int)    $id,         // customer_id
    getfield01() => (int)    $value01,    // customer_group_id
    getfield02() => (int)    $value02,    // store_id
    getfield03() => (int)    $value03,    // language_id
    getfield04() => (string) $value04,    // firstname
    getfield05() => (string) $value05,    // lastname
    getfield06() => (string) $value06,    // email
    getfield07() => (string) $value07,    // telephone
    getfield08() => (string) $value08,    // fax
    getfield09() => (string) $value09,    // password
    getfield10() => (string) $value10,    // salt
    getfield11() => (string) $value11,    // cart
    getfield12() => (string) $value12,    // wishlist
    getfield13() => (int)    $value13,    // newsletter
    getfield14() => (int)    $value14,    // address_id
    getfield15() => (string) $value15,    // custom_field
    getfield16() => (string) $value16,    // ip
    getfield17() => (int)    $value17,    // status
    getfield18() => (int)    $value18,    // safe
    getfield19() => (string) $value19,    // token
    getfield20() => (string) $value20,    // code
    getfield21() => (string) $value21);   // date_added
    if (empty($value21)) { unset($formFields[getfield21()]); } // date_added
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfieldid() . '</th>' .  // customer_id
  '<th>' . getfield01() . '</th>' .  // customer_group_id
  '<th>' . getfield02() . '</th>' .  // store_id
  '<th>' . getfield03() . '</th>' .  // language_id
  '<th>' . getfield04() . '</th>' .  // firstname
  '<th>' . getfield05() . '</th>' .  // lastname
  '<th>' . getfield06() . '</th>' .  // email
  '<th>' . getfield07() . '</th>' .  // telephone
  '<th>' . getfield17() . '</th>' ;  // status
 return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ;  // customer_id
      (int)    $value01 = isset($row[getfield01()]) ? $row[getfield01()] : 0  ;  // customer_group_id
      (int)    $value02 = isset($row[getfield02()]) ? $row[getfield02()] : 0  ;  // store_id
      (int)    $value03 = isset($row[getfield03()]) ? $row[getfield03()] : 0  ;  // language_id
      (string) $value04 = isset($row[getfield04()]) ? $row[getfield04()] : '' ;  // firstname
      (string) $value05 = isset($row[getfield05()]) ? $row[getfield05()] : '' ;  // lastname
      (string) $value06 = isset($row[getfield06()]) ? $row[getfield06()] : '' ;  // email
      (string) $value07 = isset($row[getfield07()]) ? $row[getfield07()] : '' ;  // telephone
      (string) $value08 = isset($row[getfield08()]) ? $row[getfield08()] : '' ;  // fax
      (string) $value09 = isset($row[getfield09()]) ? $row[getfield09()] : '' ;  // password
      (string) $value10 = isset($row[getfield10()]) ? $row[getfield10()] : '' ;  // salt
      (string) $value11 = isset($row[getfield11()]) ? $row[getfield11()] : '' ;  // cart
      (string) $value12 = isset($row[getfield12()]) ? $row[getfield12()] : '' ;  // wishlist
      (int)    $value13 = isset($row[getfield13()]) ? $row[getfield13()] : 0  ;  // newsletter
      (int)    $value14 = isset($row[getfield14()]) ? $row[getfield14()] : 0  ;  // address_id
      (string) $value15 = isset($row[getfield15()]) ? $row[getfield15()] : '' ;  // custom_field
      (string) $value16 = isset($row[getfield16()]) ? $row[getfield16()] : '' ;  // ip
      (int)    $value17 = isset($row[getfield17()]) ? $row[getfield17()] : 0  ;  // status
      (int)    $value18 = isset($row[getfield18()]) ? $row[getfield18()] : 0  ;  // safe
      (string) $value19 = isset($row[getfield19()]) ? $row[getfield19()] : '' ;  // token
      (string) $value20 = isset($row[getfield20()]) ? $row[getfield20()] : '' ;  // code
      (string) $value21 = isset($row[getfield21()]) ? $row[getfield21()] : '' ;  // date_added
      if (strlen($value21) > 10) { $value21 = substr($value21,0,10); }
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>' ;  // customer_id
        echo '<td>' . $value01 . '</td>' ;  // customer_group_id
        echo '<td>' . $value02 . '</td>' ;  // store_id
        echo '<td>' . $value03 . '</td>' ;  // language_id
        echo '<td>' . $value04 . '</td>' ;  // firstname
        echo '<td>' . $value05 . '</td>' ;  // lastname
        echo '<td>' . $value06 . '</td>' ;  // email
        echo '<td>' . $value07 . '</td>' ;  // telephone
        echo '<td>' . $value17 . '</td>' ;  // status
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'customer_id';
}
function getfield01() {
   return 'customer_group_id';
}
function getfield02() {
    return 'store_id';
}
function getfield03() {
    return 'language_id';
}
function getfield04() {
    return 'firstname';
}
function getfield05() {
    return 'lastname';
}
function getfield06() {
    return 'email';
}
function getfield07() {
    return 'telephone';
}
function getfield08() {
    return 'fax';
}
function getfield09() {
    return 'password';
}
function getfield10() {
    return 'salt';
}
function getfield11() {
    return 'cart';
}
function getfield12() {
    return 'wishlist';
}
function getfield13() {
    return 'newsletter';
}
function getfield14() {
    return 'address_id';
}
function getfield15() {
     return 'custom_field';
}
function getfield16() {
    return 'ip';
}
function getfield17() {
    return 'status';
}
function getfield18() {
    return 'safe';
}
function getfield19() {
    return 'token';
}
function getfield20() {
    return 'code';
}
function getfield21() {
    return 'date_added';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}
  
?>