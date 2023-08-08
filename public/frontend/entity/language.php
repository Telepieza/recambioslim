<?php
function setFormFields() {
  $language_id   = $_REQUEST['id'];
  $name          = $_REQUEST['name'];
  $code          = $_REQUEST['code'];
  $locale        = $_REQUEST['locale'];
  $image         = $_REQUEST['image'];
  $directory     = $_REQUEST['directory'];
  $sort_order    = $_REQUEST['sort_order'];
  $status        = $_REQUEST['status'];
  if (empty($image)) { $image = '/image'; };
  
  $formFields = array( 
    'language_id'  => (int)    $language_id,
    'name'         => (string) $name,
    'code'         => (string) $code,
    'locale'       => (string) $locale,
    'image'        => (string) $image,
    'directory'    => (string) $directory,
    'sort_order'   => (int)    $sort_order,
    'status'       => (int)    $status);
  
    if (empty($image)) {
      unset($formFields['image']);
    }
    return $formFields;
}

function viewTableThead($data) {
  (string) $header = '<thead><tr>
     <th>order</th>
     <th>id</th>
     <th>name</th>
     <th>code</th>
     <th>locale</th>
     <th>image</th>
     <th>directory</th>
     <th>status</th>' ;
     if (is_array($data) && count($data) > 0) {
         $header .= '<th>action</th>';
     }
   return $header;
}

function viewTableRows($data, $pageAction) {

  if (is_array($data) && count($data) > 0) {
    foreach($data as $row): 
    
      (int)    $language_id   = 0;
      (string) $name          = '';
      (string) $code          = '';
      (string) $locale        = '';
      (string) $image         = '';
      (string) $directory     = '';
      (int)    $sort_order    = 0;
      (int)    $status        = 0;
      
      if (isset($row['language_id']))  $language_id = $row['language_id'];
      if (isset($row['name']))         trim($name = $row['name']);
      if (isset($row['code']))         trim($code = $row['code']);
      if (isset($row['locale']))       trim($locale = $row['locale']);
      if (isset($row['image']))        trim($image = $row['image']);
      if (isset($row['directory']))    trim($directory = $row['directory']);
      if (isset($row['sort_order']))   $sort_order = $row['sort_order'];
      if (isset($row['status']))       $status = $row['status'];

      echo '<tr>';
       echo '<td>' . $sort_order   . '</td>'; 
       echo '<td>' . $language_id  . '</td>'; 
       echo '<td>' . $name         . '</td>'; 
       echo '<td>' . $code         . '</td>'; 
       echo '<td>' . $locale       . '</td>'; 
       echo '<td>' . $image        . '</td>'; 
       echo '<td>' . $directory    . '</td>'; 
       echo '<td>' . $status       . '</td>'; 
       echo '<td><a href=' . $pageAction . $language_id . ' target="_blank" class="btn btn-secondary btn-sm"><i class="fa fa-angle-double-right"></i>Details</a></td>';
      echo '</tr>';
    
    endforeach;
  }

}

 
?>