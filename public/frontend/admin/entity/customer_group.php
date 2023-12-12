<?php
/**
  * customer_group.php
  * Description: customer_group template
  * @Author : M.V.M.
  * @Version 1.0.9
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // customer_group_id
    $value01 = $_REQUEST[getfield01()];  // approval
    $value02 = $_REQUEST[getfield02()];  // sort_order
  
  $formFields = array(
    getfieldid() => (int)  $id,         // customer_group_id
    getfield01() => (int)  $value01,    // approval
    getfield02() => (int)  $value02);    // sort_order
  
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfield02() . '</th>' .  // sort_order
  '<th>' . getfieldid() . '</th>' .  // customer_group_id
  '<th>' . getfield01() . '</th>' ;  // approval
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)  $id      = 0 ;  //customer_group_id
    (int)  $value01 = 0 ;  // approval
    (int)  $value02 = 0 ;  //sort_order

    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01      = $row[getfield01()];
    if (isset($row[getfield02()])) $value02      = $row[getfield02()];

    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $value02 . '</td>';  // sort_order
       echo '<td>' . $id      . '</td>';  // customer_group_id
       echo '<td>' . $value01 . '</td>';  // approval
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'customer_group_id';
  }
  
  function getfield01() {
    return 'approval';
  }
  
  function getfield02() {
    return 'sort_order';
  }
      
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  

?>