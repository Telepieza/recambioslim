<?php
/**
  * product_reward.php
  * description: product_reward template
  * @Author : M.V.M.
  * @Version 1.0.15
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // product_reward_id
    $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ; // product_id
    $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : 0  ; // customer_group_id
    $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : 0  ; // points
  
  $formFields = array(
    getfieldid() => (int)  $id,         // product_reward_id
    getfield01() => (int)  $value01,    // product_id
    getfield02() => (int)  $value02,    // customer_group_id
    getfield03() => (int)  $value03);   // points
    return $formFields;
}

function viewTableThead($description) {
  (string) $header = '<thead><tr>';
  if (is_array($description) && count($description) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // product_reward_id
  '<th>' . getfield01() . '</th>' .  // product_id
  '<th>' . getfield02() . '</th>' .  // customer_group_id
  '<th>' . getfield03() . '</th>' ;  // points
 return $header;
}

function viewTableRows($description, $pageAction) {

  if (is_array($description) && count($description) > 0) {
    foreach($description as $row):

    (int)  $id      = 0 ;  // product_reward_id
    (int)  $value01 = 0 ;  // product_id
    (int)  $value02 = 0 ;  // customer_group_id
    (int)  $value03 = 0 ; // points

    if (isset($row[getfieldid()])) $id        = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01   = $row[getfield01()];
    if (isset($row[getfield02()])) $value02   = $row[getfield02()];
    if (isset($row[getfield03()])) $value03   = $row[getfield03()];

    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // product_reward_id
       echo '<td>' . $value01 . '</td>';  // product_id
       echo '<td>' . $value02 . '</td>';  // customer_group_id
       echo '<td>' . $value03 . '</td>';  // points
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'product_reward_id';
  }
  
  function getfield01() {
    return 'product_id';
  }
  
  function getfield02() {
    return 'customer_group_id';
  }
  
  function getfield03() {
    return 'points';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }

?>