<?php
/**
  * customer_history.php
  * Description: customer_history template
  * @Author : M.V.M.
  * @Version 1.0.9
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

    $id      = $_REQUEST[getfieldid()];  // customer_history_id
    $value01 = $_REQUEST[getfield01()];  // customer_id
    $value02 = $_REQUEST[getfield02()];  // comment

    $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ; // date_added
    if (empty($value03)) { $value03 = date('Y-m-d H:i:s'); }

  
  $formFields = array(
    getfieldid() => (int)    $id,         // customer_history_id
    getfield01() => (int)    $value01,    // customer_id
    getfield02() => (string) $value02,    // comment
    getfield03() => (string) $value03 );  // date_added
  
    if (empty($value03)) { unset($formFields[getfield03()]); } // date_added
  
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfieldid() . '</th>' .  // customer_history_id
  '<th>' . getfield01() . '</th>' .  // customer_id
  '<th>' . getfield02() . '</th>' .  // parent
  '<th>' . getfield03() . '</th>' ;  // date_added
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

    (int)    $id      = 0 ;  // customer_history_id
    (int)    $value01 = 0;   // customer_id
    (string) $value02 = '' ; // comment
    (string) $value03 = '';  // date_added


    if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
    if (isset($row[getfield01()])) $value01      = $row[getfield01()];
    if (isset($row[getfield02()])) $value02      = $row[getfield02()];
    if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
    
    if (strlen($value03) > 10) { $value03 = substr($value03,0,10); }

    echo '<tr>';
       echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
       echo '<td>' . $id      . '</td>';  // customer_history_id
       echo '<td>' . $value01 . '</td>';  // customer_id
       echo '<td>' . $value02 . '</td>';  // comment
       echo '<td>' . $value03 . '</td>';  // date_added
    echo '</tr>';
    endforeach;
    }
  }

  function getfieldid() {
    return 'customer_history_id';
  }
  
  function getfield01() {
    return 'customer_id';
  }
  
  function getfield02() {
    return 'comment';
  }
    
  function getfield03() {
    return 'date_added';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }
  

?>