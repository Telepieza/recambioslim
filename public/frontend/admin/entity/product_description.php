<?php
/**
  * product_description.php
  * Description: product_description template
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

  $formFields = array(
    getfieldid() => (int)    $id,        // product_id
    getfield01() => (string) $value01,   // language_id
    getfield02() => (string) $value02,   // name
    getfield03() => (string) $value03,   // description
    getfield04() => (string) $value04,   // tag
    getfield05() => (string) $value05,   // meta_title
    getfield06() => (string) $value06,   // meta_description
    getfield07() => (string) $value07);  // meta_keyword

    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // product_id
  '<th>' . getfield01() . '</th>' .  // language_id
  '<th>' . getfield02() . '</th>' .  // name
  '<th>' . getfield03() . '</th>' .  // description
  '<th>' . getfield04() . '</th>' .  // tag
  '<th>' . getfield05() . '</th>' .  // meta_title
  '<th>' . getfield06() . '</th>' .  // meta_description
  '<th>' . getfield07() . '</th>' ;  // meta_keyword

 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0 ; // product_id
    (string) $value01 = ''; // language_id
    (string) $value02 = ''; // name
    (string) $value03 = ''; // description
    (string) $value04 = ''; // tag
    (string) $value05 = ''; // meta_title
    (string) $value06 = ''; // meta_description
    (string) $value07 = ''; // meta_keyword

    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) trim($value01 = $row[getfield01()]);
    if (isset($row[getfield02()])) trim($value02 = $row[getfield02()]);
    if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
    if (isset($row[getfield04()])) trim($value04 = $row[getfield04()]);
    if (isset($row[getfield05()])) trim($value05 = $row[getfield05()]);
    if (isset($row[getfield06()])) trim($value06 = $row[getfield06()]);
    if (isset($row[getfield07()])) trim($value07 = $row[getfield07()]);
    
    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // product_id
       echo '<td>' . $value01 . '</td>';  // language_id
       echo '<td>' . $value02 . '</td>';  // name
       echo '<td>' . $value03 . '</td>';  // description
       echo '<td>' . $value04 . '</td>';  // tag
       echo '<td>' . $value05 . '</td>';  // meta_title
       echo '<td>' . $value06 . '</td>';  // meta_description
       echo '<td>' . $value07 . '</td>';  // meta_keyword
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'product_id';
  }
  
  function getfield01() {
    return 'language_id';
  }
  
  function getfield02() {
    return 'name';
  }
  
  function getfield03() {
    return 'description';
  }
  
  function getfield04() {
    return 'tag';
  }
  
  function getfield05() {
    return 'meta_title';
  }
  
  function getfield06() {
    return 'meta_description';
  }

  function getfield07() {
    return 'meta_keyword';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  

?>