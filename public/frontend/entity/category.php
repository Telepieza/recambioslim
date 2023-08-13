<?php
/** 
  * category.php
  * Description: category template
  * @Author : M.V.M
  * @Version 1.0.0
**/
function setFormFields() {
    $category_id   = $_REQUEST['id'];
    $image         = $_REQUEST['image'];
    $parent_id     = $_REQUEST['parent_id'];
    $top           = $_REQUEST['top'];
    $column        = $_REQUEST['column'];
    $sort_order    = $_REQUEST['sort_order'];
    $status        = $_REQUEST['status'];
    $date_added    = isset($_REQUEST['date_added'])    ? $_REQUEST['date_added']    : '' ;
    $date_modified = isset($_REQUEST['date_modified']) ? $_REQUEST['date_modified'] : '' ; 
    if (empty($date_added))    { $date_added    = date('Y-m-d H:i:s'); };
    if (empty($date_modified)) { $date_modified = date('Y-m-d H:i:s'); };
    if (empty($image))         { $image = '/image'; };
  
  $formFields = array( 
    'category_id'   => (int)    $category_id,
    'image'         => (string) $image,
    'parent_id'     => (int)    $parent_id,
    'top'           => (int)    $top,
    'column'        => (int)    $column,
    'sort_order'    => (int)    $sort_order,
    'status'        => (int)    $status,
    'date_added'    => (string) $date_added,
    'date_modified' => (string) $date_modified);

    if (empty($image)) {
      unset($formFields['image']);
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
   (string) $header = '<thead><tr>
      <th>order</th>
      <th>id</th>
      <th>image</th>
      <th>parent</th>
      <th>top</th>
      <th>column</th>
      <th>status</th>
      <th>date add</th> ';
      if (is_array($data) && count($data) > 0) {
          $header .= '<th>action</th>';
      }
    return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row): 
    
      (int)    $category_id   = 0;
      (string) $image         = '';
      (int)    $parent_id     = 0;
      (int)    $top           = 0;
      (int)    $column        = 0;
      (int)    $sort_order    = 0;
      (int)    $status        = 0;
      (string) $date_added    = '';
      (string) $date_modified = ''; 
      
      if (isset($row['category_id']))   $category_id = $row['category_id'];
      if (isset($row['image']))         trim($image = $row['image']);
      if (isset($row['parent_id']))     $parent_id = $row['parent_id'];
      if (isset($row['top']))           $top = $row['top'];
      if (isset($row['column']))        $column = $row['column'];
      if (isset($row['sort_order']))    $sort_order = $row['sort_order'];
      if (isset($row['status']))        $status = $row['status'];
      if (isset($row['date_added']))    trim($date_added = $row['date_added']);
      if (isset($row['date_modified'])) trim($date_modified = $row['date_modified']);
      if (strlen($date_added) > 10)     {$date_added = substr($date_added,0,10); }
      if (strlen($date_modified) > 10)  {$date_modified = substr($date_modified,0,10); }

      echo '<tr>';
       echo '<td>' . $sort_order   . '</td>'; 
       echo '<td>' . $category_id  . '</td>'; 
       echo '<td>' . $image        . '</td>'; 
       echo '<td>' . $parent_id    . '</td>'; 
       echo '<td>' . $top          . '</td>'; 
       echo '<td>' . $column       . '</td>'; 
       echo '<td>' . $status       . '</td>'; 
       echo '<td>' . $date_added   . '</td>'; 
       echo '<td><a href=' . $pageAction . $category_id . ' target="_blank" class="btn btn-secondary btn-sm"><i class="fa fa-angle-double-right"></i>Details</a></td>';
      echo '</tr>';
    
    endforeach;
  }

}

?>