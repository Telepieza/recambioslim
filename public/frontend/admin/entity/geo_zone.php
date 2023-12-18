<?php
/**
  * geo_zone.php
  * Description: geo_zone template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ;  // geo_zone_id
  (string) $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : '' ;  // name
  (string) $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ;  // description
  (string) $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ;  // date_added
  (string) $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ;  // date_modified
  if (empty($value03)) { $value03 = date('Y-m-d H:i:s'); }
  if (empty($value04)) { $value04 = date('Y-m-d H:i:s'); }
  
  $formFields = array(
    getfieldid() => (int)    $id,        // geo_zone_id
    getfield01() => (string) $value01,   // name
    getfield02() => (string) $value02,   // description
    getfield03() => (string) $value03,   // date_added
    getfield04() => (string) $value04);  // date_modified
    if (empty($value01)) { unset($formFields[getfield01()]); }  // name
    if (empty($value02)) { unset($formFields[getfield02()]); }  // description
    if (empty($value03)) { unset($formFields[getfield03()]); }  // date_added
    if (empty($value04)) { unset($formFields[getfield04()]); }  // date_modifie
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfieldid() . '</th>' .   // geo_zone
  '<th>' . getfield01() . '</th>' .   // name
  '<th>' . getfield02() . '</th>' .   // description
  '<th>' . getfield03() . '</th>' .   // date add
  '<th>' . getfield04() . '</th>';    // date modified

  return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ;  // geo_zone_id
      (string) $value01 = isset($row[getfield01()]) ? $row[getfield01()] : '' ;  // name
      (string) $value02 = isset($row[getfield02()]) ? $row[getfield02()] : '' ;  // description
      (string) $value03 = isset($row[getfield03()]) ? $row[getfield03()] : '' ;  // date_added
      (string) $value04 = isset($row[getfield04()]) ? $row[getfield04()] : '' ;  // date_modified
      if (strlen($value03) > 10)  { $value03 = substr($value03,0,10); }
      if (strlen($value04) > 10)  { $value04 = substr($value04,0,10); }
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>';  // geo_zone_id
        echo '<td>' . $value01 . '</td>';  // name
        echo '<td>' . $value02 . '</td>';  // description
        echo '<td>' . $value03 . '</td>';  // date_added
        echo '<td>' . $value04 . '</td>';  // date_modified
     echo '</tr>';
    endforeach;
  }
}
  
function getfieldid() {
    return 'geo_zone_id';
}
function getfield01() {
    return 'name';
}
function getfield02() {
    return 'description';
}
function getfield03() {
    return 'date_added';
}
function getfield04() {
    return 'date_modified';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}

?>