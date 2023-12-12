<?php
/**
  * product_store.php
  * Description: product_store template
  * @Author : M.V.M.
  * @Version 1.0.11
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // product_id
    $value01 = $_REQUEST[getfield01()];  // store_id
   
  $formFields = array(
    getfieldid() => (int)    $id,        // product_id
    getfield01() => (int)    $value01);  // store_id
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // product_id
  '<th>' . getfield01() . '</th>' ;  // store_id
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0 ; // product_id
    (int)    $value01 = 0 ; // store_id

    if (isset($row[getfieldid()])) $id      = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01 = $row[getfield01()];
    
    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // product_id
       echo '<td>' . $value01 . '</td>';  // store_id
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'product_id';
  }
  
  function getfield01() {
    return 'store_id';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  
?>