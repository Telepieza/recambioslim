<?php
/**
  * customer_login.php
  * Description: customer_login template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)          $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // customer_login_id
  (string)  $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : '' ; // email
  (string)  $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ; // ip
  (int)     $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : 0  ; // total
  (string)  $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ; // date_added
  (string)  $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ; // date_modified
  if (empty($value04)) { $value04 = date('Y-m-d H:i:s'); }
  if (empty($value05)) { $value05 = date('Y-m-d H:i:s'); }
  $formFields = array(
    getfieldid() => (int)    $id,        // customer_login_id
    getfield01() => (string) $value01,   // email
    getfield02() => (string) $value02,   // ip
    getfield03() => (int)    $value03,   // total
    getfield04() => (string) $value04,   // date_added
    getfield05() => (string) $value05) ; // date_modified
    if (empty($value04)) { unset($formFields[getfield04()]); } // date_added
    if (empty($value05)) { unset($formFields[getfield05()]); } // date_modified
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfieldid() . '</th>' .  // customer_login_id
  '<th>' . getfield01() . '</th>' .  // email
  '<th>' . getfield02() . '</th>' .  // parent
  '<th>' . getfield03() . '</th>' .  // total
  '<th>' . getfield04() . '</th>' .  // date_added
  '<th>' . getfield05() . '</th>' ;  // date_modified 
 return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
         (int)       $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // customer_login_id
      (string)  $value01 = isset($row[getfield01()]) ? $row[getfield01()] : '' ; // email
      (string)  $value02 = isset($row[getfield02()]) ? $row[getfield02()] : '' ; // ip
      (int)     $value03 = isset($row[getfield03()]) ? $row[getfield03()] : 0  ; // total
      (string)  $value04 = isset($row[getfield04()]) ? $row[getfield04()] : '' ; // date_added
      (string)  $value05 = isset($row[getfield05()]) ? $row[getfield05()] : '' ; // date_modified
      if (strlen($value04) > 10) { $value04 = substr($value04,0,10); }
      if (strlen($value05) > 10) { $value05 = substr($value05,0,10); }
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>';  // customer_login_id
        echo '<td>' . $value01 . '</td>';  // email
        echo '<td>' . $value02 . '</td>';  // ip
        echo '<td>' . $value03 . '</td>';  // total
        echo '<td>' . $value04 . '</td>';  // date_added
        echo '<td>' . $value05 . '</td>';  // date_modified
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'customer_login_id';
}
function getfield01() {
    return 'email';
}
function getfield02() {
    return 'ip';
}
function getfield03() {
    return 'total';
}
function getfield04() {
    return 'date_added';
}
function getfield05() {
    return 'date_modified';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}

?>