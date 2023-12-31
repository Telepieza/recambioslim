<?php
/**
  * category_description.php
  * Description: category_description template
  * @Author : M.V.M.
  * @Version 1.0.16
**/

defined( '_TEXEC' ) or die( 'defines_ Restricted access - Access Denied' );  // run php program safely

function setFormFields() {
  (int)         $id = isset($_REQUEST[getfieldid()]) ? $_REQUEST[getfieldid()] : 0  ; // category_id
  (string) $value01 = isset($_REQUEST[getfield01()]) ? $_REQUEST[getfield01()] : '' ; // language_id
  (string) $value02 = isset($_REQUEST[getfield02()]) ? $_REQUEST[getfield02()] : '' ; // name
  (string) $value03 = isset($_REQUEST[getfield03()]) ? $_REQUEST[getfield03()] : '' ; // description
  (string) $value04 = isset($_REQUEST[getfield04()]) ? $_REQUEST[getfield04()] : '' ; // meta_title
  (string) $value05 = isset($_REQUEST[getfield05()]) ? $_REQUEST[getfield05()] : '' ; // meta_description
  (string) $value06 = isset($_REQUEST[getfield06()]) ? $_REQUEST[getfield06()] : '' ; // meta_keyword
  return array(
    getfieldid() => (int)    $id,        // category_id
    getfield01() => (string) $value01,   // language_id
    getfield02() => (string) $value02,   // name
    getfield03() => (string) $value03,   // description
    getfield04() => (string) $value04,   // meta_title
    getfield05() => (string) $value05,   // meta_description
    getfield06() => (string) $value06);  // meta_keyword
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }
  $header .=
  '<th>' . getfieldid() . '</th>' .  // category_id
  '<th>' . getfield01() . '</th>' .  // language_id
  '<th>' . getfield02() . '</th>' .  // name
  '<th>' . getfield03() . '</th>' .  // description
  '<th>' . getfield04() . '</th>' .  // meta_title
  '<th>' . getfield05() . '</th>' .  // meta_description
  '<th>' . getfield06() . '</th>' ;  // meta_keyword
 return $header;
}

function viewTableRows($data, $pageAction) {
  if (is_array($data) && count($data) > 0) {
    foreach($data as $row):
         (int)      $id = isset($row[getfieldid()]) ? $row[getfieldid()] : 0  ; // category_id
      (string) $value01 = isset($row[getfield01()]) ? $row[getfield01()] : '' ; // language_id
      (string) $value02 = isset($row[getfield02()]) ? $row[getfield02()] : '' ; // name
      (string) $value03 = isset($row[getfield03()]) ? $row[getfield03()] : '' ; // description
      (string) $value04 = isset($row[getfield04()]) ? $row[getfield04()] : '' ; // meta_title
      (string) $value05 = isset($row[getfield05()]) ? $row[getfield05()] : '' ; // meta_description
      (string) $value06 = isset($row[getfield06()]) ? $row[getfield06()] : '' ; // meta_keyword
      echo '<tr>';
         echo '<td><a href=' . $pageAction .  $id . getbuttonAction() . '</td>';
         echo '<td>' . $id      . '</td>';
         echo '<td>' . $value01 . '</td>';
         echo '<td>' . $value02 . '</td>';
         echo '<td>' . $value03 . '</td>';
         echo '<td>' . $value04 . '</td>';
         echo '<td>' . $value05 . '</td>';
         echo '<td>' . $value06 . '</td>';
      echo '</tr>';
    endforeach;
  }
}

function getfieldid() {
    return 'category_id';
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
    return 'meta_title';
}
function getfield05() {
    return 'meta_description';
}
function getfield06() {
    return 'meta_keyword';
}
function getbuttonAction() {
    return ' target="_blank" class="btn btn-secondary btn-sm py-0"><i class="fa fa-angle-double-right"></i<small>Details</small></a';
}

?>