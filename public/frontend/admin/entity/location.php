<?php
/**
  * location.php
  * Description: location template
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
   $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ;
   $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : '' ;
   $value07 = isset($_REQUEST[getfield07()]) ? $_REQUEST[getfield07()] : '' ;
   $value08 = isset($_REQUEST[getfield08()]) ? $_REQUEST[getfield08()] : '' ;

   if (empty($value06)) { $value06 = '/image'; }
  
  $formFields = array(
    getfieldid() => (int)    $id,        // location_id
    getfield01() => (string) $value01,   // name
    getfield02() => (string) $value02,   // address
    getfield03() => (string) $value03,   // telephone
    getfield04() => (string) $value04,   // fax
    getfield05() => (string) $value05,   // geocode
    getfield06() => (string) $value06,   // image
    getfield07() => (string) $value07,   // open
    getfield08() => (string) $value08) ; // comment
    if (empty($value06)) { unset($formFields[getfield06()]); } // image
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // location_id
  '<th>' . getfield01() . '</th>' .  // name
  '<th>' . getfield02() . '</th>' .  // address
  '<th>' . getfield03() . '</th>' .  // telephone
  '<th>' . getfield04() . '</th>' .  // fax
  '<th>' . getfield05() . '</th>' .  // geocode
  '<th>' . getfield06() . '</th>' .  // image
  '<th>' . getfield07() . '</th>' .  // open
  '<th>' . getfield08() . '</th>' ;  // comment
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0 ; // location_id
    (string) $value01 = ''; // name
    (string) $value02 = ''; // address
    (string) $value03 = ''; // telephone
    (string) $value04 = ''; // fax
    (string) $value05 = ''; // geocode
    (string) $value06 = ''; // image
    (string) $value07 = ''; // open
    (string) $value08 = ''; // comment

    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) trim($value01 = $row[getfield01()]);
    if (isset($row[getfield02()])) trim($value02 = $row[getfield02()]);
    if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
    if (isset($row[getfield04()])) trim($value04 = $row[getfield04()]);
    if (isset($row[getfield05()])) trim($value05 = $row[getfield05()]);
    if (isset($row[getfield06()])) trim($value06 = $row[getfield06()]);
    if (isset($row[getfield07()])) trim($value07 = $row[getfield07()]);
    if (isset($row[getfield08()])) trim($value08 = $row[getfield08()]);
    
    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // location_id
       echo '<td>' . $value01 . '</td>';  // name
       echo '<td>' . $value02 . '</td>';  // address
       echo '<td>' . $value03 . '</td>';  // telephone
       echo '<td>' . $value04 . '</td>';  // fax
       echo '<td>' . $value05 . '</td>';  // geocode
       echo '<td>' . $value06 . '</td>';  // image
       echo '<td>' . $value07 . '</td>';  // open
       echo '<td>' . $value08 . '</td>';  // comment
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'location_id';
  }
  
  function getfield01() {
    return 'name';
  }
  
  function getfield02() {
    return 'address';
  }
  
  function getfield03() {
    return 'telephone';
  }
  
  function getfield04() {
    return 'fax';
  }
  
  function getfield05() {
    return 'geocode';
  }
  
  function getfield06() {
    return 'image';
  }

  function getfield07() {
    return 'open';
  }
  
  function getfield08() {
    return 'comment';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  

?>