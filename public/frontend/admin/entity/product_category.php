<?php
/**
  * product_category.php
  * Description: product_category template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)      $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // product_id
  (int) $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ; // category_id
  return array(
    getfieldid() => (int)  $id,        // product_id
    getfield01() => (int)  $value01);  // category_id
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfieldid() . '</th>' .  // product_id
  '<th>' . getfield01() . '</th>' ;  // category_id
 return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
      (int)      $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // product_id
      (int) $value01 = isset($row[getfield01()]) ? $row[getfield01()] : 0  ; // category_id
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>';  // product_id
        echo '<td>' . $value01 . '</td>';  // category_id
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'product_id';
}
function getfield01() {
    return 'category_id';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}
  
?>