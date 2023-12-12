<?php
/**
  * customer_reward.php
  * description: customer_reward template
  * @Author : M.V.M.
  * @Version 1.0.9
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // customer_reward_id
    $value01 = $_REQUEST[getfield01()];  // customer_id
    $value02 = $_REQUEST[getfield02()];  // order_id
    $value03 = $_REQUEST[getfield03()];  // description
    $value04 = $_REQUEST[getfield04()];  // points

    $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ; // date_added
    if (empty($value05)) { $value05 = date('Y-m-d H:i:s'); }

  
  $formFields = array(
    getfieldid() => (int)    $id,         // customer_reward_id
    getfield01() => (int)    $value01,    // customer_id
    getfield02() => (int)    $value02,    // order_id
    getfield03() => (string) $value03,    // description
    getfield04() => (int)    $value04,    // points
    getfield05() => (string) $value05 );  // date_added
  
    if (empty($value05)) { unset($formFields[getfield05()]); } // date_added
  
    return $formFields;
}

function viewTableThead($description) {
  (string) $header = '<thead><tr>';
  if (is_array($description) && count($description) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfield02() . '</th>' .  // order_id
  '<th>' . getfieldid() . '</th>' .  // customer_reward_id
  '<th>' . getfield01() . '</th>' .  // customer_id
  '<th>' . getfield03() . '</th>' .  // description
  '<th>' . getfield04() . '</th>' .  // points
  '<th>' . getfield05() . '</th>' ;  // date_added
 return $header;
}

function viewTableRows($description, $pageAction) {

  if (is_array($description) && count($description) > 0) {
    foreach($description as $row):

    (int)    $id      = 0 ;  // customer_reward_id
    (int)    $value01 = 0;   // customer_id
    (int)    $value02 = 0 ;  // order_id
    (string) $value03 = '' ; // description
    (int)    $value04 = 0  ; // points
    (string) $value05 = '';  // date_added


    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01      = $row[getfield01()];
    if (isset($row[getfield02()])) $value02      = $row[getfield02()];
    if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
    if (isset($row[getfield04()])) $value04      = $row[getfield04()];
    if (isset($row[getfield05()])) trim($value05 = $row[getfield05()]);
    
    if (strlen($value05) > 10) { $value05 = substr($value05,0,10); }

    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $value02 . '</td>';  // order_id
       echo '<td>' . $id      . '</td>';  // customer_reward_id
       echo '<td>' . $value01 . '</td>';  // customer_id
       echo '<td>' . $value03 . '</td>';  // description
       echo '<td>' . $value04 . '</td>';  // points
       echo '<td>' . $value05 . '</td>';  // date_added
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'customer_reward_id';
  }
  
  function getfield01() {
    return 'customer_id';
  }
  
  function getfield02() {
    return 'order_id';
  }
  
  function getfield03() {
    return 'description';
  }
  
  function getfield04() {
    return 'points';
  }
  
  function getfield05() {
    return 'date_added';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  

?>