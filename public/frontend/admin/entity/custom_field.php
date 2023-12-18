<?php
/**
  * custom_field.php
  * description: custom_field template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // custom_field_id
  (string) $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : '' ; // type
  (string) $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ; // value
  (string) $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ; // validation
  (string) $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ; // location
  (int)    $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : 0  ; // status
  (int)    $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : 0  ; // sort_order
  return array(
    getfieldid() => (int)    $id,         // custom_field_id
    getfield01() => (string) $value01,    // type
    getfield02() => (string) $value02,    // value
    getfield03() => (string) $value03,    // validation
    getfield04() => (string) $value04,    // location
    getfield05() => (int)    $value05,    // status
    getfield06() => (int)    $value06 );  // sort_order
}

function viewTableThead($description) {
  (string) $header = '<thead><tr>';
  if (is_array($description) && count($description) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfield06() . '</th>' .  // sort_order
  '<th>' . getfieldid() . '</th>' .  // custom_field_id
  '<th>' . getfield01() . '</th>' .  // type
  '<th>' . getfield02() . '</th>' .  // value
  '<th>' . getfield03() . '</th>' .  // validation
  '<th>' . getfield04() . '</th>' .  // location
  '<th>' . getfield05() . '</th>' ;  // status
 return $header;
}

function viewTableRows($description, $pageAction) {
  if (is_array($description) && count($description) > 0) {
    foreach($description as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // custom_field_id
      (string) $value01 = isset($row[getfield01()]) ? $row[getfield01()] : '' ; // type
      (string) $value02 = isset($row[getfield02()]) ? $row[getfield02()] : '' ; // value
      (string) $value03 = isset($row[getfield03()]) ? $row[getfield03()] : '' ; // validation
      (string) $value04 = isset($row[getfield04()]) ? $row[getfield04()] : '' ; // location
      (int)    $value05 = isset($row[getfield05()]) ? $row[getfield05()] : 0  ; // status
      (int)    $value06 = isset($row[getfield06()]) ? $row[getfield06()] : 0  ; // sort_order
      echo '<tr>';
         echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
         echo '<td>' . $value06 . '</td>';  // sort_order
         echo '<td>' . $id      . '</td>';  // custom_field_id
         echo '<td>' . $value01 . '</td>';  // type
         echo '<td>' . $value02 . '</td>';  // value
         echo '<td>' . $value03 . '</td>';  // validation
         echo '<td>' . $value04 . '</td>';  // location
         echo '<td>' . $value05 . '</td>';  // status
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'custom_field_id';
}
function getfield01() {
    return 'type';
}
function getfield02() {
    return 'value';
}
function getfield03() {
    return 'validation';
}
function getfield04() {
    return 'location';
}
function getfield05() {
    return 'status';
}
function getfield06() {
    return 'sort_order';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}
  
?>