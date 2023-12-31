<?php
/**
  * manufacturer.php
  * Description: manufacturer template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // manufacturer_id
  (string) $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : '' ; // name
  (string) $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ; // image
  (int)    $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : 0  ; // sort_order
  if (empty($value02)) { $value02 = '/image'; }
  $formFields = array(
    getfieldid() => (int)    $id,        // manufacturer_id
    getfield01() => (string) $value01,   // name
    getfield02() => (string) $value02,   // image
    getfield03() => (int)    $value03);  // sort_order
    if (empty($value02)) { unset($formFields[getfield02()]); } // image
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfield03() . '</th>' .  // sort_order
  '<th>' . getfieldid() . '</th>' .  // manufacturer_id
  '<th>' . getfield01() . '</th>' .  // name
  '<th>' . getfield02() . '</th>' ;  // image
   return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // manufacturer_id
      (string) $value01 = isset($row[getfield01()]) ? $row[getfield01()] : '' ; // name
      (string) $value02 = isset($row[getfield02()]) ? $row[getfield02()] : '' ; // image
      (int)    $value03 = isset($row[getfield03()]) ? $row[getfield03()] : 0  ; // sort_order
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $value03 . '</td>';  // sort_order
        echo '<td>' . $id      . '</td>';  // manufacturer_id
        echo '<td>' . $value01 . '</td>';  // name
        echo '<td>' . $value02 . '</td>';  // image
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'manufacturer_id';
}
function getfield01() {
    return 'name';
}
function getfield02() {
    return 'image';
}
function getfield03() {
    return 'sort_order';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}

?>