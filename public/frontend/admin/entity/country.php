<?php
/**
  * country.php
  * Description: country template
  * @Author : M.V.M.
  * @Version 1.0.15
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
 
       $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ;
  $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : '' ;
  $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ;
  $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ;
  $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ;
  $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : 0  ;
  $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : 0  ;

  $formFields = array(
    getfieldid() => (int)    $id,        // country_id
    getfield01() => (string) $value01,   // name
    getfield02() => (string) $value02,   // iso_code_2
    getfield03() => (string) $value03,   // iso_code_3
    getfield04() => (string) $value04,   // address_format
    getfield05() => (int)    $value05,   // postcode_required
    getfield06() => (int)    $value06);  // status
    return $formFields;
}

function viewTableThead($data) {
  
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
     '<th>' . getfieldid() . '</th>' .  // country_id
     '<th>' . getfield01() . '</th>' .  // name
     '<th>' . getfield02() . '</th>' .  // iso_code_2
     '<th>' . getfield03() . '</th>' .  // iso_code_3
     '<th>' . getfield04() . '</th>' .  // address_format
     '<th>' . getfield05() . '</th>' .  // postcode_required
     '<th>' . getfield06() . '</th>' ;  // status
    return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
    
      (int)    $id      = 0 ;  // country_id
      (string) $value01 = '';  // name
      (string) $value02 = '';  // iso_code_2
      (string) $value03 = '';  // iso_code_3
      (string) $value04 = '';  // address_format
      (int)    $value05 = 0 ;  // postcode_required
      (int)    $value06 = 0 ;  // status
      
      if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
      if (isset($row[getfield01()])) trim($value01 = $row[getfield01()]);
      if (isset($row[getfield02()])) trim($value02 = $row[getfield02()]);
      if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
      if (isset($row[getfield04()])) trim($value04 = $row[getfield04()]);
      if (isset($row[getfield05()])) $value05      = $row[getfield05()];
      if (isset($row[getfield06()])) $value06      = $row[getfield06()];

      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $id      . '</td>';  // country_id
        echo '<td>' . $value01 . '</td>';  // name
        echo '<td>' . $value02 . '</td>';  // iso_code_2
        echo '<td>' . $value03 . '</td>';  // iso_code_3
        echo '<td>' . $value04 . '</td>';  // address_format
        echo '<td>' . $value05 . '</td>';  // postcode_required
        echo '<td>' . $value06 . '</td>';  // status
      echo '</tr>';
    
    endforeach;
  }
}

function getfieldid() {
  return 'country_id';
}

function getfield01() {
  return 'name';
}

function getfield02() {
  return 'iso_code_2';
}

function getfield03() {
  return 'iso_code_3';
}

function getfield04() {
  return 'address_format';
}

function getfield05() {
  return 'postcode_required';
}

function getfield06() {
  return 'status';
}

function getbuttonAction() {
  return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}

?>