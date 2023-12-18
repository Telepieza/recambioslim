<?php
/**
  * customer_transaction.php
  * description: customer_transaction template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // customer_transaction_id
  (int)    $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ; // customer_id
  (int)    $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : 0  ; // order_id
  (string) $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ; // description
  (float)  $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : 0  ; // amount
  (string) $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ; // date_added
  if (empty($value05)) { $value05 = date('Y-m-d H:i:s'); }
  $formFields = array(
    getfieldid() => (int)    $id,         // customer_transaction_id
    getfield01() => (int)    $value01,    // customer_id
    getfield02() => (int)    $value02,    // order_id
    getfield03() => (string) $value03,    // description
    getfield04() => (float)  $value04,    // amount
    getfield05() => (string) $value05 );  // date_added
    if (empty($value05)) { unset($formFields[getfield05()]); } // date_added
    return $formFields;
}

function viewTableThead($description) {
  (string) $header = '<thead><tr>';
  if (is_array($description) && count($description) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfield02() . '</th>' .  // order_id
  '<th>' . getfieldid() . '</th>' .  // customer_transaction_id
  '<th>' . getfield01() . '</th>' .  // customer_id
  '<th>' . getfield03() . '</th>' .  // description
  '<th>' . getfield04() . '</th>' .  // amount
  '<th>' . getfield05() . '</th>' ;  // date_added
 return $header;
}

function viewTableRows($description, $pageAction) {
  if (is_array($description) && count($description) > 0) {
    foreach($description as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // customer_transaction_id
      (int)    $value01 = isset($row[getfield01()]) ? $row[getfield01()] : 0  ; // customer_id
      (int)    $value02 = isset($row[getfield02()]) ? $row[getfield02()] : 0  ; // order_id
      (string) $value03 = isset($row[getfield03()]) ? $row[getfield03()] : '' ; // description
      (float)  $value04 = isset($row[getfield04()]) ? $row[getfield04()] : 0  ; // amount
      (string) $value05 = isset($row[getfield05()]) ? $row[getfield05()] : '' ; // date_added
      if (strlen($value05) > 10) { $value05 = substr($value05,0,10); }
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $value02 . '</td>';  // order_id
        echo '<td>' . $id      . '</td>';  // customer_transaction_id
        echo '<td>' . $value01 . '</td>';  // customer_id
        echo '<td>' . $value03 . '</td>';  // description
        echo '<td>' . $value04 . '</td>';  // amount
        echo '<td>' . $value05 . '</td>';  // date_added
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'customer_transaction_id';
}
function getfield01() {
    return 'customer_id';
}
function getfield02() {
    return 'order_id';
}
function getfield03() {
    return 'description';
}
function getfield04() {
    return 'amount';
}
function getfield05() {
    return 'date_added';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}
  
?>