<?php
/**
  * tax_rule.php
  * Description: tax_rule template
  * @Author : M.V.M.
  * @Version 1.0.6
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // tax_rule_id
    $value01 = $_REQUEST[getfield01()];  // tax_class_id
    $value02 = $_REQUEST[getfield02()];  // tax_rate_id
    $value03 = $_REQUEST[getfield03()];  // based
    $value04 = $_REQUEST[getfield04()];  // priority
   
   
  $formFields = array(
    getfieldid() => (int)    $id,        // tax_rule_id
    getfield01() => (int)    $value01,   // tax_class_id
    getfield02() => (int)    $value02,   // tax_rate_id
    getfield03() => (string) $value03,   // based
    getfield04() => (int)    $value04) ; // priority

    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // tax_rule_id
  '<th>' . getfield01() . '</th>' .  // tax_class_id
  '<th>' . getfield02() . '</th>' .  // tax_rate_id
  '<th>' . getfield03() . '</th>' .  // based
  '<th>' . getfield04() . '</th>' ;  // priority
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0 ; // tax_rule_id
    (int)    $value01 = 0 ; // tax_class_id
    (int)    $value02 = 0 ; // tax_rate_id
    (string) $value03 = ''; // based
    (int)    $value04 = 0;  // priority

    if (isset($row[getfieldid()])) $id      = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01 = $row[getfield01()];
    if (isset($row[getfield02()])) $value02 = $row[getfield02()];
    if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
    if (isset($row[getfield04()])) $value04 = $row[getfield04()];
    
    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // tax_rule_id
       echo '<td>' . $value01 . '</td>';  // tax_class_id
       echo '<td>' . $value02 . '</td>';  // tax_rate_id
       echo '<td>' . $value03 . '</td>';  // based
       echo '<td>' . $value04 . '</td>';  // priority
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'tax_rule_id';
  }
  
  function getfield01() {
    return 'tax_class_id';
  }
  
  function getfield02() {
    return 'tax_rate_id';
  }
  
  function getfield03() {
    return 'based';
  }
  
  function getfield04() {
    return 'priority';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  

?>