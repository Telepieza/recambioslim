<?php
/** 
  * geo_zone.php
  * Description: geo_zone template
  * @Author : M.V.M
  * @Version 1.0.0
**/
function setFormFields() {
    $geo_zone_id   = $_REQUEST['id'];
    $name          = $_REQUEST['name'];
    $description   = $_REQUEST['description'];
    $date_added    = isset($_REQUEST['date_added'])    ? $_REQUEST['date_added']    : '' ;
    $date_modified = isset($_REQUEST['date_modified']) ? $_REQUEST['date_modified'] : '' ; 
    if (empty($date_added))    { $date_added    = date('Y-m-d H:i:s'); };
    if (empty($date_modified)) { $date_modified = date('Y-m-d H:i:s'); };
  
  $formFields = array( 
    'geo_zone_id'   => (int)    $geo_zone_id,
    'name'          => (string) $name,
    'description'   => (string) $description,
    'date_added'    => (string) $date_added,
    'date_modified' => (string) $date_modified);

    if (empty($name)) {
      unset($formFields['name']);
    }
    if (empty($description)) {
      unset($formFields['description']);
    }
    if (empty($date_added)) {
      unset($formFields['date_added']);
    }
    if (empty($date_modified)) {
      unset($formFields['date_modified']);
    }
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>';
  if (is_array($data) && count($data) > 0) {
    $header .= '<th>action</th>';
  }

 $header .= 
     '<th>id</th>
      <th>name</th>
      <th>description</th>
      <th>date add</th>
      <th>date modified</th> ';
    return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row): 
    
      (int)    $geo_zone_id   = 0;
      (string) $name          = '';
      (string) $description   = '';
      (string) $date_added    = '';
      (string) $date_modified = ''; 
      
      if (isset($row['geo_zone_id']))   $geo_zone_id = $row['geo_zone_id'];
      if (isset($row['name']))          trim($name = $row['name']);
      if (isset($row['description']))   trim($description = $row['description']);
      if (isset($row['date_added']))    trim($date_added = $row['date_added']);
      if (isset($row['date_modified'])) trim($date_modified = $row['date_modified']);
      if (strlen($date_added) > 10)     {$date_added = substr($date_added,0,10); }
      if (strlen($date_modified) > 10)  {$date_modified = substr($date_modified,0,10); }

      echo '<tr>';
        echo '<td><a href=' . $pageAction . $geo_zone_id . ' target="_blank" class="btn btn-secondary btn-sm"><i class="fa fa-angle-double-right"></i>Details</a></td>';
        echo '<td>' . $geo_zone_id  . '</td>'; 
        echo '<td>' . $name         . '</td>'; 
        echo '<td>' . $description  . '</td>'; 
        echo '<td>' . $date_added   . '</td>'; 
        echo '<td>' . $date_modified   . '</td>'; 
      echo '</tr>';
    
    endforeach;
  }

}

?>