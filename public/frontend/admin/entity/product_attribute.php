<?php
/**
  * product_attribute.php
  * Description: product_attribute template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // product_id
  (int)    $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ; // attribute_id
  (int)    $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : 0  ; // language_id
  (string) $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ; // text
  return  array(
    getfieldid() => (int)    $id,        // product_id
    getfield01() => (int)    $value01,   // attribute_id
    getfield02() => (int)    $value02,   // language_id
    getfield03() => (string) $value03);  // text
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfieldid() . '</th>' .  // product_id
  '<th>' . getfield01() . '</th>' .  // attribute_id
  '<th>' . getfield02() . '</th>' .  // language_id
  '<th>' . getfield03() . '</th>' ;  // text
 return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // product_id
      (int)    $value01 = isset($row[getfield01()]) ? $row[getfield01()] : 0  ; // attribute_id
      (int)    $value02 = isset($row[getfield02()]) ? $row[getfield02()] : 0  ; // language_id
      (string) $value03 = isset($row[getfield03()]) ? $row[getfield03()] : '' ; // text
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>';  // product_id
        echo '<td>' . $value01 . '</td>';  // attribute_id
        echo '<td>' . $value02 . '</td>';  // language_id
        echo '<td>' . $value03 . '</td>';  // text
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'product_id';
}
function getfield01() {
    return 'attribute_id';
}
function getfield02() {
    return 'language_id';
}
function getfield03() {
    return 'text';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}
  
?>