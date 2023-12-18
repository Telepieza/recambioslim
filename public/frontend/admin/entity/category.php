<?php
/**
  * category.php
  * Description: category template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // category_id
  (string) $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : '' ; // image
  (int)    $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : 0  ; // parent_id
  (int)    $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : 0  ; // top
  (int)    $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : 0  ; // column
  (int)    $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : 0  ; // sort_order
  (int)    $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : 0  ; // status
  (string) $value07 = isset($_REQUEST[getfield07()]) ? $_REQUEST[getfield07()] : '' ; // date_added
  (string) $value08 = isset($_REQUEST[getfield08()]) ? $_REQUEST[getfield08()] : '' ; // date_modified
  if (empty($value01)) { $value01 = '/image'; }
  if (empty($value07)) { $value07 = date('Y-m-d H:i:s'); }
  if (empty($value08)) { $value08 = date('Y-m-d H:i:s'); }
  $formFields = array(
    getfieldid() => (int)    $id,        // category_id
    getfield01() => (string) $value01,   // image
    getfield02() => (int)    $value02,   // parent_id
    getfield03() => (int)    $value03,   // top
    getfield04() => (int)    $value04,   // column
    getfield05() => (int)    $value05,   // sort_order
    getfield06() => (int)    $value06,   // status
    getfield07() => (string) $value07,   // date_added
    getfield08() => (string) $value08) ; // date_modified
    if (empty($value01)) { unset($formFields[getfield01()]); } // image
    if (empty($value07)) { unset($formFields[getfield07()]); } // date_added
    if (empty($value08)) { unset($formFields[getfield08()]); } // date_modified
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfield05() . '</th>' .  // sort_order
  '<th>' . getfieldid() . '</th>' .  // category_id
  '<th>' . getfield01() . '</th>' .  // image
  '<th>' . getfield02() . '</th>' .  // parent
  '<th>' . getfield03() . '</th>' .  // top
  '<th>' . getfield04() . '</th>' .  // column
  '<th>' . getfield06() . '</th>' .  // status
  '<th>' . getfield07() . '</th>' ;  // date_added
 return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
      (int)         $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // category_id
      (string) $value01 = isset($row[getfield01()]) ? $row[getfield01()] : '' ; // image
      (int)    $value02 = isset($row[getfield02()]) ? $row[getfield02()] : 0  ; // parent_id
      (int)    $value03 = isset($row[getfield03()]) ? $row[getfield03()] : 0  ; // top
      (int)    $value04 = isset($row[getfield04()]) ? $row[getfield04()] : 0  ; // column
      (int)    $value05 = isset($row[getfield05()]) ? $row[getfield05()] : 0  ; // sort_order
      (int)    $value06 = isset($row[getfield06()]) ? $row[getfield06()] : 0  ; // status
      (string) $value07 = isset($row[getfield07()]) ? $row[getfield07()] : '' ; // date_added
      (string) $value08 = isset($row[getfield08()]) ? $row[getfield08()] : '' ; // date_modified
      if (strlen($value07) > 10) { $value07 = substr($value07,0,10); }
      if (strlen($value08) > 10) { $value08 = substr($value08,0,10); }
      echo '<tr>';
        echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
        echo '<td>' . $value05 . '</td>';  // sort_order
        echo '<td>' . $id      . '</td>';  // category_id
        echo '<td>' . $value01 . '</td>';  // image
        echo '<td>' . $value02 . '</td>';  // parent_id
        echo '<td>' . $value03 . '</td>';  // top
        echo '<td>' . $value04 . '</td>';  // column
        echo '<td>' . $value06 . '</td>';  // status
        echo '<td>' . $value07 . '</td>';  // date_added
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'category_id';
}
function getfield01() {
    return 'image';
}
function getfield02() {
    return 'parent_id';
}
function getfield03() {
    return 'top';
}
function getfield04() {
    return 'column';
}
function getfield05() {
    return 'sort_order';
}
function getfield06() {
    return 'status';
}
function getfield07() {
    return 'date_added';
}
function getfield08() {
    return 'date_modified';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}
  
?>