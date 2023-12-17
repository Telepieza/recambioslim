<?php
/**
  * product_layout.php
  * Description: product_layout template
  * @Author : M.V.M.
  * @Version 1.0.15
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // product_id
    $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : 0  ; // store_id
    $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : 0  ; // layout_id
   
  $formFields = array(
    getfieldid() => (int) $id,        // product_id
    getfield01() => (int) $value01,   // store_id
    getfield02() => (int) $value02);  // layout_id
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // product_id
  '<th>' . getfield01() . '</th>' .  // store_id
  '<th>' . getfield02() . '</th>' ;  // layout_id
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int) $id      = 0 ; // product_id
    (int) $value01 = 0 ; // store_id
    (int) $value02 = 0 ; // layout_id

    if (isset($row[getfieldid()])) $id      = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01 = $row[getfield01()];
    if (isset($row[getfield02()])) $value02 = $row[getfield02()];
    
    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // product_id
       echo '<td>' . $value01 . '</td>';  // store_id
       echo '<td>' . $value02 . '</td>';  // layout_id
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
  
  function getfield02() {
    return 'layout_id';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  
?>