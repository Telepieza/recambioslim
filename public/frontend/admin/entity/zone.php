<?php
/**
  * zone.php
  * Description: zone template
  * @Author : M.V.M.
  * @Version 1.0.5
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
 
  $id      = $_REQUEST[getfieldid()]; // zone_id
  $value01 = $_REQUEST[getfield01()]; // country_id
  $value02 = $_REQUEST[getfield02()]; // name
  $value03 = $_REQUEST[getfield03()]; // code
  $value04 = $_REQUEST[getfield04()]; // status
 
  $formFields = array(
    getfieldid() => (int)    $id,        // zone_id
    getfield01() => (int)    $value01,   // country_id
    getfield02() => (string) $value02,   // name
    getfield03() => (string) $value03,   // code
    getfield04() => (int)    $value04);  // status
    return $formFields;
}

function viewTableThead($data) {
  
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
     '<th>' . getfieldid() . '</th>' .   // zone_id
     '<th>' . getfield01() . '</th>' .   // country_id
     '<th>' . getfield02() . '</th>' .   // name
     '<th>' . getfield03() . '</th>' .   // code
     '<th>' . getfield04() . '</th>' ;   // status
    return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
    
      (int)    $id      = 0 ;  // zone_id
      (int)    $value01 = 0 ;  // country_id
      (string) $value02 = '';  // name
      (string) $value03 = '';  // code
      (int)    $value04 = 0 ;  // status
      
      if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
      if (isset($row[getfield01()])) $value01      = $row[getfield01()];
      if (isset($row[getfield02()])) trim($value02 = $row[getfield02()]);
      if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
      if (isset($row[getfield04()])) $value04      = $row[getfield04()];

      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>';  // zone_id
        echo '<td>' . $value01 . '</td>';  // country_id
        echo '<td>' . $value02 . '</td>';  // name
        echo '<td>' . $value03 . '</td>';  // code
        echo '<td>' . $value04 . '</td>';  // status
      echo '</tr>';
    
    endforeach;
  }
}

function getfieldid() {
  return 'zone_id';
}

function getfield01() {
  return 'country_id';
}

function getfield02() {
  return 'name';
}

function getfield03() {
  return 'code';
}

function getfield04() {
  return 'status';
}

function getbuttonAction() {
  return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}

?>