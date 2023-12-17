<?php
/**
  * customer_activity.php
  * Description: customer_activity template
  * @Author : M.V.M.
  * @Version 1.0.15
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ;
    $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ;
    $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ;
    $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ;
    $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ;
    $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ;
    if (empty($value05)) { $value05 = date('Y-m-d H:i:s'); }

  
  $formFields = array(
    getfieldid() => (int)    $id,         // customer_activity_id
    getfield01() => (int)    $value01,    // customer_id
    getfield02() => (string) $value02,    // key
    getfield03() => (string) $value03,    // data
    getfield04() => (string) $value04,    // ip
    getfield05() => (string) $value05 );  // date_added
  
    if (empty($value05)) { unset($formFields[getfield05()]); } // date_added
  
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // customer_activity_id
  '<th>' . getfield01() . '</th>' .  // customer_id
  '<th>' . getfield02() . '</th>' .  // key
  '<th>' . getfield03() . '</th>' .  // data
  '<th>' . getfield04() . '</th>' .  // ip
  '<th>' . getfield05() . '</th>' ;  // date_added
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0 ;  // customer_activity_id
    (int)    $value01 = 0;   // customer_id
    (string) $value02 = '' ; // key
    (string) $value03 = '' ; // data
    (string) $value04 = '' ; // ip
    (string) $value05 = '';  // date_added

    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01      = $row[getfield01()];
    if (isset($row[getfield02()])) trim($value02 = $row[getfield02()]);
    if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
    if (isset($row[getfield04()])) trim($value04 = $row[getfield04()]);
    if (isset($row[getfield05()])) trim($value05 = $row[getfield05()]);
    
    if (strlen($value05) > 10) { $value05 = substr($value05,0,10); }

    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // customer_activity_id
       echo '<td>' . $value01 . '</td>';  // customer_id
       echo '<td>' . $value02 . '</td>';  // key
       echo '<td>' . $value03 . '</td>';  // data
       echo '<td>' . $value04 . '</td>';  // ip
       echo '<td>' . $value05 . '</td>';  // date_added
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'customer_activity_id';
  }
  
  function getfield01() {
    return 'customer_id';
  }
  
  function getfield02() {
    return 'key';
  }
  
  function getfield03() {
    return 'data';
  }
  
  function getfield04() {
    return 'ip';
  }
  
  function getfield05() {
    return 'date_added';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  

?>