<?php
/**
  * tax_rate.php
  * Description: tax_rate template
  * @Author : M.V.M.
  * @Version 1.0.6
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // tax_rate_id
    $value01 = $_REQUEST[getfield01()];  // geo_zone_id
    $value02 = $_REQUEST[getfield02()];  // name
    $value03 = $_REQUEST[getfield03()];  // rate
    $value04 = $_REQUEST[getfield04()];  // type
    $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ; // date_added
    $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : '' ; // date_modified
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

    (int)    $id       = 0 ;  // tax_rate_id
    (int)    $value01  = '';  // geo_zone_id
    (string) $value02  = '';  // name
    (string) $value03  = '0'; // rate  (float a string)
    (string) $value04  = '';  // type
    (string) $value05  = '';  // date_added
    (string) $value06  = '';  // date_modified


    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01      = $row[getfield01()];
    if (isset($row[getfield02()])) trim($value02 = $row[getfield02()]);

    if (isset($row[getfield03()])) {
      $value03 = number_format($row[getfield03()], 2 ,",",".");
    }
    if (isset($row[getfield04()])) trim($value04 = $row[getfield04()]);
    if (isset($row[getfield05()])) trim($value05 = $row[getfield05()]);
    if (isset($row[getfield06()])) trim($value06 = $row[getfield06()]);
    
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