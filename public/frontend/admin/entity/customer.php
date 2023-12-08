<?php
/**
  * customer.php
  * Description: customer template
  * @Author : M.V.M.
  * @Version 1.0.9
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // customer_id
    $value01 = $_REQUEST[getfield01()];  // customer_group_id
    $value02 = $_REQUEST[getfield02()];  // store_id
    $value03 = $_REQUEST[getfield03()];  // language_id
    $value04 = $_REQUEST[getfield04()];  // firstname
    $value05 = $_REQUEST[getfield05()];  // lastname
    $value06 = $_REQUEST[getfield06()];  // email
    $value07 = $_REQUEST[getfield07()];  // telephone
    $value08 = $_REQUEST[getfield08()];  // fax
    $value09 = $_REQUEST[getfield09()];  // password
    $value10 = $_REQUEST[getfield10()];  // salt
    $value11 = $_REQUEST[getfield11()];  // cart
    $value12 = $_REQUEST[getfield12()];  // wishlist
    $value13 = $_REQUEST[getfield13()];  // newsletter
    $value14 = $_REQUEST[getfield14()];  // address_id
    $value15 = $_REQUEST[getfield15()];  // custom_field
    $value16 = $_REQUEST[getfield16()];  // ip
    $value17 = $_REQUEST[getfield17()];  // status
    $value18 = $_REQUEST[getfield18()];  // safe
    $value19 = $_REQUEST[getfield19()];  // token
    $value20 = $_REQUEST[getfield20()];  // code
    $value21 = isset($_REQUEST[getfield21()]) ? $_REQUEST[getfield21()] : '' ; // date_added
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
  '<th>' . getfieldid() . '</th>' .    // customer_id
  '<th>' . getfield01() . '</th>' .    // customer_group_id
  '<th>' . getfield02() . '</th>' .    // store_id
  '<th>' . getfield03() . '</th>' .    // language_id
  '<th>' . getfield04() . '</th>' .    // firstname
  '<th>' . getfield05() . '</th>' .    // lastname
  '<th>' . getfield06() . '</th>' .    // email
  '<th>' . getfield07() . '</th>' .    // telephone
  '<th>' . getfield17() . '</th>' ;    // status

 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0  ;  // customer_id
    (int)    $value01 = 0  ;  // customer_group_id
    (int)    $value02 = 0  ;  // store_id
    (int)    $value03 = 0  ;  // language_id
    (string) $value04 = '' ;  // firstname
    (string) $value05 = '' ;  // lastname
    (string) $value06 = '' ;  // email
    (string) $value07 = '' ;  // telephone
    (string) $value08 = '' ;  // fax
    (string) $value09 = '' ;  // password
    (string) $value10 = '' ;  // salt
    (string) $value11 = '' ;  // cart
    (string) $value12 = '' ;  // wishlist
    (int)    $value13 = 0  ;  // newsletter
    (int)    $value14 = 0  ;  // address_id
    (string) $value15 = '' ;  // custom_field
    (string) $value16 = '' ;  // ip
    (int)    $value17 = 0  ;  // status
    (int)    $value18 = 0  ;  // safe
    (string) $value19 = '' ;  // token
    (string) $value20 = '' ;  // code
    (string) $value21 = '' ;  // date_added

    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01      = $row[getfield01()];
    if (isset($row[getfield02()])) $value02      = $row[getfield02()];
    if (isset($row[getfield03()])) $value03      = $row[getfield03()];
    if (isset($row[getfield04()])) trim($value04 = $row[getfield04()]);
    if (isset($row[getfield05()])) trim($value05 = $row[getfield05()]);
    if (isset($row[getfield06()])) trim($value06 = $row[getfield06()]);
    if (isset($row[getfield07()])) trim($value07 = $row[getfield07()]);
    if (isset($row[getfield08()])) trim($value08 = $row[getfield08()]);
    if (isset($row[getfield09()])) trim($value09 = $row[getfield09()]);
    if (isset($row[getfield10()])) trim($value10 = $row[getfield10()]);
    if (isset($row[getfield11()])) trim($value11 = $row[getfield11()]);
    if (isset($row[getfield12()])) trim($value12 = $row[getfield12()]);
    if (isset($row[getfield13()])) $value13      = $row[getfield13()];
    if (isset($row[getfield14()])) $value14      = $row[getfield14()];
    if (isset($row[getfield15()])) trim($value15 = $row[getfield15()]);
    if (isset($row[getfield16()])) trim($value16 = $row[getfield16()]);
    if (isset($row[getfield17()])) $value17      = $row[getfield17()];
    if (isset($row[getfield18()])) $value18      = $row[getfield18()];
    if (isset($row[getfield19()])) trim($value19 = $row[getfield19()]);
    if (isset($row[getfield20()])) trim($value20 = $row[getfield20()]);
    if (isset($row[getfield21()])) trim($value21 = $row[getfield21()]);

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