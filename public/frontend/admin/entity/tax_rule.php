<?php
/**
  * tax_rule.php
  * Description: tax_rule template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // tax_rule_id
  (int)    $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ; // tax_class_id
  (int)    $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : 0  ; // tax_rate_id
  (string) $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ; // based
  (int)    $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : 0  ; // priority
  return array(
    getfieldid() => (int)    $id,        // tax_rule_id
    getfield01() => (int)    $value01,   // tax_class_id
    getfield02() => (int)    $value02,   // tax_rate_id
    getfield03() => (string) $value03,   // based
    getfield04() => (int)    $value04) ; // priority
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfieldid() . '</th>' .  // tax_rule_id
  '<th>' . getfield01() . '</th>' .  // tax_class_id
  '<th>' . getfield02() . '</th>' .  // tax_rate_id
  '<th>' . getfield03() . '</th>' .  // based
  '<th>' . getfield04() . '</th>' ;  // priority
 return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // tax_rule_id
      (int)    $value01 = isset($row[getfield01()]) ? $row[getfield01()] : 0  ; // tax_class_id
      (int)    $value02 = isset($row[getfield02()]) ? $row[getfield02()] : 0  ; // tax_rate_id
      (string) $value03 = isset($row[getfield03()]) ? $row[getfield03()] : '' ; // based
      (int)    $value04 = isset($row[getfield04()]) ? $row[getfield04()] : 0  ; // priority
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>';  // tax_rule_id
        echo '<td>' . $value01 . '</td>';  // tax_class_id
        echo '<td>' . $value02 . '</td>';  // tax_rate_id
        echo '<td>' . $value03 . '</td>';  // based
        echo '<td>' . $value04 . '</td>';  // priority
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'tax_rule_id';
}
function getfield01() {
    return 'tax_class_id';
}
function getfield02() {
    return 'tax_rate_id';
}
function getfield03() {
    return 'based';
}
function getfield04() {
    return 'priority';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}
  
?>