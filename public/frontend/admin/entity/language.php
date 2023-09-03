<?php
/**
  * language.php
  * Description: language template
  * @Author : M.V.M.
  * @Version 1.0.5
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {

  $id      = $_REQUEST[getfieldid()];  // language_id
  $value01 = $_REQUEST[getfield01()];  // name
  $value02 = $_REQUEST[getfield02()];  // code
  $value03 = $_REQUEST[getfield03()];  // locale
  $value04 = $_REQUEST[getfield04()];  // image
  $value05 = $_REQUEST[getfield05()];  // directory
  $value06 = $_REQUEST[getfield06()];  // sort_order
  $value07 = $_REQUEST[getfield07()];  // status

  if (empty($value04)) { $value04 = '/image'; }

  $formFields = array(
    getfieldid() => (int)    $id,       // language_id
    getfield01() => (string) $value01,  // name
    getfield02() => (string) $value02,  // code
    getfield03() => (string) $value03,  // locale
    getfield04() => (string) $value04,  // image
    getfield05() => (string) $value05,  // directory
    getfield06() => (int)    $value06,  // sort_order
    getfield07() => (int)    $value07); // status

    if (empty($value04)) { unset($formFields[getfield04()]); } // image
  
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

  $header .=
  '<th>' . getfield06() . '</th>' .  // sort_order
  '<th>' . getfieldid() . '</th>' .  // language_id
  '<th>' . getfield01() . '</th>' .  // name
  '<th>' . getfield02() . '</th>' .  // code
  '<th>' . getfield03() . '</th>' .  // locale
  '<th>' . getfield04() . '</th>' .  // image
  '<th>' . getfield05() . '</th>' .  // directory
  '<th>' . getfield07() . '</th>' ;  // status
 return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):

      (int)    $id      = 0 ; // language_id
      (string) $value01 ='' ; // name
      (string) $value02 ='' ; // code
      (string) $value03 ='' ; // locale
      (string) $value04 ='' ; // image
      (string) $value05 ='' ; // directory
      (int)    $value06 = 0 ; // sort_order
      (int)    $value07 = 0 ; // status

      if (isset($row[getfieldid()])) $id           = $row[getfieldid()];
      if (isset($row[getfield01()])) trim($value01 = $row[getfield01()]);
      if (isset($row[getfield02()])) trim($value02 = $row[getfield02()]);
      if (isset($row[getfield03()])) trim($value03 = $row[getfield03()]);
      if (isset($row[getfield04()])) trim($value04 = $row[getfield04()]);
      if (isset($row[getfield05()])) trim($value05 = $row[getfield05()]);
      if (isset($row[getfield06()])) $value06 = $row[getfield06()];
      if (isset($row[getfield07()])) $value07 = $row[getfield07()];
      
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $value06 . '</td>';  // sort_order
        echo '<td>' . $id      . '</td>';  // language_id
        echo '<td>' . $value01 . '</td>';  // name
        echo '<td>' . $value02 . '</td>';  // code
        echo '<td>' . $value03 . '</td>';  // locale
        echo '<td>' . $value04 . '</td>';  // image
        echo '<td>' . $value05 . '</td>';  // directory
        echo '<td>' . $value07 . '</td>';  // status
      echo '</tr>';
    
    endforeach;
   }
}

  function getfieldid() {
    return 'language_id';
  }
  
  function getfield01() {
    return 'name';
  }
  
  function getfield02() {
    return 'code';
  }
  
  function getfield03() {
    return 'locale';
  }

  function getfield04() {
    return 'image';
  }
  
  function getfield05() {
    return 'directory';
  }
  
  function getfield06() {
    return 'sort_order';
  }
  
  function getfield07() {
    return 'status';
  }
  
  function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
  }

?>