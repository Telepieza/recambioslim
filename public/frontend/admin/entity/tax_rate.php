<?php
/**
  * tax_rate.php
  * Description: tax_rate template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // tax_rate_id
  (int)    $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ; // geo_zone_id
  (string) $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ; // name
  (float)  $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : 0  ; // rate
  (string) $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ; // type
  (string) $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ; // date_added
  (string) $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : '' ; // date_modified
  if (empty($value05)) { $value05 = date('Y-m-d H:i:s'); }
  if (empty($value06)) { $value06 = date('Y-m-d H:i:s'); }
  $formFields = array(
    getfieldid() => (int)    $id,        // tax_rate_id
    getfield01() => (int)    $value01,   // geo_zone_id
    getfield02() => (string) $value02,   // name
    getfield03() => (float)  $value03,   // rate
    getfield04() => (string) $value04,   // type
    getfield05() => (string) $value05,   // date_added
    getfield06() => (string) $value06);  // date_modified
    if (empty($value05)) { unset($formFields[getfield05()]); } // date_added
    if (empty($value06)) { unset($formFields[getfield06()]); } // date_modified
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfieldid() . '</th>' .  // tax_rate_id
  '<th>' . getfield01() . '</th>' .  // geo_zone_id
  '<th>' . getfield02() . '</th>' .  // name
  '<th>' . getfield03() . '</th>' .  // rate
  '<th>' . getfield04() . '</th>' .  // type
  '<th>' . getfield05() . '</th>' .  // date_added
  '<th>' . getfield06() . '</th>' ;  // date_modified
 return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // tax_rate_id
      (int)    $value01 = isset($row[getfield01()]) ? $row[getfield01()] : 0  ; // geo_zone_id
      (string) $value02 = isset($row[getfield02()]) ? $row[getfield02()] : '' ; // name
      (float)  $value03 = isset($row[getfield03()]) ? number_format($row[getfield03()], 2 ,",",".") : 0  ; // rate
      (string) $value04 = isset($row[getfield04()]) ? $row[getfield04()] : '' ; // type
      (string) $value05 = isset($row[getfield05()]) ? $row[getfield05()] : '' ; // date_added
      (string) $value06 = isset($row[getfield06()]) ? $row[getfield06()] : '' ; // date_modified
      if (strlen($value05) > 10) { $value05 = substr($value05,0,10); }
      if (strlen($value06) > 10) { $value06 = substr($value06,0,10); }
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>';  // tax_rate_id
        echo '<td>' . $value01 . '</td>';  // geo_zone_id
        echo '<td>' . $value02 . '</td>';  // name
        echo '<td>' . $value03 . '</td>';  // rate
        echo '<td>' . $value04 . '</td>';  // type
        echo '<td>' . $value05 . '</td>';  // date_added
        echo '<td>' . $value06 . '</td>';  // date_modified
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'tax_rate_id';
}
function getfield01() {
    return 'geo_zone_id';
}
function getfield02() {
    return 'name';
}
function getfield03() {
    return 'rate';
}
function getfield04() {
    return 'type';
}
function getfield05() {
    return 'date_added';
}
function getfield06() {
    return 'date_modified';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}

?>