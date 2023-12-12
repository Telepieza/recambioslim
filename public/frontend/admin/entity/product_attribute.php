<?php
/**
  * product_attribute.php
  * Description: product_attribute template
  * @Author : M.V.M.
  * @Version 1.0.11
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // product_id
    $value01 = $_REQUEST[getfield01()];  // attribute_id
    $value02 = $_REQUEST[getfield02()];  // language_id
    $value03 = $_REQUEST[getfield03()];  // text
   
  $formFields = array(
    getfieldid() => (int)    $id,        // product_id
    getfield01() => (int)    $value01,   // attribute_id
    getfield02() => (int)    $value02,   // language_id
    getfield03() => (string) $value03);  // text

    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // product_id
  '<th>' . getfield01() . '</th>' .  // attribute_id
  '<th>' . getfield02() . '</th>' .  // language_id
  '<th>' . getfield03() . '</th>' ;  // text
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0 ; // product_id
    (int)    $value01 = 0 ; // attribute_id
    (int)    $value02 = 0 ; // language_id
    (string) $value03 = ''; // text

    if (isset($row[getfieldid()])) $id      = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01 = $row[getfield01()];
    if (isset($row[getfield02()])) $value02 = $row[getfield02()];
    if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
    
    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // product_id
       echo '<td>' . $value01 . '</td>';  // attribute_id
       echo '<td>' . $value02 . '</td>';  // language_id
       echo '<td>' . $value03 . '</td>';  // text
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'product_id';
  }
  
  function getfield01() {
    return 'attribute_id';
  }
  
  function getfield02() {
    return 'language_id';
  }
  
  function getfield03() {
    return 'text';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  
?>